/*global $ , console , alert , document, window */
$(function () {
    'use strict';
    //Test
    console.log('Starttttt');
    
    // Control Carousel Speed
    $('.carousel').carousel({
        interval: 4000
    });
    
    // From home page to Products page
    $(".products > div.col-md-3").on("click", function () {
        window.location = "one-product.html";
    });
    
    
    // From Home page to Products page
    $(".news .part").on("click", function () {
        window.location = "one-news.html";
    });
    
    
    
    $('.flexslider').flexslider({
        animation: "fade",
        controlNav: "thumbnails",
    });
    
    $('.flexslider span').on('click', function () {
        $('.modal-body img').attr('src', $(this).siblings().attr("src"));
        console.log($(this).siblings().attr("src"));
    });
    


    


    
    
});
























