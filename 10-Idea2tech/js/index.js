/*global $ , console , alert , document, window */
$(function() {
'use strict';

//Projects Page
$(".choices li").on("click", function(){
        $(this).addClass("selected").siblings().removeClass('selected');
});
    


//At Services page
$(".fxdmenu #web").click(function() {
    $('html, body').animate({
        scrollTop: $(".first").offset().top
    }, 1500);
});
$(".fxdmenu #app").click(function() {
    $('html, body').animate({
        scrollTop: $(".app").offset().top 
    }, 1500);
});
$(".fxdmenu #iden").click(function() {
    $('html, body').animate({
        scrollTop: $(".desi").offset().top
    }, 1500);
});
$(".fxdmenu #media").click(function() {
    $('html, body').animate({
        scrollTop: $(".media").offset().top
    }, 1500);
});
$(".fxdmenu #mark").click(function() {
    $('html, body').animate({
        scrollTop: $(".mark").offset().top
    }, 1500);
});


//Fixed menu at Service page 
$(".fxdmenu .head").click(function() {
    $('.fxdmenu').toggleClass("hover");
});


//Fixed Button in footer
$('.fixbtn').click(function(){
    $('html, body').animate({
        scrollTop: $("nav").offset().top
    }, 1500);
});
  
$(window).scroll( function(){
   if($("body").scrollTop() > 1000){
       $('.fixbtn').fadeIn(1500);
   }
    else{
        $('.fixbtn').fadeOut(1000);
    }
});
    
    
    
    
    
});