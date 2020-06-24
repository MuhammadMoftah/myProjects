@extends('frontend.master')
@section('styles')
<style>
    @media(min-width:992px) {
        footer {
            position: fixed;
            width: 100%;
            bottom: -64px;
            bottom: -200px;
            transition: all 0.2s ease;
        }

        body {
            padding-bottom: 70px;
        }
    }
    .home-slider .carousel-inner img{
        min-height:170px;
    }
    .home-slider .carousel-indicators li {
        height: 11px;
        width: 11px;
        margin-right: 6px;
        border-radius: 50%;
    }
    .home-slider .carousel-indicators{
        bottom:-16px
    }
</style>

<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
@endsection
@section('search')
@include('frontend.search_layouts.search')
@endsection
@section('body')

<section class='home-slider'>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="{{asset('./images/yalla-cover.jpg')}}" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{asset('./images/yalla-cover.jpg')}}" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{asset('./images/yalla-cover.jpg')}}" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</section>


<div class="showrooms search-result index-content" style="height:100%">
    <section class="trending">
        <div class="container">
            <!--Products Slider-->
            <div class="row bg-white rounded home-products mt-4">
                <div class="col-12 px-4 my-4">
                    <p class="h5 ml-2 pb-3">Find your needs for your home</p>
                    <div class="carousel px-2" data-flickity='{ "freeScroll": true, "wrapAround": true, "pageDots": false }' style="overflow:hidden">
                        @foreach($categories as $category)
                        <a href="{{route('user.get.products',['categorySlug'=>$category->slug])}}" class="carousel-cell one-product" style="background-image:url('{{$category->category_image}}');">
                            <aside class="overlay text-center">
                                <h2 class="h5 mt-0 text-white">{{$category->name_en}}</h2>
                            </aside>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <!--Products Slider-->
            <!--Offers-->
            <div class="row vendors offers home-offers bg-white px-4 pb-3 mt-5">
                <div class="col-12 px-2">
                    <p class="h5 pb-2 pt-4">Latest discounts, offers & sales</p>
                </div>
                @foreach($offers as $offer)
                <a href="{{route('user.offer.get',$offer->product->id)}}" class="col-lg-2 col-md-4 col-6 px-2">
                    <div class="part card">
                        <figure class="img mb-0" style="background-image:url('{{$offer->product->featured_image}}');"></figure>
                        <aside class="overlay text-center">
                            <h2 class="h3 mt-0 text-white">{{$offer->discount}}% OFF</h2>
                            <p class="text-white">{{$offer->product->name_en}}</p>
                            <date>Valid Until {{$offer->expire_date->format('j F Y')}}</date>
                        </aside>
                    </div>
                </a>
                @endforeach
                <a href="{{route('user.get.offers')}}" class="col-lg-2 col-md-4 col-6 px-2">
                    <div class="part card">
                        <figure class="img mb-0  d-flex flex-column justify-content-center" style="background-color:var(--clr2); background-image:none!important;">
                            <p class="h3 text-white font-weight-bold text-center">View All</p>
                        </figure>
                        <aside class="overlay text-center">
                        </aside>
                    </div>
                </a>
            </div>
            <div class="row mb-3 px-0 product-content mt-5" id="product-idea-content">
                <div class="col-12">
                    <h3 class=" text-center h5 pb-2 pt-2">Recently Added &amp; Top trending</h3>
                </div>
                @include('frontend.includes.home_products')
            </div>
        </div>
    </section>
</div>
<!--End Showrooms-->
@endsection

@section('scripts')
<!-- Slider JavaScript -->
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
<script>
    $(document).ready(function() {

        var page = 1;

        function square_div() {
            //    === Make div square ===
            $('.trending #product-idea-content .part-product').outerHeight($('.trending #product-idea-content .part-product').outerWidth());
            $(window).on('resize', function() {
                $('.trending #product-idea-content .part-product').outerHeight($('.trending #product-idea-content .part-product').outerWidth());
            })

            //    === Make div square ===
            $('.trending #product-idea-content .part-product').outerHeight($('.trending #product-idea-content .part-product').outerWidth());
            $(window).on('resize', function() {
                $('.trending #product-idea-content .part-product').outerHeight($('.trending #product-idea-content .part-product').outerWidth());
            })

            //    === Make offers div square ===
            $('.offers .part').outerHeight($('.offers .part').outerWidth());
            $(window).on('resize', function() {
                $('.offers .part').outerHeight($('.offers .part').outerWidth());
            })
        }


        square_div();

        function fetch_data(page) {
            var url = "{{route('user.index')}}";
            var url = url + '?page=' + page;
            $.ajax({
                type: "GET",
                url: url,
                success: function(data) {
                    $('#product-idea-content').append(data);
                    square_div();
                }
            });
        }

        $(window).scroll(function() {
            var divTop = $('body').offset().top,
                divHeight = $('body').outerHeight(),
                wHeight = $(window).height(),
                windowScrTp = $(this).scrollTop();

            if (windowScrTp > (divTop + divHeight - wHeight - 100)) {
                page = page + 1;
                fetch_data(page);
            }
        });
    });

    //    === Make offers div square ===
    $('.carousel-cell').outerHeight($('.carousel-cell').outerWidth());
    $(window).on('resize', function() {
        $('.carousel-cell').outerHeight($('.carousel-cell').outerWidth());
    })
</script>


<script>
    var timeOutFooter;
    $(window).on("scroll", function() {
        $('footer').css('bottom', '0px');
        if (timeOutFooter) {
            clearInterval(timeOutFooter)
        }
    })
    $('body').on("click", function() {
        $('footer').css('bottom', '-200px');
    })
</script>
@include('frontend.includes.product_action_scripts')
@endsection