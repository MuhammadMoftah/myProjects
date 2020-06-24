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
// $("#product, #offers, #reviews, #info, #events").click(function () {
//     $(this).siblings().removeClass('main-btn main-btn2').addClass('main-btn2');
//     $(this).removeClass('main-btn2').addClass('main-btn');
//     $('#product').removeClass('main-btn main-btn2');
// })

$("#product").click(function () {
    $(this).addClass('main-btn');
    $(this).removeClass('main-btn2');
    $(this).siblings().removeClass('main-btn');
    $(this).siblings().addClass('main-btn2');
    $('#product-content').siblings().css("display", "none");
    $('#product-content').fadeIn(1000);
});

$("#offers").click(function () {
    $(this).addClass('main-btn');
    $(this).removeClass('main-btn2');
    $(this).siblings().removeClass('main-btn');
    $(this).siblings().addClass('main-btn2');
    $('#offers-content').siblings().css("display", "none");
    $('#offers-content').fadeIn(1000);
    //    === Make div square ===
    $('.trending .product-content .part').outerHeight($('.trending .product-content .part').outerWidth());
});

$("#reviews").click(function () {
    $(this).addClass('main-btn');
    $(this).removeClass('main-btn2');
    $(this).siblings().removeClass('main-btn');
    $(this).siblings().addClass('main-btn2');
    $('#reviews-content').siblings().css("display", "none");
    $('#reviews-content').fadeIn(1000);
});

$("#info").click(function () {
    $(this).addClass('main-btn');
    $(this).removeClass('main-btn2');
    $(this).siblings().removeClass('main-btn');
    $(this).siblings().addClass('main-btn2');
    $('#info-content').siblings().css("display", "none");
    $('#info-content').fadeIn(1000);
});

$("#events").click(function () {
    $(this).addClass('main-btn');
    $(this).removeClass('main-btn2');
    $(this).siblings().removeClass('main-btn');
    $(this).siblings().addClass('main-btn2');
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
    $('#boards-content').fadeIn(100);
});

$("#user-chat").click(function () {
    $('#user-chat-content').siblings().css("display", "none");
    $('#user-chat-content').fadeIn(100);
 });

$("#design").click(function () {
    $('#design-content').siblings().css("display", "none");
    $('#design-content').fadeIn(100);
});

$("#comparison").click(function () {
    $('#comparison-content').siblings().css("display", "none");
    $('#comparison-content').fadeIn(100);
});

$("#updates").click(function () {
    $('#updates-content').siblings().css("display", "none");
    $('#updates-content').fadeIn(100);
});

$("#activity").click(function () {
    $('#activity-content').siblings().css("display", "none");
    $('#activity-content').fadeIn(100);
});

$("#topic").click(function () {
    $('#topic-content').siblings().css("display", "none");
    $('#topic-content').fadeIn(100);
});

$("#consultancy").click(function () {
    $('#consultancy-content').siblings().css("display", "none");
    $('#consultancy-content').fadeIn(1000);
});

$("#showroom").click(function () {
    $('#showrooms-content').siblings().css("display", "none");
    $('#showrooms-content').fadeIn(1000);
});

$("#idea").click(function () {
    $('#idea-content').siblings().css("display", "none");
    $('#idea-content').fadeIn(1000);
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
$('.mycomment #uploadimg').change(function () {
    $('.mycomment .imagetoshow').fadeIn()
})

$('.mycomment .imagetoshow span').click(function () {
    $('.mycomment #uploadimg').val('')
    $('.mycomment .imagetoshow').fadeOut();
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

