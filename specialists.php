<?php
require_once 'config.php';

// Получение списка специалистов
$stmt = $pdo->query("SELECT * FROM specialists ORDER BY position, name");
$specialists = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Наши специалисты - Стоматологическая клиника</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
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

    <!-- Specialists Section -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <h1 class="text-4xl font-bold text-center mb-12">Наши специалисты</h1>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <?php foreach ($specialists as $specialist): ?>
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <img src="<?php echo htmlspecialchars($specialist['image']); ?>" 
                         alt="<?php echo htmlspecialchars($specialist['name']); ?>" 
                         class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2"><?php echo htmlspecialchars($specialist['name']); ?></h3>
                        <p class="text-gray-600 mb-4"><?php echo htmlspecialchars($specialist['position']); ?></p>
                        
                        <div class="space-y-2 mb-4">
                            <p class="text-sm text-gray-500">
                                <i class="fas fa-graduation-cap mr-2"></i>
                                <?php echo htmlspecialchars($specialist['education']); ?>
                            </p>
                            <p class="text-sm text-gray-500">
                                <i class="fas fa-briefcase mr-2"></i>
                                Опыт работы: <?php echo $specialist['experience']; ?> лет
                            </p>
                        </div>
                        
                        <p class="text-gray-700 mb-6"><?php echo htmlspecialchars($specialist['description']); ?></p>
                        
                        <a href="appointment.php?specialist=<?php echo $specialist['id']; ?>" 
                           class="block text-center bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition-colors">
                            Записаться на прием
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
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
</body>
</html> 