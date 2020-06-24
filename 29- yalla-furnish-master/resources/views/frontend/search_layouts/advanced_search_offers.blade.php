@extends('frontend.master')
{{-- @section('styles')
<link rel="stylesheet" href="{{ asset }}('assets/site/css/addProduct.css?rand=1234')}}">
@endsection --}}
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
                    <div class="row">
                        <div class="col-12 my-3 text-center">
                            <span class="font-weight-bold">Filters </span>
                        </div>

                        <div class="col-md col-6 my-1">
                            <select class="form-control cat_id mx-0" id="exampleFormControlSelect1">
                                <option value="">Category</option>
                                @if($categories)
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name_en }}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="col-md col-6 my-1">
                            <select class="form-control city_id mx-0" id="exampleFormControlSelect1">
                                <option value="">All Cities</option>
                                @if ($cities)
                                @foreach ($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->name_en }}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="col-md col-6 my-1">
                            <input class="form-control discount" placeholder="Discount amount" type="number" name="discount" min="0" max="100" id="">
                        </div>
                    </div>

                    <div class="row">
                        <div id="districts_holder" class="offset-md-3 col-md-6 col-12 my-1"></div>
                    </div>

                </div>
            </div>
            <!--End Filter Row-->



            <!--Vendors-->
            <div class="container">
                <div class="products row" id="product-content">
                    @include('frontend.products.advanced_offer_data')
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
        if ("{{ request()->route()->getName() }}" == "advanced.search.offers") {
            $(".bo").removeClass('main-btn3');
            $(".bo").addClass('main-btn');
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
        var category = '';
        var discount = '';
        var city = '';
        var district = '';
        var keyword = "{{ $keyword }}";

        $('.cat_id').on('change', function(e) {
            e.preventDefault();
            category = $.trim($(this).val());
            fetch_data(1);
        });

        $('.discount').on('keyup', function(e) {
            e.preventDefault();
            discount = $.trim($(this).val());
            fetch_data(1);
        });

        $('.city_id').on('change', function(e) {
            e.preventDefault();
            city = $.trim($(this).val());
            fetch_data(1);
        });

        $('body').on('change', '.district_id', function(e) {
            e.preventDefault();
            district = $.trim($(this).val());
            city = '';
            fetch_data(1);
        });

        $(document).on('click', '.pagination a', function(e) {
            e.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            fetch_data(page);
        });

        function fetch_data(page) {
            category = $.trim(category);
            city = $.trim(city);
            district = $.trim(district);
            discount = $.trim(discount);
            var url = "{{route('advanced.search.offers')}}";
            var url = url + '?district=' + district + '&city=' + city + '&keyword=' + keyword + '&category=' + category + '&discount=' + discount + '&page=' + page;
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
                    $('.trending #product-content .part').outerHeight($('.trending #product-content .part').outerWidth());
                    $(window).on('resize', function() {
                        $('.trending #product-content .part').outerHeight($('.trending #product-content .part').outerWidth());
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
                    var data = '<select class="form-control district_id" id="exampleFormControlSelect1">' +
                        '<option selected disabled value="">All Districts</option>';
                    $.each(districts, function(index, value) {
                        data = data + "<option value=" + value['id'] + ">" + value['name_en'] + "</option>";
                    });
                    data = data + "</select>";
                    $('#districts_holder').html(data);
                    $('.loader').hide();
                }
            });
        })
    });
</script>
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
@endsection