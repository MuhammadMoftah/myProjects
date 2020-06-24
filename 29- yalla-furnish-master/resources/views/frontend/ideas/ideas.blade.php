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
        <ul class="navbar-nav border p-3 rounded bg-white">
            @isset($categories)
            <li class="nav-item dropdown">
                <a class="nav-link cat_id" href="#" data-id="">All Categories</a>
            </li>
            @foreach ($categories as $category)
            <li class="nav-item dropdown {{request('category') == $category->id || request('cat_id') == $category->id ? 'active' :''}}">
                <a class="nav-link cat_id" href="" data-id="{{ $category->id }}" id="navbardrop">
                    {{ $category->name_en }}
                </a>
            </li>
            @endforeach
            @endisset
        </ul>
    </div>

    <script>
        $('.fixed-side-nav .sidemenu-button').on('click', function() {
            $('.fixed-side-nav').toggleClass('swipe-menu')
        })
    </script>
</section>

<div class="showrooms browse-products">
    <section class="trending articles">
        <div class="container">
            <div class="row py-5">
                <div class="col-md-2 px-0 d-lg-block d-none">
                    <nav class="showrooms-filter">
                        <!-- Links -->
                        <ul class="navbar-nav border p-3 rounded bg-white">
                            @isset($categories)
                            <li class="nav-item dropdown">
                                <a class="nav-link cat_id" href="#" data-id="">All Categories</a>
                            </li>
                            @foreach ($categories as $category)
                            <li class="nav-item dropdown {{request('category') == $category->id || request('cat_id') == $category->id ? 'active' :''}}">
                                <a class="nav-link cat_id" href="" data-id="{{ $category->id }}" id="navbardrop">
                                    {{ $category->name_en }}
                                </a>
                            </li>
                            @endforeach
                            @endisset
                        </ul>
                    </nav>
                </div>
                <!--==== Vendors ====-->
                <!--==== Vendors ====-->
                <div class="col-md-10">
                    <div class="row" id="product-content">
                        <div class="col-md-12 px-3">
                            <div class="col-md-12 p-0">
                                <section class="cover" style="background-image:url('{{ asset('assets/site/images/ad1.jpg') }}');"></section>
                            </div>
                        </div>
                        <div class="col-md-12 mt-4 mt-md-0 d-flex justify-content-between">
                            <h3 id="idea-title-info">Ideas / @if(request('by_category') && request('category')) {{request('by_category')}} @else All Categories @endif</h3>
                        </div>
                        <div class="col-md-12 ideas_data">
                            @include('frontend.ideas.ideas_data')
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
        var category = "{{request('category') || request('cat_id')?:''}}";
        $('#search').keyup(function() {
            keyword = $.trim($(this).val());
            category = $.trim(category);
            fetch_data(1);
        });

        $('.cat_id').click(function(e) {
            e.preventDefault();

            $(this).addClass('active');
            $(this).siblings().removeClass('active');
            keyword = $.trim(keyword);
            category = $.trim($(this).attr('data-id'));
            $('#idea-title-info').html('Ideas / ' + $(this).text());
            fetch_data(1);
        });

        $(document).on('click', '.pagination a', function(e) {
            e.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            fetch_data(page);
        });

        function refactorUrl(url, page) {
            if (keyword !== '' || category !== "" || page != 1) {
                url = url + '?';
            }

            if (keyword !== "") {
                url = url + 'keyword=' + keyword;
            }

            if (category !== "") {
                if (keyword !== "") {
                    url += "&";
                }
                url = url + 'category=' + category;
            }

            if (page != 1) {
                if (keyword !== "" || category !== "") {
                    url += "&";
                }
                url = url + 'page=' + page;
            }

            return url;
        }

        function fetch_data(page) {
            keyword = $.trim(keyword);
            category = $.trim(category);

            let url2 = refactorUrl("{{route('get_all_ideasAjex')}}", page);
            let url = refactorUrl("{{route('get_all_ideas')}}", page);

            $.ajax({
                type: "GET",
                url: url2,
                success: function(data) {
                    $('.ideas_data').html(data);
                    History.pushState({
                        url: url2
                    }, document.title, url);
                },
                cache: false
            });
        }
    });
</script>

@endsection