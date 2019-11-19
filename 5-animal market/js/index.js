/*global $ , console , alert , document, window  */

$(function () {
    'use strict';
    console.log($('body > span').css('margin-right') >= "0px");
    
    //Active part in Navbar
    $('.navbar-right li').on('click', function () {
        $(this).toggleClass('active');
        $(this).siblings().removeClass('active');
    });
    
    
    $('body > span').on('click', function () {
        //Toggle Hidden menu
        if ($('.hidemenu').css('right') == "-250px"){
            $('.hidemenu').animate({'right': '0px'});
        }else{
            $('.hidemenu').animate({'right': '-250px'});
        }
        //Margin the Span of Menu
        if ($('body > span').css('margin-right') > "0px"){
            $('body > span').animate({'margin-right': '0px'});
        }else {
            $('body > span').animate({'margin-right': '190px'});
        }
    });

    
    
    $(window).scroll(function () {
    var $this = $(this),
        $head = $('#head');
    if ($this.scrollTop() > 80) {
      $('body > span').css('visibility', 'visible');
    } else {
       $('body > span').css('visibility', 'hidden');
       

    }
    });
    
    
    
    
    
    
   
    
    
    
    
    
    
});