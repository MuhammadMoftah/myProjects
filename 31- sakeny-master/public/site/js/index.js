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


    //Media Query with Jquery with resize
    $(document).ready(function(){
        $(".pagination .active").nextAll().slice(0, 2).css({"display":"block"});
        $(".pagination .active").prevAll().slice(0, 1).css({"display":"block"});
        if ($(window).width() <= 768) {      
            $(".pagination .active").nextAll().slice(0, 2).css({"display":"block"});
            $(".pagination .active").prevAll().slice(0, 1).css({"display":"block"});
        } 

        $(window).resize(function(){
            if ($(window).width() <= 768) {  
                $(".pagination .active").nextAll().slice(0, 2).css({"display":"block"});
                $(".pagination .active").prevAll().slice(0, 1).css({"display":"block"});
            }     
        });
        
    });


    

    
    

    


}); //start function
