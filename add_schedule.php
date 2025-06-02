<?php
require_once 'config.php';

// Пример расписания для специалистов
$schedules = [
    // Пн-Пт: 9:00-18:00, Сб: 10:00-16:00
    [
        'specialist_id' => 1, // Дубровская Мария
        'schedule' => [
            ['day' => 1, 'start' => '09:00', 'end' => '18:00'], // Пн
            ['day' => 2, 'start' => '09:00', 'end' => '18:00'], // Вт
            ['day' => 3, 'start' => '09:00', 'end' => '18:00'], // Ср
            ['day' => 4, 'start' => '09:00', 'end' => '18:00'], // Чт
            ['day' => 5, 'start' => '09:00', 'end' => '18:00'], // Пт
            ['day' => 6, 'start' => '10:00', 'end' => '16:00'], // Сб
        ]
    ],
    // Пн-Пт: 10:00-19:00, Сб: 9:00-15:00
    [
        'specialist_id' => 2, // Сташкова Софья
        'schedule' => [
            ['day' => 1, 'start' => '10:00', 'end' => '19:00'],
            ['day' => 2, 'start' => '10:00', 'end' => '19:00'],
            ['day' => 3, 'start' => '10:00', 'end' => '19:00'],
            ['day' => 4, 'start' => '10:00', 'end' => '19:00'],
            ['day' => 5, 'start' => '10:00', 'end' => '19:00'],
            ['day' => 6, 'start' => '09:00', 'end' => '15:00'],
        ]
    ],
    // Пн-Пт: 8:00-17:00, Сб: 9:00-14:00
    [
        'specialist_id' => 3, // Фомкин Георгий
        'schedule' => [
            ['day' => 1, 'start' => '08:00', 'end' => '17:00'],
            ['day' => 2, 'start' => '08:00', 'end' => '17:00'],
            ['day' => 3, 'start' => '08:00', 'end' => '17:00'],
            ['day' => 4, 'start' => '08:00', 'end' => '17:00'],
            ['day' => 5, 'start' => '08:00', 'end' => '17:00'],
            ['day' => 6, 'start' => '09:00', 'end' => '14:00'],
        ]
    ],
    // Пн-Пт: 9:00-18:00, Сб: 10:00-15:00
    [
        'specialist_id' => 4, // Яман Зейнеп
        'schedule' => [
            ['day' => 1, 'start' => '09:00', 'end' => '18:00'],
            ['day' => 2, 'start' => '09:00', 'end' => '18:00'],
            ['day' => 3, 'start' => '09:00', 'end' => '18:00'],
            ['day' => 4, 'start' => '09:00', 'end' => '18:00'],
            ['day' => 5, 'start' => '09:00', 'end' => '18:00'],
            ['day' => 6, 'start' => '10:00', 'end' => '15:00'],
        ]
    ]
];

try {
    // Очищаем существующее расписание
    $pdo->exec("TRUNCATE TABLE specialist_schedules");
    
    // Добавляем новое расписание
    $stmt = $pdo->prepare("
        INSERT INTO specialist_schedules 
        (specialist_id, day_of_week, start_time, end_time, slot_duration) 
        VALUES (?, ?, ?, ?, 30)
    ");
    
    foreach ($schedules as $schedule) {
        foreach ($schedule['schedule'] as $day) {
            $stmt->execute([
                $schedule['specialist_id'],
                $day['day'],
                $day['start'],
                $day['end']
            ]);
        }
    }
    
    echo "Расписание успешно добавлено";
} catch (PDOException $e) {
    echo "Ошибка при добавлении расписания: " . $e->getMessage();
} 