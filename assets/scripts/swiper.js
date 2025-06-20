const swiper = new Swiper('.partner-swiper', {
    slidesPerView: 6,
    spaceBetween: 20,
    navigation: {
        nextEl: '.partner-swiper .swiper-button-next',
        prevEl: '.partner-swiper .swiper-button-prev',
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

const tombolaSwiper = new Swiper('.tombola-swiper', {
    slidesPerView: 1,
    spaceBetween: 30,
    centeredSlides: false,
    navigation: {
        nextEl: '.tombola-swiper .swiper-button-next',
        prevEl: '.tombola-swiper .swiper-button-prev',
    },
    autoplay:
        {
            delay: 2500,
            disableOnInteraction: false,
            pauseOnMouseEnter: true,
        },
    loop: true,
    breakpoints: {
        640: {
            slidesPerView: 2,
            spaceBetween: 20
        },
        1024: {
            slidesPerView: 3,
            spaceBetween: 30,
            centeredSlides: false
        }
    }
});