document.addEventListener('DOMContentLoaded', function() {
    // Инициализация слайдера отзывов
    const swiper = new Swiper('.reviews-slider', {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            768: {
                slidesPerView: 1,
                spaceBetween: 20,
            },
            1024: {
                slidesPerView: 1,
                spaceBetween: 30,
            }
        }
    });
});



// Плавная прокрутка к секциям
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});

// Обработка формы записи
document.querySelector('.appointment-form').addEventListener('submit', function(e) {
    e.preventDefault();
    // Здесь будет логика отправки формы
    alert('Спасибо за запись! Мы свяжемся с вами в ближайшее время.');
});

