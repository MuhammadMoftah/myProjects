/*global $ , console , alert , document, window */
$(function () {
    'use strict';

    
 //Change Navbar when Scroll
$(window).on('scroll', function (){
    if($(window).scrollTop() > 0 ){
        $('.navbar').addClass('navfixed');
    }else{
        $('.navbar').removeClass('navfixed');
    }
    
});

$('#testi').carousel({
    interval: 2500
});
 



}); //End Start Function