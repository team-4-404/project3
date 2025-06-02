<?php
require_once 'config.php';

header('Content-Type: application/json');

$specialist_id = isset($_GET['specialist_id']) ? (int)$_GET['specialist_id'] : null;
$date = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');

if (!$specialist_id) {
    http_response_code(400);
    echo json_encode(['error' => 'Не указан ID специалиста']);
    exit;
}

try {
    // Получаем расписание специалиста
    $stmt = $pdo->prepare("
        SELECT * FROM specialist_schedules 
        WHERE specialist_id = ? AND day_of_week = DAYOFWEEK(?)
    ");
    $stmt->execute([$specialist_id, $date]);
    $schedule = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$schedule) {
        echo json_encode(['slots' => []]);
        exit;
    }

    // Получаем все слоты на указанную дату
    $stmt = $pdo->prepare("
        SELECT s.*, 
               CASE WHEN a.id IS NOT NULL THEN FALSE ELSE TRUE END as is_available
        FROM slots s
        LEFT JOIN appointments a ON s.id = a.slot_id
        WHERE s.specialist_id = ? 
        AND s.slot_date = ?
        AND s.slot_time BETWEEN ? AND ?
        ORDER BY s.slot_time
    ");
    $stmt->execute([
        $specialist_id,
        $date,
        $schedule['start_time'],
        $schedule['end_time']
    ]);
    $existing_slots = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Если слотов нет, создаем их
    if (empty($existing_slots)) {
        $start = strtotime($schedule['start_time']);
        $end = strtotime($schedule['end_time']);
        $duration = $schedule['slot_duration'] * 60; // в секундах

        $slots = [];
        for ($time = $start; $time < $end; $time += $duration) {
            $slot_time = date('H:i:s', $time);
            
            $stmt = $pdo->prepare("
                INSERT INTO slots (specialist_id, slot_date, slot_time)
                VALUES (?, ?, ?)
            ");
            $stmt->execute([$specialist_id, $date, $slot_time]);
            
            $slots[] = [
                'id' => $pdo->lastInsertId(),
                'time' => $slot_time,
                'is_available' => true
            ];
        }
    } else {
        $slots = array_map(function($slot) {
            return [
                'id' => $slot['id'],
                'time' => $slot['slot_time'],
                'is_available' => (bool)$slot['is_available']
            ];
        }, $existing_slots);
    }

    echo json_encode(['slots' => $slots]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Ошибка при получении слотов: ' . $e->getMessage()]);
} 