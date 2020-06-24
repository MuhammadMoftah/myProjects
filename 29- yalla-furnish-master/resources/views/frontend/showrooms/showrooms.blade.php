@extends('frontend.master')
@section('search')
@include('frontend.search_layouts.search')
@endsection
@section('body')

<!-- ==== Fixed Side Menu ==== -->
 <!-- ==== Fixed Side Menu ==== -->
 <section class="fixed-side-nav d-lg-none d-block">
    <button class="btn btn-info sidemenu-button"><i class="fas fa-map-marker-alt"></i></button>

    <div class="nav-container">
        <ul class="navbar-nav p-3 rounded bg-white">
            <li>
                <a href="#" class="nav-link city_id" id="cat_id" data-city="All Cities" data-id="">
                    All
                    Locations
                </a>
            </li>

            @isset($cities)
            @foreach ($cities as $city)
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle city_id" data-city="{{ $city->name_en }}" href="#" data-id="{{ $city->id }}" id="navbardrop" data-toggle="dropdown">
                    {{ $city->name_en }}
                </a>
                <div class="dropdown-menu">
                    @foreach($city->districtes as $district)
                    <a class="dropdown-item district_id" data-district="{{ $district->name_en }}" href="" id="cat_id" data-id="{{ $district->id }}">{{ $district->name_en }}
                    </a>
                    @endforeach
                </div>
            </li>
            @endforeach
            @endisset
        </ul>

        <ul class="navbar-nav p-3 rounded bg-white mt-3">
            <li class="nav-item">
                <a class="nav-link malls_select border-0">
                    All Malls
                </a>
            </li>
        </ul>

        <!-- <h6 class="card-header"><a href="" class="style_id" id="style_id" data-id=""> All Styles</a></h6> -->

        <!-- Links -->
        <ul class="navbar-nav p-3 rounded bg-white mt-3">
            <li class="nav-item">
                <a href="" class="nav-link style_id" data-style="All Styles" id="style_id" data-id="">
                    All Styles
                </a>
            </li>
            @isset($styles)
            @foreach ($styles as $style)
            <li class="nav-item">
                <a class="nav-link style_id" href="" data-style="{{ $style->name_en }}" id="style_id" data-id="{{ $style->id }}">{{ $style->name_en }} <span class="sr-only">(current)</span></a>
            </li>
            @endforeach
            @endisset
        </ul>
    </div>

    <script>
        $('.fixed-side-nav .sidemenu-button').on('click', function(){
            $('.fixed-side-nav').toggleClass('swipe-menu')
        })
    </script>
</section>


<div class="showrooms">
    <section class="trending">
        <div class="container">
            <div class="row py-5">
                <div class="col-lg-2 px-0 d-lg-block d-none">
                    <nav class="showrooms-filter my-1">
                        <!-- Links -->
                        <ul class="navbar-nav p-3 rounded bg-white">
                            <li>
                                <a href="#" class="nav-link city_id" id="cat_id" data-city="All Cities" data-id="">
                                    All
                                    Locations
                                </a>
                            </li>

                            @isset($cities)
                            @foreach ($cities as $city)
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle city_id" data-city="{{ $city->name_en }}" href="#" data-id="{{ $city->id }}" id="navbardrop" data-toggle="dropdown">
                                    {{ $city->name_en }}
                                </a>
                                <div class="dropdown-menu">
                                    @foreach($city->districtes as $district)
                                    <a class="dropdown-item district_id" data-district="{{ $district->name_en }}" href="" id="cat_id" data-id="{{ $district->id }}">{{ $district->name_en }}
                                    </a>
                                    @endforeach
                                </div>
                            </li>
                            @endforeach
                            @endisset
                        </ul>

                        <ul class="navbar-nav p-3 rounded bg-white mt-3">
                            <li class="nav-item">
                                <a class="nav-link malls_select">
                                    All Malls
                                </a>
                            </li>
                        </ul>

                        <!-- <h6 class="card-header"><a href="" class="style_id" id="style_id" data-id=""> All Styles</a></h6> -->

                        <!-- Links -->
                        <ul class="navbar-nav p-3 rounded bg-white mt-3">
                            <li class="nav-item">
                                <a href="" class="nav-link style_id" data-style="All Styles" id="style_id" data-id="">
                                    All Styles
                                </a>
                            </li>
                            @isset($styles)
                            @foreach ($styles as $style)
                            <li class="nav-item">
                                <a class="nav-link style_id" href="" data-style="{{ $style->name_en }}" id="style_id" data-id="{{ $style->id }}">{{ $style->name_en }} <span class="sr-only">(current)</span></a>
                            </li>
                            @endforeach
                            @endisset
                        </ul>

                    </nav>
                </div>

                <!--==== Vendors ====-->
                <!--==== Vendors ====-->
                <div class="col-lg-10 my-1  px-4">
                    <div class="col-md-12 p-0">
                        <div class="col-md-12 p-0">
                            <section class="cover" style="background-image:url('{{ asset('assets/site/images/ad1.jpg') }}');"></section>
                        </div>
                    </div>
                    <h3 id="products_title_info">Showrooms /
                        All Cities / All Districts / All Styles</h3>
                    <div class="showrooms_data">
                        @include('frontend.showrooms.showrooms_data')
                    </div>
                </div>
            </div>
    </section>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        var keyword = '';
        var district = '';
        var city = '';
        var style = '';
        var malls = '';
        var style_word = 'All Styles';
        var district_word = 'All Districts';
        var city_word = 'All Cities';

        $('#search').keyup(function() {
            keyword = $.trim($(this).val());
            style = $.trim(style);
            district = $.trim(district);
            city = $.trim(city);
            malls = $.trim(malls);
            fetch_data(1);
        });

        $('.malls_select').click(function(e) {
            e.preventDefault();
            malls = 1;
            $('.city_id').parent().removeClass('active');
            $('.style_id').parent().removeClass('active');
            $('#products_title_info').html('Malls');
            fetch_data(1);
        });

        $('.district_id').click(function(e) {
            e.preventDefault();
            e.stopPropagation();
            keyword = $.trim(keyword);
            style = $.trim(style);
            city = '';
            malls = '';
            $('.malls_select').parent().removeClass('active');
            district = $.trim($(this).attr('data-id'));
            district_word = $(this).data('district');
            $('#products_title_info').html('Showrooms / ' + city_word + ' / ' + district_word + ' / ' + style_word);
            fetch_data(1);
        });

        $('.city_id').click(function(e) {
            e.preventDefault();
            keyword = $.trim(keyword);
            style = $.trim(style);
            district = '';
            malls = '';
            $(this).parent('li').siblings().removeClass('active');
            $(this).parent('li').addClass('active');
            $('.malls_select').parent().removeClass('active');
            city = $.trim($(this).attr('data-id'));
            city_word = $(this).data('city');
            district_word = "All Districts";
            $('#products_title_info').html('Showrooms / ' + city_word + ' / ' + district_word + ' / ' + style_word);
            fetch_data(1);
        });

        $('.style_id').click(function(e) {
            e.preventDefault();
            keyword = $.trim(keyword);
            style = $(this).attr('data-id');
            district = $.trim(district);
            city = $.trim(city);
            malls = '';
            $('.malls_select').parent().removeClass('active');
            district_word = district_word;
            city_word = city_word;
            style_word = $(this).data('style');
            $('#products_title_info').html('Showrooms / ' + city_word + ' / ' + district_word + ' / ' + style_word);
            fetch_data(1);
        });

        $(document).on('click', '.pagination a', function(e) {
            e.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            fetch_data(page);
        });

        function fetch_data(page) {
            keyword = $.trim(keyword);
            style = $.trim(style);
            district = $.trim(district);
            city = $.trim(city);
            malls = $.trim(malls);
            var url = "{{route('user.get.showrooms')}}";
            var url = url + '?keyword=' + keyword + '&style=' + style + '&malls=' + malls + '&district=' +
                district + '&city=' + city + '&page=' + page;
            $.ajax({
                type: "GET",
                url: url,
                success: function(data) {
                    $('.showrooms_data').html(data);
                },
                cache: false
            });
        }
    });
</script>

@endsection