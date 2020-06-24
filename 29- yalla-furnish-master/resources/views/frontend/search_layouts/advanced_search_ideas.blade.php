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
                    <div class="row">
                        <div class="col-12 my-3 text-center">
                            <span class="font-weight-bold">Filters </span>
                        </div>

                        <div class="col-md col-6 my-1">
                            <select class="form-control cat_id" id="exampleFormControlSelect1">
                                <option value="">All Category</option>
                                @if ($categories)
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name_en }}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>

                    </div>
                </div>
            </div>
            <!--End Filter Row-->



            <!--Vendors-->
            <div class="row mb-3 px-2 product-content ideas_content">
                @include('frontend.ideas.advanced_ideas_data')
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
        if ("{{ request()->route()->getName() }}" == "advanced.search.ideas") {
            $(".bi").removeClass('main-btn3');
            $(".bi").addClass('main-btn');
        };
    })
</script>
<script type="text/javascript">
    $(document).ready(function() {
        var category = '';
        var keyword = "{{ $keyword }}";

        $('.cat_id').on('change', function(e) {
            e.preventDefault();
            category = $.trim($(this).val());
            fetch_data(1);
        });

        $(document).on('click', '.pagination a', function(e) {
            e.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            fetch_data(page);
        });

        function fetch_data(page) {
            category = $.trim(category);
            var url = "{{route('advanced.search.ideas')}}";
            var url = url + '?category=' + category + '&keyword=' + keyword + '&page=' + page;
            $.ajax({
                type: "GET",
                url: url,
                success: function(data) {
                    $('.ideas_content').html(" ");
                    $('.ideas_content').html(data);
                }
            });
        }
    });
</script>
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>

@endsection