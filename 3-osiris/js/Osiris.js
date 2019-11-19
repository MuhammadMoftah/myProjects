/*global $ , console , alert , document, window */

$(function () {
    'use strict';
    
	//Dropdown Menu
		//Home
	$(".navbar .down ul:first-child li:first-child")
		.hover(function (){
		$(".navbar .hmenu ul:first-of-type").css("display","block");
	});
	
	$(".navbar .hmenu ul:first-of-type").on("mouseleave", function() {
			$(this).css('display', "none");

		});
	
	$(".navbar .down ul:first-child li:first-child")
		.siblings().hover(function (){
		$(".navbar .hmenu ul:first-of-type").css('display', "none");
	});
	
//			Submenu
	$(".navbar .hmenu li:nth-child(3)")
		.hover(function() {
		$('.navbar .submenu').css("visibility","visible");
		
	});
	
	$(".navbar .submenu").hover(function(){
		$(".navbar .hmenu ul:first-of-type").css("display", "block");
		
	});
	
	$(".navbar .submenu").on("mouseleave", function() {
		$(this).css('visibility', "hidden");
		$(".navbar .hmenu ul:first-of-type").css("display","none");
	});
	
	
		//Service
	$(".navbar .down ul:first-child li:nth-child(2)")
			.hover(function (){
		$(".navbar .smenu ").css("display", "block");
	});
	
	$(".navbar .smenu").on("mouseleave", function() {
			$(this).css('display', "none");
		});
	
	$(".navbar .down ul:first-child li:nth-child(2)")
		.siblings().hover(function (){
		$(".navbar .smenu ").css('display', "none");
	});
	
	
	// 3rd Silder
	$('.carousel .three .btns button').on("click",function (){
		$(this)
			.addClass("sbtn").siblings().removeClass("sbtn");
		$(this)
			.css("width","115").siblings().css("width","60");
		$(".carousel .three .btns button")
			.contents().filter(function () {
			return this.nodeType === 3; 
			}).remove();
		$(this).append("&nbsp;&nbsp;Struction");
	});
	
	
	//Modal
    $('.items button:first-of-type').click(function () {
        $("#myModal img").attr('src', $(".items img").attr("src"));
    });
    $("#myModal img").attr('src', $(".items img").attr("src"));

    
    //Count
    $(window).scroll(function () {
        if ( $(window).scrollTop() >= 1900 ) {
			
			$('.count').each(function() {
				var $this = $(this),
					countTo = $this.attr('data-count');

	  $({ countNum: $this.text()}).animate({
		countNum: countTo
	  },

	  {
		duration: 2000,
		easing:'linear',
		step: function() {
		  $this.text(Math.floor(this.countNum));
		},
		complete: function() {
		  $this.text(this.countNum);
		}

  				});  
  
			});
					
        }
    });

   

	//Scroll
    $('#scroll').click(function(){
		$('html, body').animate({scrollTop : 0},800);
		return false;
	});
    
    
    //MixItUp Start (filter plugin)
     var mixer = mixitup('.items');
	

	//Selected Items
	$('.projects li').click(function(){
		$(this).addClass('selected').siblings().removeClass('selected');
	});
	
	$('.navbar .down li').click(function(){
		$(this).addClass('selected').siblings().removeClass('selected');
	});
	

	//Edit Responsive Menu
	$('#menu').slicknav(); //Start 
	$('span.slicknav_menutxt').remove();
	$('.slicknav_nav li:first-of-type i').remove();
	$('.slicknav_nav li:first-of-type ').removeClass("selected").addClass("slicknav_txtnode");
	if ($(window).width() < 954){
			$('#menu li').eq(5).hide();
			$(".slicknav_nav li").eq(5).css("display", "block");
			$(".slicknav_menu").css("display", "block");
			$('#menu li').eq(6).hide();
			$(".slicknav_nav li").eq(6).css("display", "block");
		} else if ($(window).width() > 954){
			$('#menu li').eq(5).show();
			$(".slicknav_nav li").eq(5).css("display", "none");
			$(".slicknav_menu").css("display", "none");
			$('#menu li').eq(6).show();
			$(".slicknav_nav li").eq(6).css("display", "none");
		};
		
		if ($(window).width() < 920){
			$('#menu li').eq(4).hide();
			$(".slicknav_nav li").eq(4).css("display", "block");
		}
		else if (($(window).width() > 920)){
			$('#menu li').eq(4).show();
			$(".slicknav_nav li").eq(4).css("display", "none");
		};
		
		if ($(window).width() < 832){
			$('#menu li').eq(3).hide();
			$(".slicknav_nav li").eq(3).css("display", "block");
		}
		else if (($(window).width() > 832)){
			$('#menu li').eq(3).show();
			$(".slicknav_nav li").eq(3).css("display", "none");
		};
		
		if ($(window).width() < 720){
			$('#menu li').eq(2).hide();
			$(".slicknav_nav li").eq(2).css("display", "block");
		}
		else if (($(window).width() > 720)){
			$('#menu li').eq(2).show();
			$(".slicknav_nav li").eq(2).css("display", "none");
		};
		
		if ($(window).width() < 627){
			$('#menu li').eq(1).hide();
			$(".slicknav_nav li").eq(1).css("display", "block");
		}
		else if (($(window).width() > 627)){
			$('#menu li').eq(1).show();
			$(".slicknav_nav li").eq(1).css("display", "none");
		};
		
		if ($(window).width() < 510){
			$('#menu li').eq(0).hide();
			$(".slicknav_nav li").eq(0).css("display", "block");
			
		}
		else if (($(window).width() > 510)){
			$('#menu li').eq(0).show();
			$(".slicknav_nav li").eq(0).css("display", "none");
		};
	
	$(window).on("resize", function (){	
		if ($(window).width() < 954){
			$('#menu li').eq(5).hide();
			$(".slicknav_nav li").eq(5).css("display", "block");
			$(".slicknav_menu").css("display", "block");
			$('#menu li').eq(6).hide();
			$(".slicknav_nav li").eq(6).css("display", "block");
		} else if ($(window).width() > 954){
			$('#menu li').eq(5).show();
			$(".slicknav_nav li").eq(5).css("display", "none");
			$(".slicknav_menu").css("display", "none");
			$('#menu li').eq(6).show();
			$(".slicknav_nav li").eq(6).css("display", "none");
		};
		
		if ($(window).width() < 920){
			$('#menu li').eq(4).hide();
			$(".slicknav_nav li").eq(4).css("display", "block");
		}
		else if (($(window).width() > 920)){
			$('#menu li').eq(4).show();
			$(".slicknav_nav li").eq(4).css("display", "none");
		};
		
		if ($(window).width() < 832){
			$('#menu li').eq(3).hide();
			$(".slicknav_nav li").eq(3).css("display", "block");
		}
		else if (($(window).width() > 832)){
			$('#menu li').eq(3).show();
			$(".slicknav_nav li").eq(3).css("display", "none");
		};
		
		if ($(window).width() < 720){
			$('#menu li').eq(2).hide();
			$(".slicknav_nav li").eq(2).css("display", "block");
		}
		else if (($(window).width() > 720)){
			$('#menu li').eq(2).show();
			$(".slicknav_nav li").eq(2).css("display", "none");
		};
		
		if ($(window).width() < 627){
			$('#menu li').eq(1).hide();
			$(".slicknav_nav li").eq(1).css("display", "block");
		}
		else if (($(window).width() > 627)){
			$('#menu li').eq(1).show();
			$(".slicknav_nav li").eq(1).css("display", "none");
		};
		
		if ($(window).width() < 510){
			$('#menu li').eq(0).hide();
			$(".slicknav_nav li").eq(0).css("display", "block");
			
		}
		else if (($(window).width() > 510)){
			$('#menu li').eq(0).show();
			$(".slicknav_nav li").eq(0).css("display", "none");
		};
			
	});
	

	// Section "Create"
	$(".create .right h5").click(function (){
		$(this).siblings().collapse('hide');
		$(".create .right h5:hover i").toggleClass("fa fa-plus fa fa-angle-right");
	});
	
	
	
	
	
	

	
	
	
	
	
	
	
	
	
});

