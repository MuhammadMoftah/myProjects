/*global $ , console , alert , document, window */
$(function () {
    'use strict';
    console.log('testttttttt');
    
    //Active Navbar
    $("nav ul li").on('click', function(){
       $(this).siblings().removeClass("active"); 
       $(this).toggleClass("active"); 
    });
    
    
    //Dynamic Progress bas
    $('.side .skills .progress:nth-of-type(1) .progress-bar').animate({
        width: '90%'
    }, 2500);
    
    $('.side .skills .progress:nth-of-type(2) .progress-bar').animate({
        width: '60%'
    }, 2500);
    
    $('.side .skills .progress:nth-of-type(3) .progress-bar').animate({
        width: '75%'
    }, 2500);
    
    $('.side .personal .progress:nth-of-type(1) .progress-bar').animate({
        width: '60%'
    }, 2500);
    
    $('.side .personal .progress:nth-of-type(2) .progress-bar').animate({
        width: '75%'
    }, 2500);
    
    //Count from Zero
    $('.count').each(function () {
        $(this).prop('Counter',0).animate({
            Counter: $(this).text()
        }, {
            duration: 2900,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });
    
    if($(window).width() < 481)
        {
            $("body").css('backgroud-color', 'red')
        }
       
});
























