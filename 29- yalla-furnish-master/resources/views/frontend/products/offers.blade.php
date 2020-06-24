@extends('frontend.master')
@section('search')
@include('frontend.search_layouts.search')
@endsection
@section('body')




<!-- ==== Fixed Side Menu ==== -->
<!-- ==== Fixed Side Menu ==== -->
<section class="fixed-side-nav d-lg-none d-block">
    <button class="btn btn-info sidemenu-button"><i class="fas fa-couch"></i></button>

    <div class="nav-container">
        <!-- Links -->
        <ul class="navbar-nav  p-3 rounded bg-white">
            <li class="nav-item">
                <a class="category-link nav-link" href="{{route('user.get.products')}}" data-id="">All Categories</a>
            </li>
            @foreach($categories as $category)
            <li class="nav-item @if(request('category_id')==$category->id) active @endif">
                <a class="category-link nav-link" href="{{route('user.get.products')}}" data-id="{{$category->id}}">{{$category->name_en}}</a>
            </li>
            @endforeach
        </ul>

        <!-- Links -->
        <ul class="navbar-nav mt-3 p-3 rounded bg-white">
            <li class="nav-item">
                <a class="nav-link style-link" href="{{route('user.get.products')}}" data-id="">All Styles</a>
            </li>
            @foreach($styles as $style)
            <li class="nav-item {{request('style_id')==$style->id?'active':''}}">
                <a class="nav-link style-link" href="{{route('user.get.products')}}" data-id="{{$style->id}}">{{$style->name_en}}</a>
            </li>
            @endforeach
        </ul>
    </div>

    <script>
        $('.fixed-side-nav .sidemenu-button').on('click', function() {
            $('.fixed-side-nav').toggleClass('swipe-menu')
        })
    </script>
</section>


<div class="showrooms browse-products ">
    <section class="trending">
        <div class="container">
            <div class="row py-5">
                <div class="col-md-2 px-0 d-lg-block d-none">
                    <nav class="showrooms-filter">

                        <!-- Links -->
                        <ul class="navbar-nav  p-3 rounded bg-white">
                            <li class="nav-item">
                                <a class="category-link nav-link" href="{{route('user.get.products')}}" data-id="">All Categories</a>
                            </li>
                            @foreach($categories as $category)
                            <li class="nav-item @if(request('category_id')==$category->id) active @endif">
                                <a class="category-link nav-link" href="{{route('user.get.products')}}" data-id="{{$category->id}}">{{$category->name_en}}</a>
                            </li>
                            @endforeach
                        </ul>

                        <!-- Links -->
                        <ul class="navbar-nav mt-3 p-3 rounded bg-white">
                            <li class="nav-item">
                                <a class="nav-link style-link" href="{{route('user.get.products')}}" data-id="">All Styles</a>
                            </li>
                            @foreach($styles as $style)
                            <li class="nav-item {{request('style_id')==$style->id?'active':''}}">
                                <a class="nav-link style-link" href="{{route('user.get.products')}}" data-id="{{$style->id}}">{{$style->name_en}}</a>
                            </li>
                            @endforeach
                        </ul>

                    </nav>
                </div>


                <!--==== Vendors ====-->
                <!--==== Vendors ====-->
                <div class="col-md-10 product-content">
                    <div class="col-md-12 px-2">
                        <div class="col-md-12 p-0">
                            <section class="cover" style="background-image:url('{{ asset('assets/site/images/ad1.jpg') }}');"></section>
                        </div>
                    </div>
                    <div class="col-md-12 mt-4 mt-md-0 d-flex justify-content-between px-2">
                        <h3 id="products_title_info">Offers / All Categories / All Styles</h3>
                    </div>
                    <div class="row vendors offers bg-transparent px-2">
                        @include('frontend.products.offer_data')
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {

        var keyword = '';
        var category = "{{request('category_id')?request('category_id'):''}}";
        var style = "{{request('style_id')?request('style_id'):''}}";
        var category_word = 'All Categories';
        var style_word = 'All Styles';

        function truncate_text() {
            //    === Make div square ===
            $('.trending #product-content .part').outerHeight($('.trending #product-content .part').outerWidth());
            $(window).on('resize', function() {
                $('.trending #product-content .part').outerHeight($('.trending #product-content .part').outerWidth());
            })

            //    === Make div square ===
            $('.trending .product-content .part').outerHeight($('.trending .product-content .part').outerWidth());
            $(window).on('resize', function() {
                $('.trending .product-content .part').outerHeight($('.trending .product-content .part').outerWidth());
            })
        }

        $(document).on('keyup', '#search', function(e) {
            keyword = $.trim($('#search').val());
            style = $.trim(style);
            category = $.trim(category);
            fetch_data(1);
        });

        $(document).on('click', '.category-link', function(e) {
            e.preventDefault();
            keyword = $.trim(keyword);
            style = $.trim(style);
            category = $.trim($(this).attr('data-id'));
            category_word = $(this).text();
            $('#products_title_info').html('Offers / ' + category_word + ' / ' + style_word);
            fetch_data(1);
        });

        $(document).on('click', '.style-link', function(e) {
            e.preventDefault();
            keyword = $.trim(keyword);
            style = $.trim($(this).attr('data-id'));
            style_word = $(this).text();
            category = $.trim(category);
            $('#products_title_info').html('Offers / ' + category_word + ' / ' + style_word);
            fetch_data(1);
        });

        $(document).on('click', '.pagination a', function(e) {
            e.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            fetch_data(page);
        });

        function refactorUrl(url, page) {
            if (keyword !== '' || style !== '' || category !== "" || page != 1) {
                url = url + '?';
            }
            if (keyword !== "") {
                url = url + 'keyword=' + keyword;
            }

            if (style !== "") {
                if (keyword !== "") {
                    url += "&";
                }
                url = url + 'style=' + style;
            }

            if (category !== "") {
                if (keyword !== "" || style !== "") {
                    url += "&";
                }
                url = url + 'category=' + category;
            }

            if (page != 1) {
                if (keyword !== "" || style !== "" || category !== "") {
                    url += "&";
                }
                url = url + 'page=' + page;
            }

            return url;
        }

        function fetch_data(page) {
            let url2 = refactorUrl("{{route('user.get.offersAjex')}}", page);
            let url = refactorUrl("{{route('user.get.offers')}}", page);

            $.ajax({
                type: "GET",
                url: url2,
                success: function(data) {
                    $('.offers').html(data);
                    window.history.pushState("", "", url);
                    truncate_text();
                },
                cache: false
            });
        }

        truncate_text();
    });
</script>
@endsection