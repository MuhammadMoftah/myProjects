var isMobile = navigator.userAgent.match(/(iPhone|iPod|iPad|Android|BlackBerry)/);
$(".pin").click(function(){
    if($(this).hasClass("cai")){
        $("#map .right_cntnt > div > div").hide();
        $(".map").find("div.cai").fadeIn();
    }else if($(this).hasClass("jed")){
        $("#map .right_cntnt > div > div").hide();
        $(".map").find("div.jed").fadeIn();
    }else if($(this).hasClass("auh")){
        $("#map .right_cntnt > div > div").hide();
        $(".map").find("div.auh").fadeIn();
    }else if($(this).hasClass("tun")){
        $("#map .right_cntnt > div > div").hide();
        $(".map").find("div.tun").fadeIn();
    }else if($(this).hasClass("bey")){
        $("#map .right_cntnt > div > div").hide();
        $(".map").find("div.bey").fadeIn();
    }else {
        $("#map .right_cntnt > div > div").hide();
        $(".map").find("div.bah").fadeIn();
    }
});
if(isMobile){
    $(".community .right_cntnt li").each(function(indexInArray){
            var span=$(this);
            span.show();
            setTimeout( function () {
                span.animate({
                    'opacity':'1'
                },150,function(){
                                
                    });
            }, indexInArray * 200);
        });
    show_serial_mentorship=true;
        $(".circles .red").show();
        $(".circles .red").animate({
            'opacity':'1'
        },300,function(){
            $(".circles .double_circles").show();
            $(".circles .double_circles").animate({
                'opacity':'1'
            },300,function(){
                var l;
                $(".circles>span").each(function(indexInArray){
                    var span=$(this);
                    setTimeout( function () {
                        span.show();
                        span.animate({
                            'opacity':'1'
                        },100,function(){
                            $(".double_circles>span:eq("+indexInArray+")").show();
                        });
                    }, indexInArray * 150);
                    l=indexInArray;
                });
                $(".double_circles>span:eq("+l+")").show();

                setTimeout( function () {
                    $(".circles .yellow").animate({
                        'opacity':'1'
                    },200);
                    $(".circles .yellow").show();
                },l*150);
            }); 
        });
}
/* Every time the window is scrolled ... */
$(window).scroll( function(){
    console.log($(window).scrollTop());
    var show_serial_how_it_works=false;
    if($(window).scrollTop()>=1712&&show_serial_how_it_works==false){
        show_serial_how_it_works=true;
        $(".step.apply").show();
        $(".step.apply").animate({
            'opacity':'1'
        },500,function(){
            $(".step.accelerate").show();
            $(".step.accelerate").animate({
                'opacity':'1'
            },500,function(){
                $(".step.grow").show();
                $(".step.grow").animate({
                    'opacity':'1'
                },500);
            });	
        });
    }

    var show_serial_community=false;
    if($(window).scrollTop()>=3010&&show_serial_community==false){
        show_serial_community=true;
        $(".community .right_cntnt li").each(function(indexInArray){
            var span=$(this);
            span.show();
            setTimeout( function () {
                span.animate({
                    'opacity':'1'
                },150,function(){
								
                    });
            }, indexInArray * 200);
        });
    }

    var show_serial_mentorship=false;
    if($(window).scrollTop()>=2120&&show_serial_mentorship==false){
        show_serial_mentorship=true;
        $(".circles .red").show();
        $(".circles .red").animate({
            'opacity':'1'
        },300,function(){
            $(".circles .double_circles").show();
            $(".circles .double_circles").animate({
                'opacity':'1'
            },300,function(){
                var l;
                $(".circles>span").each(function(indexInArray){
                    var span=$(this);
                    setTimeout( function () {
                        span.show();
                        span.animate({
                            'opacity':'1'
                        },100,function(){
                            $(".double_circles>span:eq("+indexInArray+")").show();
                        });
                    }, indexInArray * 150);
                    l=indexInArray;
                });
                $(".double_circles>span:eq("+l+")").show();

                setTimeout( function () {
                    $(".circles .yellow").animate({
                        'opacity':'1'
                    },200);
                    $(".circles .yellow").show();
                },l*150);
            });	
        });
    }

    $('.content').each( function(i){

        var bottom_of_object = $(this).offset().top + $(this).outerHeight();
        var bottom_of_window = $(window).scrollTop() + $(window).height();

        if( bottom_of_window > bottom_of_object-300 ){
            $(this).animate({
                'opacity':'1'
            },500);
            $(this).show();

        }

    });

});
$(document).ready(function() {
    $(".community img,.locations_list li img").each(function(){
        var bw=$(this).css('border-top-width');
        var bs=$(this).css('border-top-style');
        var bc=$(this).css('border-top-color');
        $(this).parent("a").addClass("radius-fix-safari").css('border-width',bw).css('border-style',bs).css('border-color',bc);
    });

    
    var l;
    $(".stat li").each(function(indexInArray){
        var span=$(this);
        setTimeout( function () {
            var mTop=parseInt(span.css("marginTop").replace("px", ""));
            span.css("marginTop",(mTop-20)+"px");
            console.log(mTop);
            span.animate({
                'opacity':'1',
                'marginTop':mTop+"px"
                },150);
            span.show();
        }, indexInArray * 200);
        l=indexInArray;
    });
    $(document).ready(function(){
        $('a[href^="#"]').on('click',function (e) {
            var href=$(this).attr('href');
            if(href=="#top"){
                return;
            }
            e.preventDefault();
            var target = this.hash,
            $target = $(target);
            $('html, body').stop().animate({
                'scrollTop': $target.offset().top
            }, 900, 'swing', function () {
                window.location.hash = target;
            });
        });
    });
 
});
$("[class^=click-]").mouseover(function(evt){
    evt.stopPropagation();
    evt.preventDefault();
    var double_circle_id=$(this).attr('double-circle');
    double_circle_id--;
    if(!$(this).hasClass("current")){
        $("[class^=click-],.double_circles>span").removeClass("current");
        $(this).addClass("current");
        $(".double_circles>span:eq("+double_circle_id+")").addClass("current");
    }else{
        return;
    }
    $("[class^=show-]").animate({
        'opacity':'0'
    },150);
    $("[class^=show-]").hide();
    var class_name=$(this).attr('class').replace("click-", "").replace(" ", "").replace("current", "");
    var pos=$(this).position();
    $(".show-"+class_name).each(function(indexInArray){
        var span=$(this);
        if($(this).is(":hidden")){
            if ($.browser.msie  && parseInt($.browser.version, 10) === 8) {
                span.show();
                //alert(span.html());
                var pos2=span.position();
                var mTop=parseInt(span.css("right").replace("px", ""));
                //alert(mTop);
                span.css("right",(mTop)+"px");
                span.css("bottom",(mBottom)+"px");
            }else{
            var pos2=span.position();
            if(pos.left>pos2.left){
                //child_is_on_left
                var mTop=parseInt(span.css("right").replace("px", ""));
                span.css("right",(mTop-60)+"px");
                span.css("bottom",(mBottom-40)+"px");
                span.animate({
                    'opacity':'1',
                    'right':mTop+"px",
                    bottom:mBottom+"px"
                    },150);
                span.show();
            }else{
                //child_is_on_right
                var mTop=parseInt(span.css("right").replace("px", ""));
                var mBottom=parseInt(span.css("bottom").replace("px", ""));
                span.css("right",(mTop+60)+"px");
                span.css("bottom",(mBottom+60)+"px");
                span.animate({
                    'opacity':'1',
                    'right':mTop+"px",
                    bottom:mBottom+"px"
                    },150);
                span.show();
            }
        }
        }
    });
});



$("[class^=click-]").click(function(evt){
    evt.stopPropagation();
    evt.preventDefault();
    var double_circle_id=$(this).attr('double-circle');
    double_circle_id--;
    document.location.href=$(this).attr('data-url');
    return;
});
