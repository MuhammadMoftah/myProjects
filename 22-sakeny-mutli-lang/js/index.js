/*global $ , console , alert , document, window */
$(function () {
    'use strict';
    //Responsive Font

    $('[data-toggle="popover"]').popover();


    var swiper = new Swiper('.swiper-container', {
        slidesPerView: 5,
        spaceBetween: 10,
        breakpoints: {
            // when window width is <= 480px
            480: {
                slidesPerView: 2,
                spaceBetween: 20
            },
            // when window width is <= 640px
            640: {
                slidesPerView: 3,
                spaceBetween: 30
            }
        }

    });

    new WOW().init();

}); //start function
