/*global $ , console , alert , document, window */
$(function () {
    'use strict';

    $('.offers').click(function () {
        $('html,body').animate({
            scrollTop: $('#offers').offset().top
        }, 1500);
    });

    $('.about-us').click(function () {
        $('html,body').animate({
            scrollTop: $('#about').offset().top
        }, 1500);
    });

    $('.about-us2').click(function () {
        $('html,body').animate({
            scrollTop: $('#about').offset().top
        }, 1500);
    });

    $('.contact').click(function () {
        $('html,body').animate({
            scrollTop: $('#contact').offset().top
        }, 1500);
    });

    //Check to see if the window is top if not then display button
    $(window).scroll(function(){
        if ($(this).scrollTop() > 1000) {
            $('.scrollToTop').fadeIn();
        } else {
            $('.scrollToTop').fadeOut();
        }
    });

    //Click event to scroll to top
    $('.scrollToTop').click(function(){
        $('html, body').animate({scrollTop : 0},800);
        return false;
    });
});
