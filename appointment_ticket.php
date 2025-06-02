<?php
require_once 'config.php';

$code = $_GET['code'] ?? '';
if (empty($code)) {
    header('Location: appointment.php');
    exit;
}

try {
    $stmt = $pdo->prepare("
        SELECT a.*, s.slot_date, s.slot_time, 
               sp.name as specialist_name, sp.position as specialist_position 
        FROM appointments a 
        JOIN slots s ON a.slot_id = s.id
        JOIN specialists sp ON s.specialist_id = sp.id
        WHERE a.unique_code = ?
    ");
    $stmt->execute([$code]);
    $appointment = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$appointment) {
        throw new Exception('Запись не найдена');
    }
} catch (Exception $e) {
    header('Location: appointment.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Электронный талон - Стоматологическая клиника</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body class="bg-gray-100">
    <!-- Header -->
    <header class="bg-white shadow-md py-4">
        <div class="container mx-auto px-4 flex flex-wrap items-center justify-between">
            <div class="logo flex items-center">
                <img src="images/logo.png" alt="Логотип клиники" class="h-12">
            </div>
            <nav class="hidden md:flex space-x-8">
                <a href="index.php" class="text-gray-700 hover:text-blue-600 font-medium">Главная</a>
                <a href="specialists.php" class="text-gray-700 hover:text-blue-600 font-medium">Специалисты</a>
                <a href="contacts.html" class="text-gray-700 hover:text-blue-600 font-medium">Контакты</a>
                <a href="advice.html" class="text-gray-700 hover:text-blue-600 font-medium">Советы по уходу</a>
            </nav>
        </div>
    </header>

    <!-- Ticket Section -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <div class="max-w-2xl mx-auto">
                <div class="bg-white rounded-lg shadow-lg p-8">
                    <div class="text-center mb-8">
                        <h1 class="text-3xl font-bold mb-2">Электронный талон</h1>
                        <p class="text-gray-600">Сохраните эту страницу или скопируйте ссылку для доступа к информации о записи</p>
                    </div>

                    <div class="space-y-6">
                        <div class="flex justify-between items-center p-4 bg-blue-50 rounded-lg">
                            <span class="font-medium">Код записи:</span>
                            <span class="font-bold text-blue-600"><?php echo htmlspecialchars($appointment['unique_code']); ?></span>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div class="p-4 bg-gray-50 rounded-lg">
                                <span class="block text-gray-600 mb-1">Пациент</span>
                                <span class="font-medium"><?php echo htmlspecialchars($appointment['patient_name']); ?></span>
                            </div>

                            <div class="p-4 bg-gray-50 rounded-lg">
                                <span class="block text-gray-600 mb-1">Телефон</span>
                                <span class="font-medium"><?php echo htmlspecialchars($appointment['phone']); ?></span>
                            </div>

                            <div class="p-4 bg-gray-50 rounded-lg">
                                <span class="block text-gray-600 mb-1">Услуга</span>
                                <span class="font-medium"><?php echo htmlspecialchars($appointment['service']); ?></span>
                            </div>

                            <div class="p-4 bg-gray-50 rounded-lg">
                                <span class="block text-gray-600 mb-1">Дата и время</span>
                                <span class="font-medium">
                                    <?php 
                                    echo date('d.m.Y', strtotime($appointment['slot_date'])) . ' ' . 
                                         date('H:i', strtotime($appointment['slot_time'])); 
                                    ?>
                                </span>
                            </div>

                            <div class="p-4 bg-gray-50 rounded-lg col-span-2">
                                <span class="block text-gray-600 mb-1">Специалист</span>
                                <span class="font-medium">
                                    <?php echo htmlspecialchars($appointment['specialist_name'] . ' - ' . $appointment['specialist_position']); ?>
                                </span>
                            </div>
                        </div>

                        <div class="mt-8 space-y-4">
                            <button onclick="copyTicketLink()" 
                                    class="w-full bg-blue-600 text-white py-3 px-6 rounded-lg hover:bg-blue-700 transition-colors">
                                <i class="fas fa-copy mr-2"></i>Скопировать ссылку на талон
                            </button>
                            
                            <a href="appointment.php" 
                               class="block text-center bg-gray-600 text-white py-3 px-6 rounded-lg hover:bg-gray-700 transition-colors">
                                Создать новую запись
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8">
        <div class="container mx-auto px-4">
            <div class="text-center">
                <p>&copy; 2023 Стоматологическая клиника. Все права защищены.</p>
            </div>
        </div>
    </footer>

    <script>
    function copyTicketLink() {
        const url = window.location.href;
        
        // Создаем временный input элемент
        const tempInput = document.createElement('input');
        tempInput.value = url;
        document.body.appendChild(tempInput);
        
        // Выбираем и копируем текст
        tempInput.select();
        tempInput.setSelectionRange(0, 99999);
        
        try {
            document.execCommand('copy');
            // Показываем уведомление об успешном копировании
            const button = document.querySelector('button');
            const originalText = button.innerHTML;
            button.innerHTML = '<i class="fas fa-check mr-2"></i>Ссылка скопирована!';
            button.classList.add('bg-green-600');
            button.classList.remove('bg-blue-600');
            
            // Возвращаем исходный вид кнопки через 2 секунды
            setTimeout(() => {
                button.innerHTML = originalText;
                button.classList.remove('bg-green-600');
                button.classList.add('bg-blue-600');
            }, 2000);
        } catch (err) {
            console.error('Ошибка при копировании:', err);
            alert('Не удалось скопировать ссылку. Пожалуйста, скопируйте ссылку вручную.');
        }
        
        // Удаляем временный элемент
        document.body.removeChild(tempInput);
    }
    </script>
</body>
</html> 