$(window).load(function()
  {
  
  $(".loading-overlay .loader").fadeOut(1000,
    function()
    {
      $(this).parent().fadeOut(2000,
      function(){
        $("body").css("overflow","auto");
          $("body").css("overflow-x","hidden");
        $(this).remove();
        });
    });
});


$(function() {
  $('a[href*=#]:not([href=#]):not(.carousel-control ,.tab)').click(function () { 
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top-30
        }, 1000);
        return false;
      }
    }
  });
  
});

    $(window).scroll(function () {
        if ($(this).scrollTop() >500) {
                $(".typeme").typed({
     strings: ["I'm Muhammad Moftah, FRONTEND Developer. <br> I have more than  2 years of experience in this field. <br>I have a bachelor degree in Computer Engineering.<br>I'm one of top 30% people working with Bootstrap according to Upwork.<br>I am working as FrontEnd web developer at Excelogica Company + Some freelance jobs. <br> Please feel free to contact me"]  ,
     startDelay:500,
     loop:false
    
    });
        }
        
    });




particlesJS("particles-js", {"particles":{"number":{"value":80,"density":{"enable":true,"value_area":800}},"color":{"value":"#ffffff"},"shape":{"type":"circle","stroke":{"width":0,"color":"#000000"},"polygon":{"nb_sides":5},"image":{"src":"img/github.svg","width":100,"height":100}},"opacity":{"value":0.5,"random":false,"anim":{"enable":false,"speed":1,"opacity_min":0.1,"sync":false}},"size":{"value":3,"random":true,"anim":{"enable":false,"speed":40,"size_min":0.1,"sync":false}},"line_linked":{"enable":true,"distance":150,"color":"#ffffff","opacity":0.4,"width":1},"move":{"enable":true,"speed":6,"direction":"none","random":false,"straight":false,"out_mode":"out","bounce":false,"attract":{"enable":false,"rotateX":600,"rotateY":1200}}},"interactivity":{"detect_on":"canvas","events":{"onhover":{"enable":true,"mode":"repulse"},"onclick":{"enable":true,"mode":"push"},"resize":true},"modes":{"grab":{"distance":400,"line_linked":{"opacity":1}},"bubble":{"distance":400,"size":40,"duration":2,"opacity":8,"speed":3},"repulse":{"distance":200,"duration":0.4},"push":{"particles_nb":4},"remove":{"particles_nb":2}}},"retina_detect":true});var count_particles, update; update = function() { if (window.pJSDom[0].pJS.particles && window.pJSDom[0].pJS.particles.array)  requestAnimationFrame(update); }; requestAnimationFrame(update);;



