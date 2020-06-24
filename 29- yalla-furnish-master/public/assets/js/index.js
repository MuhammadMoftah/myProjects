/*global $ , console , alert , document, window */


$(function () {
    'use strict';
   //Check to see if the window is top if not then display button
    $(window).scroll(function(){
        if ($(this).scrollTop() > 600) {
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

    $('[data-toggle="popover"]').popover();
});


//==== Manual Navbar Tabs ====
$("#product").click(function(){
    $('#product-content').siblings().css("display","none"); 
    $('#product-content').fadeIn(1000); 
});

$("#offers").click(function(){
    $('#offers-content').siblings().css("display","none"); 
    $('#offers-content').fadeIn(1000); 
});

$("#reviews").click(function(){
    $('#reviews-content').siblings().css("display","none"); 
    $('#reviews-content').fadeIn(1000); 
});

$("#info").click(function(){
    $('#info-content').siblings().css("display","none"); 
    $('#info-content').fadeIn(1000); 
});

$("#events").click(function(){
    $('#events-content').siblings().css("display","none"); 
    $('#events-content').fadeIn(1000); 
});

$("#idea").click(function(){
    $('#ideas-content').siblings().css("display","none"); 
    $('#ideas-content').fadeIn(1000); 
});