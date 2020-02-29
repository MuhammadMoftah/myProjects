
/*global $ , console , alert , document, window */

// Change all Images in the page from Https tp http
function loadImages(){
    var allImages = document.querySelectorAll('img');
    for (var i = 0; i <= allImages.length; i++) {
        console.log(allImages[i].src);
        var newImage = allImages[i].src.replace(/^https:\/\//i, 'http://');
        allImages[i].src = newImage;
        console.log("new Image= " + newImage);
    }
}

// Change all links in the page from Https tp http
function loadLinks(){
    var allLinks = document.querySelectorAll('link,a');
    for (var i = 0; i <= allLinks.length; i++) {
        var newLink = allLinks[i].href.replace(/^https:\/\//i, 'http://');
        allLinks[i].href = newLink;
        console.log("new Link= " + newLink);
    }
}


$(function () {
  'use strict';
}





  //Show name of uploded file
    $('input[type=file]').change(function() {
        let file = $(this)[0].files[0].name;
        $(this).find('+ label').text(file);
    });
  
 /* Get Data Fro JSON File */
 $.ajax({
            url: "./account.json",
            dataType: "json",
            type: "get",
            cache: false,
            success: function(data) {
                let employeeData = '';
                $(data).each(function(index, value) {
                    employeeData += "<tr>";
                    employeeData += "<td>" + (index + 1) + "</td>";
                    employeeData += "<td>" + value.Date + "</td>";
                    employeeData += "<td>" + value.Description + "</td>";
                    employeeData += "<td>" + value.Subtotal + "</td>";
                    employeeData += "<td>" + value.totals + "</td>";
                    employeeData += "<td>" + value.status + "</td>";
                    employeeData += "<td>" + value.invoice_num + "</td>";
                    employeeData += "</tr>";
                })
                $('tbody').append(employeeData);
            }
        })
  
//NavBar on Click
$("nav #home").click(function() {
    $('html, body').animate({
        scrollTop: $(".home").offset().top
    }, 1500);
});
$("nav #about").click(function() {
    $('html, body').animate({
        scrollTop: $(".about").offset().top 
    }, 1500);
});

//NavBar on Click [Dynamic Function]
    $("nav .nav-item a").click(function () {
        let x = $(this).attr('href');
        $("html, body").animate({
                scrollTop: $(x).offset().top - 70
            },
            1000
        );
    });


// Height Equal to Width
// Height Equal to Width
$('.class').outerHeight($('.class').outerWidth());

  //Auto-run and Start Function
  //Auto-run and Start Function
  (function () {
  }()); 

  
  
 //Check max Heigh in div and make all divs like it 
 //Check max Heigh in div and make all divs like it   
 var maxh = 0;
    $('.container > div').each(function () {

        if ($(this).height() > maxh) {

            console.log( $(this).height());
            maxh = $(this).height();
        }
        
        maxh = $(this).height();
    });  
console.log('max H = ' + maxh);
$('.container > div').height(maxh);

  

//Check if Div have not another div
//Check if Div have not another div
  $("div").not(':has(anotherDiv)').remove();
  
  
  
  //Filter without plugin
  //Filter without plugin
  $('.chos li').on('click', function () {
        $(this).addClass('active').siblings().removeClass('active');


        if ($(this).data('showw') == 'all') {
            $('.imgs .col-md-4').css("opacity", '1');

        } else {
            $('.imgs .col-md-4').css("opacity", '0.2');
            $($(this).data('showw')).css("opacity", '1');
        }

});
  
  
  
  //Make footer under body in small html
  if ($('body').height() < 900) {
        console.log('the body is small');
        $('body').css({
            'min-height': '100%'
        });

        $('.footer').css({
            position: "absolute",
            right: 0,
            bottom: 0,
            left: 0,
        });

    }


//Media Query with Jquery with resize
//Media Query with Jquery with resize
$(window).resize(function(){
       if ($(window).width() <= 320) {  
              // is mobile device
       }     
});
  
  
  
//Media Query with Jquery on Reload
//Media Query with Jquery on Reload
    if (window.matchMedia('(max-width: 767px)').matches) {
        //...
    } else {
        //...
    }


    //Check to see if the window is top if not then display button
    $(window).scroll(function(){
        if ($(this).scrollTop() > 100) {
            $('.scrollToTop').fadeIn();
        } else {
            $('.scrollToTop').fadeOut();
        }
    });

    //Click event to scroll to top
    $('.scrollToTop').click(function(){
        $('html, body').animate({scrollTop : 0},800);
        return false;
    });

  
  //To Active The Navbar link of current page
  //To Active The Navbar link of current page
       var PageName = location.pathname.split('/').slice(-1)[0];
        $('a[href*='+PageName+']').parent().addClass('active');
  
  
//=== Countdown Timer ===
//=== Countdown Timer ===
<ul>
    <li><span id="days"></span>days</li>
    <li><span id="hours"></span>Hours</li>
    <li><span id="minutes"></span>Minutes</li>
    <li><span id="seconds"></span>Seconds</li>
</ul>
//=== End HTML Side===
const second = 1000,
    minute = second * 60,
    hour = minute * 60,
    day = hour * 24;

let countDown = new Date('Sep 30, 2019 00:00:00').getTime(),
    x = setInterval(function () {

        let now = new Date().getTime(),
            distance = countDown - now;
        document.getElementById('days').innerText = Math.floor(distance / (day)),
            document.getElementById('hours').innerText = Math.floor((distance % (day)) / (hour)),
            document.getElementById('minutes').innerText = Math.floor((distance % (hour)) / (minute)),
            document.getElementById('seconds').innerText = Math.floor((distance % (minute)) / second);

        //do something later when date is reached
        //if (distance < 0) {
        //  clearInterval(x);
        //  'IT'S MY BIRTHDAY!;
        //}
    }, second)
  
  
  
    //Get Sorted Date
    //Get Sorted Date
    const time= new Date().toLocaleString('en-US', { hour: 'numeric', minute: 'numeric', hour12: true }),
            day= new Date().getDate(),
            month= new Date().getUTCMonth() +1,
            year= new Date().getFullYear(),
            fullDate=time +"  "+  day + "-" + month +"-"+ year;
    console.log(fullDate);

    //Check input if got just spaces
    if(this.name.replace(/\s/g, '').length){
        //Some code
    }



}); /End Start Function
