@extends('frontend.master')
@section('search')
@include('frontend.search_layouts.search')
@endsection
@section('body')
<div class="showrooms">
    <section class="trending">
        <div class="container">
            <div class="row py-5">
                <div class="col-lg-2 px-0">

                </div>
                <!--==== Vendors ====-->
                <!--==== Vendors ====-->
                <div class="col-lg-10 my-1  px-4">
                    <h3 id="products_title_info">All Malls</h3>
                    <div class="malls_data">
                        @include('frontend.malls.malls_data')
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

        $('#search').keyup(function() {
            keyword = $.trim($(this).val());
            fetch_data(1);
        });

        $(document).on('click', '.pagination a', function(e) {
            e.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            fetch_data(page);
        });

        function fetch_data(page) {
            keyword = $.trim(keyword);
            var url = "{{route('user.get.malls')}}";
            var url = url + '?search=' + keyword + '&page=' + page;
            $.ajax({
                type: "GET",
                url: url,
                success: function(data) {
                    $('.malls_data').html(data);
                }
            });
        }
    });
</script>
@endsection