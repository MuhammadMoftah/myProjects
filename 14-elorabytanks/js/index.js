/*global $ , console , alert , document, window */

$("body").niceScroll({
cursorcolor:"var(--clr)",
cursorwidth:"10px"
});

$('.slider').slick({
  slidesToShow: 4,
  slidesToScroll: 1,
  rtl:true,
  autoplay: true,
  autoplaySpeed: 2000,
  arrows: false,
    
    responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
      }
    }
  ]
});


//==== Open Search Box =====
    function openSearch() {
        $('.search-overlay').slideDown(500);
    }

//==== Close Search Box =====
    function closeSearch() {
        $('.search-overlay').slideUp(200);
    }
    
//==== onStart Function =====
$(function () {
    'use strict';
    
    $('.cover button').click(function(){
        $('html, body').animate({scrollTop : 650},800);
        return false;
    });
    
    
    $(window).scroll(function(){
        if ($(this).scrollTop() > 800) {
            $('.scrollButton' ).fadeIn();
        } else {
            $('.scrollButton ').fadeOut();
        }
    });
    $('.scrollButton').click(function(){
        $('html, body').animate({scrollTop : 0},800);
        return false;
    });

    
   $(window).on('scroll', function(){
       if( $(window).scrollTop() > 50 ){
           $('nav').addClass("myNav");
       } else {
           $('nav').removeClass("myNav");
       }
       
   })
  

    
//==== Modal ====
//==== Modal ====
var modal = document.getElementById('myModal');

var img = document.getElementById('myImg');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}

















});//end