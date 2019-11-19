/*global $ , console , alert , document, window */
$(function () {
    'use strict';

    $('.index2').click(function () {
        $('html,body').animate({
            scrollTop: $('#index').offset().top
        }, 1500);
    });

    $('.services2').click(function () {
        $('html,body').animate({
            scrollTop: $('#services').offset().top
        }, 1500);
    });

    $('.about2').click(function () {
        $('html,body').animate({
            scrollTop: $('#about').offset().top
        }, 1500);
    });

    $('.clients2').click(function () {
        $('html,body').animate({
            scrollTop: $('#clients').offset().top
        }, 1500);
    });

    $('.contact2').click(function () {
        $('html,body').animate({
            scrollTop: $('#contact').offset().top
        }, 1500);
    });
});
