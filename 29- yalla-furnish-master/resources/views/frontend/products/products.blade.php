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
        <ul class="navbar-nav  p-3 rounded bg-white">
            <li class="nav-item">
                <a class="category-link nav-link" href="{{route('user.get.products')}}" data-id="">All Categories</a>
            </li>
            @foreach($categories as $category)
            <li class="nav-item @if(request('categorySlug')==$category->slug) active @endif">
                <a class="category-link nav-link" href="{{route('user.get.products')}}" data-id="{{$category->id}}" data-slug="{{$category->slug}}">{{$category->name_en}}</a>
            </li>
            @endforeach
        </ul>
        <!-- styles -->
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

<div class="showrooms browse-products">
    <section class="trending">
        <div class="container">
            <div class="row py-5">
                <div class="col-md-2 px-0 d-lg-block d-none">
                    <nav class="showrooms-filter">
                        <!-- categories -->
                        <ul class="navbar-nav  p-3 rounded bg-white">
                            <li class="nav-item">
                                <a class="category-link nav-link" href="{{route('user.get.products')}}" data-id="" data-slug="">All Categories</a>
                            </li>
                            @foreach($categories as $category)
                            <li class="nav-item @if(request('categorySlug')==$category->slug) active @endif">
                                <a class="category-link nav-link" href="{{route('user.get.products')}}" data-id="{{$category->id}}" data-slug="{{$category->slug}}">{{$category->name_en}}</a>
                            </li>
                            @endforeach
                        </ul>
                        <!-- styles -->
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
                <div class="col-lg-10 col-sm-12">
                    <div class="row">
                        @if(request()->route()->getName() == 'user.get.products')
                        <div class="col-md-12 px-2">
                            <div class="col-md-12 p-0">
                                <section class="cover" style="background-image:url('{{ asset('assets/site/images/ad1.jpg') }}');"></section>
                            </div>
                        </div>
                        @endif
                        <div class="col-md-12 mt-4 mt-md-0 px-2 d-flex justify-content-between">
                            <h3 id="products_title_info">Products / All Categories / All Styles</h3>
                            <div class="form-group has-search">

                            </div>
                        </div>
                        <div class="container">
                            <div class="products row" id="product-content">
                                @include('frontend.products.products_data')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/history.js/1.8/bundled/html4+html5/dojo.history.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var keyword = '';
        var category = "{{request('categorySlug')?request('categorySlug'):''}}";
        var style = "{{request('style_id')?request('style_id'):''}}";
        var category_word = "{{request('categorySlug')?request('categorySlug'):'All Categories'}}";
        var style_word = 'All Styles';

        function truncate_text() {
            // === Make div square ===
            $('.trending #product-content .part').outerHeight($('.trending #product-content .part').outerWidth());
            $(window).on('resize', function() {
                $('.trending #product-content .part').outerHeight($('.trending #product-content .part').outerWidth());
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
            category = $.trim($(this).attr('data-slug'));
            category_word = $(this).text();
            $('#products_title_info').html('Products / ' + category_word + ' / ' + style_word);
            let categoryTitle = category.toLowerCase().replace(/\b[a-z]/g, function(letter) {
                return letter.toUpperCase();
            });
            categoryTitle != "" ?
                $(document).prop('title', `${categoryTitle} | Yalla Furnish`) : $(document).prop('title', `Yalla Furnish`)
            fetch_data(1);
        });

        $(document).on('click', '.style-link', function(e) {
            e.preventDefault();
            keyword = $.trim(keyword);
            style = $.trim($(this).attr('data-id'));
            style_word = $(this).text();
            category = $.trim(category);
            $('#products_title_info').html('Products / ' + category_word + ' / ' + style_word);
            fetch_data(1);
        });

        $(document).on('click', '.pagination a', function(e) {
            e.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            fetch_data(page);
        });

        function refactorUrl(url, page) {
            if (keyword !== '' || style !== '' || page != 1) {
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

            if (page != 1) {
                if (keyword !== "" || style !== "") {
                    url += "&";
                }
                url = url + 'page=' + page;
            }

            return url;
        }

        function fetch_data(page) {
            if (category != "") {
                var url2 = refactorUrl("{{route('user.get.productsAjex',':categorySlug')}}".replace(':categorySlug', category), page);
                var url = refactorUrl("{{route('user.get.products',':categorySlug')}}".replace(':categorySlug', category), page);
            } else {
                var url2 = refactorUrl("{{route('user.get.productsAjex')}}", page);
                var url = refactorUrl("{{route('user.get.products')}}", page);
            }
            let data = {
                "url": url2
            };
            History.pushState(data, document.title, url);
        }

        truncate_text();

        History.Adapter.bind(window, 'statechange', function() {
            // store the State object
            let State = History.getState();
            let url = State.data.url
            $.ajax({
                type: "GET",
                url: url,
                success: function(data) {
                    $('.products').html(data);
                    truncate_text();
                    $("html, body").animate({
                        scrollTop: 0
                    }, 1000);
                },
                cache: false
            });
        });
    });
</script>
@include('frontend.includes.product_action_scripts')
@endsection