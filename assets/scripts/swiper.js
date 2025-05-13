const swiper = new Swiper('.swiper', {
    slidesPerView: 6,
    spaceBetween: 20,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    autoplay:
    {
        delay: 2500,
        disableOnInteraction: false,
        pauseOnMouseEnter: true,
    },
    loop: true,
    breakpoints: {
        // when window width is >= 320px
        320: {
            slidesPerView: 2,
            spaceBetween: 20
        },
        // when window width is >= 480px
        480: {
            slidesPerView: 3,
            spaceBetween: 20
        },
        // when window width is >= 768px
        768: {
            slidesPerView: 4,
            spaceBetween: 20
        },
        // when window width is >= 1024px
        1024: {
            slidesPerView: 6,
            spaceBetween: 20
        }
    }
});