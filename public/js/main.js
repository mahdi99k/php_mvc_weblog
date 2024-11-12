/* Swiper Js */
var swiper = new Swiper(".mySwiper", {
    cssMode: true,
    loop: true,  //حالت بی نهایت در اسلایدر
    mousewheel: true,
    keyboard: true,
    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
    },

    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,  //قابل کلیک شدن میشه
    },
});
/* Swiper Js */