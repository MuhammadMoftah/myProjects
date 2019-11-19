;$(function() {
	"use strict";


//Smooth Scroll To Div
$(' li a ').on('click', function(){
	
		$("html , body").animate({
			scrollTop: $( $(this).data("value")).offset().top
		},1000);
		

});

  
});
