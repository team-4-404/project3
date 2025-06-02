<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = [
        'name' => $_POST['name'] ?? '',
        'phone' => $_POST['phone'] ?? '',
        'service' => $_POST['service'] ?? '',
        'date' => $_POST['date'] ?? '',
        'timestamp' => date('Y-m-d H:i:s')
    ];
    
    // Проверяем заполнены ли обязательные поля
    if (empty($data['name']) || empty($data['phone']) || empty($data['service'])) {
        header('Location: index.html?status=error');
        exit;
    }
    
    // Чтение существующих данных
    $file = 'appointments.json';
    $appointments = [];
    
    if (file_exists($file)) {
        $json = file_get_contents($file);
        $appointments = json_decode($json, true) ?: [];
    }
    
    // Добавление новой записи
    $appointments[] = $data;
    
    // Сохранение в файл
    file_put_contents($file, json_encode($appointments, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    
    header('Location: index.html?status=success');
    exit;
} else {
    header('Location: index.html');
    exit;
}
?>