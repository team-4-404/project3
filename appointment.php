<?php
require_once 'config.php';

$specialist_id = isset($_GET['specialist']) ? (int)$_GET['specialist'] : null;
$specialist = null;

if ($specialist_id) {
    $stmt = $pdo->prepare("SELECT * FROM specialists WHERE id = ?");
    $stmt->execute([$specialist_id]);
    $specialist = $stmt->fetch(PDO::FETCH_ASSOC);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $unique_code = substr(md5(uniqid()), 0, 8);
        
        $stmt = $pdo->prepare("
            INSERT INTO appointments 
            (patient_name, phone, service, slot_id, unique_code) 
            VALUES (?, ?, ?, ?, ?)
        ");
        
        $stmt->execute([
            $_POST['name'],
            $_POST['phone'],
            $_POST['service'],
            $_POST['slot_id'],
            $unique_code
        ]);
        
        $appointment_id = $pdo->lastInsertId();
        header("Location: appointment_ticket.php?code=" . $unique_code);
        exit;
    } catch (PDOException $e) {
        $error = "Ошибка при создании записи: " . $e->getMessage();
    }
}

// Получение списка специалистов для выпадающего списка
$stmt = $pdo->query("SELECT id, name, position, specialization FROM specialists ORDER BY position, name");
$specialists = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Запись на прием - Стоматологическая клиника</title>
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

    <!-- Appointment Form Section -->
    <section class="appointment py-16">
        <div class="container mx-auto px-4">
            <h1 class="text-4xl font-bold text-center mb-12">Запись на прием</h1>
            
            <?php if (isset($error)): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    <?php echo htmlspecialchars($error); ?>
                </div>
            <?php endif; ?>

            <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-lg p-8">
                <form method="POST" class="space-y-6">
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Ваше имя</label>
                        <input type="text" name="name" required
                               class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Телефон</label>
                        <input type="tel" name="phone" required
                               class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Услуга</label>
                        <select name="service" id="service" required
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                            <option value="">Выберите услугу</option>
                            <option value="therapy">Терапия</option>
                            <option value="pediatric">Детская стоматология</option>
                            <option value="surgery">Хирургия</option>
                            <option value="orthopedics">Ортопедия</option>
                            <option value="orthodontics">Ортодонтия</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Специалист</label>
                        <select name="specialist_id" id="specialist" required
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                            <option value="">Выберите специалиста</option>
                            <?php foreach ($specialists as $spec): ?>
                                <option value="<?php echo $spec['id']; ?>" 
                                        data-specialization="<?php echo htmlspecialchars($spec['specialization']); ?>"
                                        <?php echo ($specialist_id == $spec['id']) ? 'selected' : ''; ?>>
                                    <?php echo htmlspecialchars($spec['name'] . ' - ' . $spec['position']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Дата приема</label>
                        <input type="date" id="appointment_date" required
                               min="<?php echo date('Y-m-d'); ?>"
                               class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                    </div>

                    <div id="time_slots" class="hidden">
                        <label class="block text-gray-700 font-medium mb-2">Время приема</label>
                        <div class="grid grid-cols-4 gap-2" id="slots_container">
                            <!-- Слоты будут добавлены через JavaScript -->
                        </div>
                    </div>

                    <input type="hidden" name="slot_id" id="selected_slot" required>

                    <button type="submit" 
                            class="w-full bg-blue-600 text-white py-3 px-6 rounded-lg hover:bg-blue-700 transition-colors">
                        Записаться на прием
                    </button>
                </form>
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
    document.addEventListener('DOMContentLoaded', function() {
        const specialistSelect = document.getElementById('specialist');
        const serviceSelect = document.getElementById('service');
        const dateInput = document.getElementById('appointment_date');
        const timeSlotsDiv = document.getElementById('time_slots');
        const slotsContainer = document.getElementById('slots_container');
        const selectedSlotInput = document.getElementById('selected_slot');

        // Функция для фильтрации специалистов по услуге
        function filterSpecialistsByService(service) {
            Array.from(specialistSelect.options).forEach(option => {
                if (option.value === '') return; // Пропускаем первый пустой option
                
                const specialization = option.getAttribute('data-specialization');
                if (service === '' || specialization === service) {
                    option.style.display = '';
                } else {
                    option.style.display = 'none';
                }
            });
        }

        // Функция для фильтрации услуг по специалисту
        function filterServicesBySpecialist(specialistId) {
            const selectedOption = specialistSelect.options[specialistSelect.selectedIndex];
            const specialization = selectedOption.getAttribute('data-specialization');
            
            if (specialization) {
                serviceSelect.value = specialization;
            }
        }

        // Обработчик изменения услуги
        serviceSelect.addEventListener('change', function() {
            filterSpecialistsByService(this.value);
            loadTimeSlots();
        });

        // Обработчик изменения специалиста
        specialistSelect.addEventListener('change', function() {
            filterServicesBySpecialist(this.value);
            loadTimeSlots();
        });

        function loadTimeSlots() {
            const specialistId = specialistSelect.value;
            const date = dateInput.value;

            if (!specialistId || !date) {
                timeSlotsDiv.classList.add('hidden');
                return;
            }

            fetch(`get_slots.php?specialist_id=${specialistId}&date=${date}`)
                .then(response => response.json())
                .then(data => {
                    slotsContainer.innerHTML = '';
                    
                    if (data.slots.length === 0) {
                        slotsContainer.innerHTML = '<p class="col-span-4 text-center text-gray-500">Нет доступных слотов на эту дату</p>';
                        timeSlotsDiv.classList.remove('hidden');
                        return;
                    }

                    data.slots.forEach(slot => {
                        const button = document.createElement('button');
                        button.type = 'button';
                        button.className = `p-2 text-center rounded-lg transition-colors ${
                            slot.is_available 
                                ? 'bg-blue-100 hover:bg-blue-200 text-blue-800' 
                                : 'bg-gray-100 text-gray-400 cursor-not-allowed'
                        }`;
                        button.textContent = slot.time.substring(0, 5);
                        button.disabled = !slot.is_available;

                        if (slot.is_available) {
                            button.onclick = () => {
                                document.querySelectorAll('#slots_container button').forEach(btn => {
                                    btn.classList.remove('bg-blue-600', 'text-white');
                                    btn.classList.add('bg-blue-100', 'text-blue-800');
                                });
                                
                                button.classList.remove('bg-blue-100', 'text-blue-800');
                                button.classList.add('bg-blue-600', 'text-white');
                                
                                selectedSlotInput.value = slot.id;
                            };
                        }

                        slotsContainer.appendChild(button);
                    });

                    timeSlotsDiv.classList.remove('hidden');
                })
                .catch(error => {
                    console.error('Ошибка при загрузке слотов:', error);
                    slotsContainer.innerHTML = '<p class="col-span-4 text-center text-red-500">Ошибка при загрузке слотов</p>';
                });
        }

        dateInput.addEventListener('change', loadTimeSlots);
    });
    </script>
</body>
</html>