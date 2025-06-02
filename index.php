<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Стоматологическая клиника</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css">
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
                <a href="specialists.html" class="text-gray-700 hover:text-blue-600 font-medium">Специалисты</a>
                <a href="contacts.html" class="text-gray-700 hover:text-blue-600 font-medium">Контакты</a>
                <a href="advice.html" class="text-gray-700 hover:text-blue-600 font-medium">Советы по уходу</a>
            </nav>
            <div class="hidden lg:flex items-center space-x-6">
                <div class="flex items-center space-x-2">
                    <i class="fas fa-phone text-blue-600"></i>
                    <a href="tel:+71234567890" class="text-gray-800 font-medium hover:text-blue-600">+7 (123) 456-78-90</a>
                </div>
                <div class="flex items-center space-x-2">
                    <i class="fas fa-map-marker-alt text-blue-600"></i>
                    <a href="https://clck.ru/3M96ZN" class="text-gray-800 hover:text-blue-600">г. Москва, ул. Примерная, д. 1</a>
                </div>
            </div>
            <a href="#appointment" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-medium transition-colors">Записаться</a>
        </div>
    </header>

    <!-- Модальные окна для услуг -->
    <div id="therapyModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h3>Терапия</h3>
            <p>Полный спектр терапевтических услуг:</p>
            <ul>
                <li>Лечение кариеса - от 3 000 руб.</li>
                <li>Реставрация зуба - от 5 000 руб.</li>
                <li>Профессиональная чистка - от 4 000 руб.</li>
                <li>Отбеливание - от 8 000 руб.</li>
            </ul>
            <a href="#appointment" class="btn btn-primary">Записаться</a>
        </div>
    </div>

    <div id="surgeryModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h3>Хирургия</h3>
            <p>Хирургические услуги:</p>
            <ul>
                <li>Удаление зуба простое - от 2 500 руб.</li>
                <li>Удаление зуба сложное - от 5 000 руб.</li>
                <li>Имплантация (под ключ) - от 35 000 руб.</li>
                <li>Костная пластика - от 15 000 руб.</li>
            </ul>
            <a href="#appointment" class="btn btn-primary">Записаться</a>
        </div>
    </div>

    <div id="orthopedicsModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h3>Ортопедия</h3>
            <p>Услуги ортопедии:</p>
            <ul>
                <li>Коронка металлокерамическая - от 12 000 руб.</li>
                <li>Коронка циркониевая - от 25 000 руб.</li>
                <li>Виниры - от 20 000 руб.</li>
                <li>Мостовидный протез - от 30 000 руб.</li>
            </ul>
            <a href="#appointment" class="btn btn-primary">Записаться</a>
        </div>
    </div>
    
        <div id="childrenModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h3>Детская стоматология</h3>
            <p>Все услуги и цены уточняйте у ортодонта</p>
            <a href="#appointment" class="btn btn-primary">Записаться</a>
        </div>
    </div>

    <div id="orthodonticsModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h3>Ортодонтия</h3>
            <p>Услуги ортодонтии:</p>
            <ul>
                <li>Металлические брекеты - от 50 000 руб.</li>
                <li>Керамические брекеты - от 80 000 руб.</li>
                <li>Элайнеры - от 100 000 руб.</li>
                <li>Ретейнеры - от 5 000 руб.</li>
            </ul>
            <a href="#appointment" class="btn btn-primary">Записаться</a>
        </div>
    </div>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h1>Ваша улыбка - наша забота</h1>
                <p class="hero-text">Современная стоматология с заботой о каждом пациенте. Мы предлагаем профессиональное лечение и индивидуальный подход к вашему здоровью.</p>
                <div class="hero-buttons">
                    <a href="#appointment" class="btn btn-primary">Записаться на прием</a>
                    <a href="advice.html" class="btn btn-secondary">Советы по уходу</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Services -->
    <section id="services" class="services">
        <div class="container">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-8">Наши услуги</h2>
            <div class="services-grid">
                <div class="service-card">
                    <img src="images/therapy.jpg" alt="Терапия">
                    <div class="content">
                        <h3>Терапия</h3>
                        <p>Лечение кариеса, реставрация зубов, профессиональная чистка и отбеливание</p>
                        <ul class="service-features">
                            <li><i class="fas fa-check"></i> Безболезненное лечение</li>
                            <li><i class="fas fa-check"></i> Современные материалы</li>
                            <li><i class="fas fa-check"></i> Гарантия качества</li>
                        </ul>
                        <button class="btn btn-primary show-modal" data-modal="therapyModal">Подробнее</button>
                    </div>
                </div>
                <div class="service-card">
                    <img src="images/pediatric.jpg" alt="Детская стоматология">
                    <div class="content">
                        <h3>Детская стоматология</h3>
                        <p>Бережный подход к лечению зубов у детей с использованием современных методик</p>
                        <ul class="service-features">
                            <li><i class="fas fa-check"></i> Игровая форма лечения</li>
                            <li><i class="fas fa-check"></i> Специальное оборудование</li>
                            <li><i class="fas fa-check"></i> Опытные специалисты</li>
                        </ul>
                        <button class="btn btn-primary show-modal" data-modal="childrenModal">Подробнее</button>
                    </div>
                </div>
                <div class="service-card">
                    <img src="images/surgery.jpg" alt="Хирургия">
                    <div class="content">
                        <h3>Хирургия</h3>
                        <p>Удаление зубов любой сложности, имплантация, костная пластика. Все процедуры безболезненны</p>
                        <ul class="service-features">
                            <li><i class="fas fa-check"></i> 3D-планирование</li>
                            <li><i class="fas fa-check"></i> Быстрое восстановление</li>
                            <li><i class="fas fa-check"></i> Премиум импланты</li>
                        </ul>
                        <button class="btn btn-primary show-modal" data-modal="surgeryModal">Подробнее</button>
                    </div>
                </div>
                <div class="service-card">
                    <img src="images/orthopedics.jpg" alt="Ортопедия">
                    <div class="content">
                        <h3>Ортопедия</h3>
                        <p>Протезирование зубов, установка коронок, виниров и мостов наивысшего качества</p>
                        <ul class="service-features">
                            <li><i class="fas fa-check"></i> Цифровое моделирование</li>
                            <li><i class="fas fa-check"></i> Эстетичный результат</li>
                            <li><i class="fas fa-check"></i> Долговечность</li>
                        </ul>
                        <button class="btn btn-primary show-modal" data-modal="orthopedicsModal">Подробнее</button>
                    </div>
                </div>
                <div class="service-card">
                    <img src="images/orthodontics.jpg" alt="Ортодонтия">
                    <div class="content">
                        <h3>Ортодонтия</h3>
                        <p>Исправление прикуса брекетами и элайнерами для детей и взрослых по оптимальной цене</p>
                        <ul class="service-features">
                            <li><i class="fas fa-check"></i> Индивидуальный план</li>
                            <li><i class="fas fa-check"></i> Различные системы</li>
                            <li><i class="fas fa-check"></i> Контроль результата</li>
                        </ul>
                        <button class="btn btn-primary show-modal" data-modal="orthodonticsModal">Подробнее</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Us -->
    <section id="about" class="about">
        <div class="container">
            <div class="about-content">
                <div class="about-text">
                    <h2>О нас</h2>
                    <p>15 лет заботимся о здоровье ваших зубов</p>
                    <ul class="benefits">
                        <li>Современное оборудование</li>
                        <li>Опытные специалисты</li>
                        <li>Гарантия на все услуги</li>
                        <li>Комфортное лечение</li>
                    </ul>
                </div>
                <div class="about-image">
                    <img src="images/about.jpg" alt="О клинике">
                </div>
            </div>
        </div>
    </section>

    <!-- Specialists -->
    <section id="specialists" class="specialists">
        <div class="container">
            <h2>Наши специалисты</h2>
            <div class="specialists-grid">
                <div class="specialist-card">
                    <img src="images/doctor1.png" alt="Врач">
                    <div class="content">
                        <h3>Дубровская Мария</h3>
                        <p>Стоматолог-терапевт</p>
                        <a href="#appointment" class="btn btn-primary">Записаться</a>
                    </div>
                </div>
                <div class="specialist-card">
                    <img src="images/doctor2.png" alt="Врач">
                    <div class="content">
                        <h3>Сташкова Софья</h3>
                        <p>Стоматолог-ортодонт</p>
                        <a href="#appointment" class="btn btn-primary">Записаться</a>
                    </div>
                </div>
                <div class="specialist-card">
                    <img src="images/doctor3.png" alt="Врач">
                    <div class="content">
                        <h3>Фомкин Георгий</h3>
                        <p>Стоматолог-хирург</p>
                        <a href="#appointment" class="btn btn-primary">Записаться</a>
                    </div>
                </div>
                <div class="specialist-card">
                    <img src="images/doctor4.png" alt="Врач">
                    <div class="content">
                        <h3>Яман Зейнеп</h3>
                        <p>Детский стоматолог</p>
                        <a href="#appointment" class="btn btn-primary">Записаться</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Reviews Section -->
   <section class="reviews">
        <div class="container">
            <div class="reviews-wrapper">
                <div class="reviews-text">
                    <h2>Отзывы пациентов</h2>
                    <p class="reviews-description">Лучше всего о качестве нашей работы расскажут отзывы наших пациентов. Мы гордимся тем, что помогаем людям обрести красивую и здоровую улыбку.</p>
                    <button class="btn btn-primary leave-review-btn">
                        <i class="fas fa-comment-medical"></i>
                        Оставить отзыв
                    </button>
                </div>
                <div class="reviews-slider">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="review-card">
                                <div class="review-header">
                                    <img src="images/avatar1.jpg" alt="Анна Петрова" class="review-avatar">
                                    <div class="review-info">
                                        <h4>Анна Петрова</h4>
                                        <div class="stars">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <span class="review-date">15 октября 2023</span>
                                    </div>
                                </div>
                                <p>Отличная клиника! Профессиональный подход и внимательное отношение к пациентам. Особая благодарность доктору Дубровской М.А. за чуткость и мастерство.</p>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="review-card">
                                <div class="review-header">
                                    <img src="images/avatar3.jpg" alt="Марина Кузнецова" class="review-avatar">
                                    <div class="review-info">
                                        <h4>Марина Кузнецова</h4>
                                        <div class="stars">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <span class="review-date">18 ноября 2023</span>
                                    </div>
                                </div>
                                <p>Привела ребёнка на приём — врач нашёл подход, всё прошло спокойно. Очень комфортная обстановка, рекомендуем!</p>
                            </div>
                        </div>                        
                        <div class="swiper-slide">
                            <div class="review-card">
                                <div class="review-header">
                                    <img src="images/avatar2.jpg" alt="Игорь Смирнов" class="review-avatar">
                                    <div class="review-info">
                                        <h4>Игорь Смирнов</h4>
                                        <div class="stars">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                        </div>
                                        <span class="review-date">2 сентября 2023</span>
                                    </div>
                                </div>
                                <p>Очень боялся лечить зубы, но здесь мне всё подробно объяснили и сделали абсолютно без боли. Спасибо доктору Евсееву А.А.!</p>
                            </div>
                        </div>                        
                        <!-- остальные слайды  -->
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </section>

        <!-- Appointment Form -->
        <section id="appointment" class="appointment">
            <div class="container">
                <h2>Все еще не уверены в Вашем выборе? Запишитесь на бесплатную консультацию!</h2>
                <div class="appointment-wrapper">
                    <form class="appointment-form">
                        <div class="form-group">
                            <input type="text" placeholder="Ваше имя" required>
                        </div>
                        <div class="form-group">
                            <input type="tel" placeholder="Телефон" required>
                        </div>
                        <div class="form-group">
                            <select required>
                                <option value="">Выберите услугу</option>
                                <option value="therapy">Терапия</option>
                                <option value="pediatric">Детская стоматология</option>
                                <option value="surgery">Хирургия</option>
                                <option value="orthopedics">Ортопедия</option>
                                <option value="orthodontics">Ортодонтия</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="datetime-local" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Записаться</button>
                    </form>
                    <div class="appointment-image">
                        <img src="https://images.unsplash.com/photo-1629909615184-74f495363b67?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=880&q=80" 
                             alt="Запись к врачу">
                    </div>
                </div>
            </div>
        </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-info">
                    <div class="footer-logo">
                        <img src="images/logo.png" alt="Логотип клиники">
                    </div>
                    <p class="footer-description">Мы заботимся о здоровье ваших зубов и делаем это профессионально уже более 15 лет.</p>
                    <div class="social-links">
                        <a href="#" aria-label="Вконтакте"><i class="fab fa-vk"></i></a>
                        <a href="#" aria-label="Telegram"><i class="fab fa-telegram"></i></a>
                        <a href="#" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
                
                <div class="footer-contacts">
                    <h3>Контакты</h3>
                    <div class="contact-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <div>
                            <a>г.Москва, ул.Примерная, д.1</a><br>
                            <small>Пн-Вс: 9:00 - 21:00</small>
                        </div>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-phone"></i>
                        <div>
                            <a href="tel:+71234567890">+7 (123) 456-78-90</a><br>
                            <small>Ежедневно с 9:00 до 21:00</small>
                        </div>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <div>
                            <a href="mailto:info@dentclinic.ru">info@dentclinic.ru</a><br>
                            <small>Онлайн-консультация</small>
                        </div>
                    </div>
                </div>

                <div class="footer-links">
                    <h3>Услуги</h3>
                    <ul>
                        <li><a href="#services">Терапия</a></li>
                        <li><a href="#services">Хирургия</a></li>
                        <li><a href="#services">Ортопедия</a></li>
                        <li><a href="#services">Ортодонтия</a></li>
                        <li><a href="#services">Детская стоматология</a></li>
                    </ul>
                </div>

                <div class="footer-newsletter">
                    <h3>Подпишитесь на новости</h3>
                    <p>Получайте информацию о наших акциях и специальных предложениях</p>
                    <form class="newsletter-form">
                        <input type="email" placeholder="Ваш email" required>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </form>
                </div>
            </div>

            <div class="map">
                <div id="yandex-map" style="width:100%; height:300px;"></div>
            </div>
            

            <div class="footer-bottom">
                <div class="footer-copyright">
                    <p>&copy; 2023 Стоматологическая клиника. Все права защищены.</p>
                </div>
                <div class="footer-policy">
                    <a href="#">Политика конфиденциальности</a>
                    <a href="#">Пользовательское соглашение</a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://api-maps.yandex.ru/2.1/?apikey=ваш_API_ключ&lang=ru_RU"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script>
        // Модальные окна
        document.querySelectorAll('.show-modal').forEach(button => {
            button.addEventListener('click', function() {
                const modalId = this.getAttribute('data-modal');
                const modal = document.getElementById(modalId);
                modal.style.display = "block";
            });
        });

        document.querySelectorAll('.close').forEach(span => {
            span.addEventListener('click', function() {
                this.closest('.modal').style.display = "none";
            });
        });

        window.onclick = function(event) {
            if (event.target.className === 'modal') {
                event.target.style.display = "none";
            }
        }

        // Карта и другие скрипты остаются без изменений
        ymaps.ready(function () {
            var myMap = new ymaps.Map('yandex-map', {
                center: [55.7558, 37.6173],
                zoom: 16
            });

            var myPlacemark = new ymaps.Placemark([55.7558, 37.6173], {
                balloonContent: 'г. Москва, ул. Примерная, д. 1'
            }, {
                preset: 'islands#blueHealthcareIcon'
            });

            myMap.geoObjects.add(myPlacemark);
            myMap.behaviors.disable('scrollZoom');
        });
        </script>
        <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
        <script src="script.js"></script>
</body>
</html>