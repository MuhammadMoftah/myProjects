/*global $ , console , alert , document, window, jslint plusplus: true  */
$(function () {
    //NavBar Active
    $('.navbar-nav li').on('click', function(){
       $(this).addClass('active');
        $(this).siblings().removeClass('active');
    });
});




//Cover Slider
$('.head .cover').slick({
  speed: 500,
  infinite: true,
  slidesToShow: 3,
  slidesToScroll: 1,
  autoplay:true,
  autoplaySpeed:3000,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 2,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
      }
    }
 
  ]
});








// Sponsor Slider at Footer
$('.cont .owl-carousel').owlCarousel({
    rtl:true,
    center: true,
    dots:false,
    loop:true,
    autoWidth:true,    
    autoplay:true,
    autoplayTimeout:1500,
});






