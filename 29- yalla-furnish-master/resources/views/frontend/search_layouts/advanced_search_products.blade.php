@extends('frontend.master')
@section('search')
@include('frontend.search_layouts.search')
@endsection
@section('body')
<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
<div class="showrooms search-result">
    <section class="trending">
        <div class="container">
            <div class="row mb-3">
                @include('frontend.includes.advanced_search_header')

                <div class="filters col-12 mb-2">
                    <div class="row px-1">
                        <div class="col-12 my-3 text-center">
                            <span class="font-weight-bold">Filters </span>
                        </div>

                        <div class="col-md col-6 my-1">
                            <select class="form-control  color_id" id="exampleFormControlSelect1">
                                <option value="">All Colors</option>
                                @if ($colors)
                                @foreach ($colors as $color)
                                <option value="{{ $color->id }}">{{ $color->name_en }}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="col-md col-6 my-1">
                            <select class="form-control  cat_id" id="exampleFormControlSelect1">
                                <option value="">All Category</option>
                                @if ($categories)
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }} " {{ request('category') == $category->id ? 'selected':'' }}>
                                    {{ $category->name_en }}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="col-md col-6 my-1">
                            <select class="form-control  style_id" id="exampleFormControlSelect1">
                                <option value="">All Style</option>
                                @if ($styles)
                                @foreach ($styles as $style)

                                <option value="{{ $style->id }}">{{ $style->name_en }}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="col-md col-6 my-1">
                            <select class="form-control  city_id" id="exampleFormControlSelect1">
                                <option value="">All Cities</option>
                                @if ($cities)
                                @foreach ($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->name_en }}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="row my-2 px-1">
                        <div class="col-md col-6 my-1">
                            <input type="number" class="form-control price_id" id="" min="0" placeholder="Max Price" max="{{ $max_price ? $max_price : ' 1000000' }}">
                        </div>
                        <div class="col-md col-6 my-1">
                            <input type="number" class="form-control height_id" id="" min="0" placeholder="height">
                        </div>
                        <div class="col-md col-6 my-1">
                            <input type="number" class="form-control width_id" id="" min="0" placeholder=" width">
                        </div>
                        <div class="col-md col-6 my-1">
                            <input type="number" class="form-control depth_id" id="" min="0" placeholder="depth">
                        </div>
                    </div>

                    <div class="row px-1">
                        <div id="districts_holder" class="offset-md-3 col-md-6 col-12 my-1"></div>
                    </div>
                </div>

            </div>
            <!--End Filter Row-->



            <!--Vendors-->
            <div class="container">
                <div class="products row" id="product-content">
                    @include('frontend.products.advanced_product_data')
                </div>
            </div>
            <!--End Vendors Row-->
        </div>
    </section>




</div>
<!--End Showrooms-->






@endsection
@section('scripts')

<script>
    $(document).ready(function() {
        if ("{{ request()->route()->getName() }}" == "advanced.search.products") {
            $(".bf").removeClass('main-btn3');
            $(".bf").addClass('main-btn');
        };
    })
</script>
<script>
    //    === Make div square ===
    $('.trending #product-content .part').outerHeight($('.trending #product-content .part').outerWidth());
    $(window).on('resize', function() {
        $('.trending #product-content .part').outerHeight($('.trending #product-content .part').outerWidth());
    })
</script>
<script type="text/javascript">
    $(document).ready(function() {
        var category = "{{request('cat_id')?request('cat_id'):''}}";
        var district = '';
        var color = '';
        var city = '';
        var style = '';
        var price = '';
        var height = '';
        var width = '';
        var depth = '';
        var keyword = "{{ $keyword }}";

        $('.cat_id').on('change', function(e) {
            e.preventDefault();
            style = $.trim(style);
            color = $.trim(color);
            price = $.trim(price);
            height = $.trim(height);
            width = $.trim(width);
            depth = $.trim(depth);
            category = $.trim($(this).val());
            fetch_data(1);
        });

        $('.style_id').on('change', function(e) {
            e.preventDefault();
            style = $(this).val();
            color = $.trim(color);
            price = $.trim(price);
            height = $.trim(height);
            width = $.trim(width);
            depth = $.trim(depth);
            category = $.trim(category);
            fetch_data(1);
        });

        $('.city_id').on('change', function(e) {
            e.preventDefault();
            city = $(this).val();
            style = $.trim(style);
            color = $.trim(color);
            price = $.trim(price);
            height = $.trim(height);
            width = $.trim(width);
            depth = $.trim(depth);
            category = $.trim(category);
            fetch_data(1);
        });

        $('body').on('change', '.district_id', function(e) {
            e.preventDefault();
            district = $(this).val();
            city = '';
            style = $.trim(style);
            color = $.trim(color);
            price = $.trim(price);
            height = $.trim(height);
            width = $.trim(width);
            depth = $.trim(depth);
            category = $.trim(category);
            fetch_data(1);
        });


        $('.color_id').on('change', function(e) {
            e.preventDefault();
            color = $(this).val();
            style = $.trim(style);
            price = $.trim(price);
            height = $.trim(height);
            width = $.trim(width);
            depth = $.trim(depth);
            category = $.trim(category);
            fetch_data(1);
        });
        $('.price_id').on('change', function(e) {
            e.preventDefault();
            price = $(this).val();
            style = $.trim(style);
            color = $.trim(color);
            height = $.trim(height);
            width = $.trim(width);
            depth = $.trim(depth);
            category = $.trim(category);;
            fetch_data(1);
        });
        $('.height_id').on('change', function(e) {
            e.preventDefault();
            height = $(this).val();
            style = $.trim(style);
            color = $.trim(color);
            price = $.trim(price);
            width = $.trim(width);
            depth = $.trim(depth);
            category = $.trim(category);
            fetch_data(1);
        });
        $('.width_id').on('change', function(e) {
            e.preventDefault();
            width = $(this).val();
            style = $.trim(style);
            color = $.trim(color);
            price = $.trim(price);
            height = $.trim(height);
            depth = $.trim(depth);
            category = $.trim(category);
            fetch_data(1);
        });
        $('.depth_id').on('change', function(e) {
            e.preventDefault();
            depth = $(this).val();
            style = $.trim(style);
            color = $.trim(color);
            price = $.trim(price);
            height = $.trim(height);
            width = $.trim(width);
            category = $.trim(category);
            fetch_data(1);
        });

        $(document).on('click', '.pagination a', function(e) {
            e.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            fetch_data(page);
        });

        function fetch_data(page) {
            style = $.trim(style);
            category = $.trim(category);
            width = $.trim(width);
            color = $.trim(color);
            price = $.trim(price);
            height = $.trim(height);
            depth = $.trim(depth);
            city = $.trim(city);
            district = $.trim(district);
            var url = "{{route('advanced.search.products')}}";
            var url = url + '?district=' + district + '&city=' + city + '&style=' + style +
                '&category=' + category + '&color=' + color + '&price=' + price + '&width=' + width +
                '&height=' + height + '&depth=' + depth + '&keyword=' + keyword + '&page=' +
                page;
            $.ajax({
                type: "GET",
                url: url,
                success: function(data) {
                    $('.products').html(" ");
                    $('.products').html(data);
                    $('.vendors .part').outerHeight($('.vendors .part').outerWidth());
                    $(window).on('resize', function() {
                        $('.vendors .part').outerHeight($('.vendors .part').outerWidth());
                    })
                    //    === Make div square ===
                    $('.trending #product-content .part').outerHeight($(
                        '.trending #product-content .part').outerWidth());
                    $(window).on('resize', function() {
                        $('.trending #product-content .part').outerHeight($(
                            '.trending #product-content .part').outerWidth());
                    })
                }
            });
        }

        $('.city_id').on('change', function() {
            var city_id = $(this).val();
            var url2 = "{{route('user.get.districts')}}";
            $.ajax({
                type: "GET",
                url: url2,
                data: {
                    city_id: city_id
                },
                success: function(data) {
                    var districts = data.districts;
                    var data =
                        '<select class="form-control  district_id" id="exampleFormControlSelect1">' +
                        '<option selected disabled value="">All Districts</option>';
                    $.each(districts, function(index, value) {
                        data = data + "<option value=" + value['id'] + ">" + value[
                            'name_en'] + "</option>";
                    });
                    data = data + "</select>";
                    $('#districts_holder').html(data);
                    $('.loader').hide();
                }
            });
        })
    });
</script>
@include('frontend.includes.product_action_scripts')
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
@endsection