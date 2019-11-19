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

    
//NavBar on Click
$("nav #home").click(function() {
    $('html, body').animate({
        scrollTop: $(".first").offset().top
    }, 1500);
});
$("nav #about").click(function() {
    $('html, body').animate({
        scrollTop: $(".about").offset().top 
    }, 1500);
});
$("nav #how").click(function() {
    $('html, body').animate({
        scrollTop: $(".how").offset().top
    }, 1500);
});
$("nav #why").click(function() {
    $('html, body').animate({
        scrollTop: $(".why").offset().top
    }, 1500);
});
$("nav #serv").click(function() {
    $('html, body').animate({
        scrollTop: $(".cars").offset().top
    }, 1500);
});
$("nav #faq").click(function() {
    $('html, body').animate({
        scrollTop: $(".faq").offset().top
    }, 1500);
});
$("nav #cont").click(function() {
    $('html, body').animate({
        scrollTop: $(".contact").offset().top
    }, 1500);
});
    
    
//Fixed Button in footer
$('.fixbtn').click(function () {
    $('html, body').animate({
        scrollTop: $(".first").offset().top
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
    
    
    
    
//Edit Color Box    
//Edit Color Box    
$(".clrbtn span").click(function(){
    if($(".clrbtn").css('left') == "-150px"){
        $(".clrbtn").animate({left:'+=150px'});
    }else{
            $(".clrbtn").animate({left: '-=150px'});
    }
}); 
    
$(".clrbtn button").click(function(){
     $('#color').attr('href', $(this).data('value'));
});

    
 

    
//Toggle The Mobile Menu
$('.navbar .navbar-toggle').on('click',function(){

    switch ( $('.app-links').css('display') == 'block' ) {
        case false:
            $('.app-links').css('display','block');
            $('.navbar .navbar-nav').css('left', '0');
           
            break;
        case true:
            $('.app-links').css('display','none');
            $('.navbar .navbar-nav').css('left', '-270');
            
            break;   
    }

});
  
    
 $(window).resize(function(){
	if ($(window).width() >= 1183){	
		console.log('Window ' +$(window).width());
		console.log('body ' + $('body').width());
		console.log('html ' + $('html').width());
        $('.app-links').css('display','block');
	}else{
       $('.app-links').css('display','none'); 
    }
});


    
    
 
    
$('.users').siblings().hide().end().fadeIn(0);  
$('#one').on('click',function(){
    $('.users').siblings().fadeOut(0).end().fadeIn(0);
    $(this).siblings().removeClass('active').end().addClass('active');
});

$('#two').on('click',function(){
    $('.drivers').siblings().fadeOut(0).end().fadeIn(0);
    $(this).siblings().removeClass('active').end().addClass('active');
});
    
$('#three').on('click',function(){
    $('.owners').siblings().fadeOut(0).end().fadeIn(0);
$(this).siblings().removeClass('active').end().addClass('active');
});




}); //End Start Function