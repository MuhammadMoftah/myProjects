/*global $ , console , alert , document, window */
$(function () {
    'use strict';

    //Check to see if the window is top if not then display button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 600) {
            $('.scrollToTop').fadeIn();
        } else {
            $('.scrollToTop').fadeOut();
        }
    });

    //Click event to scroll to top
    $('.scrollToTop').click(function () {
        $('html, body').animate({
            scrollTop: 0
        }, 800);
        return false;
    });

    $('[data-toggle="popover"]').popover();
});


//==== Manual Navbar Tabs in Showrooms ====
$("#product, #offers, #reviews, #info, #events").click(function () {
    $(this).siblings().removeClass('main-btn main-btn2').addClass('main-btn2');
    $(this).removeClass('main-btn2').addClass('main-btn');
    $('#product').removeClass('main-btn main-btn2');
})

$("#product").click(function () {
    $('#product-content').siblings().css("display", "none");
    $('#product-content').fadeIn(1000);
});

$("#offers").click(function () {
    $('#offers-content').siblings().css("display", "none");
    $('#offers-content').fadeIn(1000);
    //    === Make div square ===
    $('.trending .product-content .part').outerHeight($('.trending .product-content .part').outerWidth());
});

$("#reviews").click(function () {
    $('#reviews-content').siblings().css("display", "none");
    $('#reviews-content').fadeIn(1000);
});

$("#info").click(function () {
    $('#info-content').siblings().css("display", "none");
    $('#info-content').fadeIn(1000);
});

$("#events").click(function () {
    $('#events-content').siblings().css("display", "none");
    $('#events-content').fadeIn(1000);
});

//==== Manual Navbar Tabs in UserProfile ====
$(".user-profile .showroom-nav p").click(function () {
    $(this).siblings().removeClass('active');
    $(this).addClass('active');
});

$('#edit-profile').click(function () {
    $(".user-profile .showroom-nav p").removeClass('active');
})

$("#boards").click(function () {
    $('#boards-content').siblings().css("display", "none");
    $('#boards-content').fadeIn(1000);
});




 
 


$("#design").click(function () {
    $('#design-content').siblings().css("display", "none");
    $('#design-content').fadeIn(1000);
});

$("#comparison").click(function () {
    $('#comparison-content').siblings().css("display", "none");
    $('#comparison-content').fadeIn(1000);
});

$("#updates").click(function () {
    $('#updates-content').siblings().css("display", "none");
    $('#updates-content').fadeIn(1000);
});

$("#activity").click(function () {
    $('#activity-content').siblings().css("display", "none");
    $('#activity-content').fadeIn(1000);
});

$("#topics").click(function () {
    $('#topics-content').siblings().css("display", "none");
    $('#topics-content').fadeIn(1000);
});

$("#ideas").click(function () {
    $('#ideas-content').siblings().css("display", "none");
    $('#ideas-content').fadeIn(1000);
});

$("#edit-profile").click(function () {
    $('#edit-profile-content').siblings().css("display", "none");
    $('#edit-profile-content').fadeIn(1000);
});

$(".boardtoclick").click(function () {
    let x = $(this).data().id;
    $("" + x + "").siblings().css("display", "none");
    $("" + x + "").fadeIn(1000);
});

//=== Single board navbar ===
$('.user-profile .one-board-section nav a').click(function () {
    $(this).addClass('active').siblings().removeClass('active');
})
//=== Make div square ===
//$('.vendors .part').outerHeight($('.vendors .part').outerWidth());
//$(window).on('resize', function () {
//    $('.vendors .part').outerHeight($('.vendors .part').outerWidth());
//})

//=== Add active to NavFilter ===
$('.showrooms-filter .navbar-nav .nav-item').click(function () {
    $(this).addClass('active');
    $(this).siblings().removeClass('active');
})

//=== Upload Comment Image ===
$('.topics #uploadimg').change(function () {
    $('.topics .imagetoshow').fadeIn()
})
$('.topics .imagetoshow span').click(function () {
    $('.topics #uploadimg').val('')
    $('.topics .imagetoshow').fadeOut();
})

$('.topics #uploadimg2').change(function () {
    $('.topics .imagetoshow').fadeIn()
})
$('.topics .imagetoshow span').click(function () {
    $('.topics #uploadimg2').val('')
    $('.topics .imagetoshow').fadeOut();
})


//==== Dashboard active sections ====
$('.dash-details .showroom-nav .main-link').click(function () {
    $(this).addClass('active').siblings().removeClass('active');
    let x = $(this).data('id');
    $("" + x + "").siblings().fadeOut();
    $("" + x + "").fadeIn();
})

