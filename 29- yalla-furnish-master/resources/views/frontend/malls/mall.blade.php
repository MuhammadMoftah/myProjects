@extends('frontend.master')
@section('styles')
<script type="text/javascript" src='https://maps.google.com/maps/api/js?sensor=false&libraries=places&key=AIzaSyCiSj64wEyRti_DeuBJQRkOVSO7M3cJtRY'></script>
@endsection
@section('search')
@include('frontend.search_layouts.search')
@endsection
@section('body')
<div class="showrooms">
    <div class="container head">
        <div class="row p-0 bg-white border-bottom">
            <div class="col-md-12 p-0">
                <section class="cover" style="background-image:url({{ $mall->cover }});">
                </section>
            </div>
            <div class="col-lg-2 text-center">
                <div class="img" style="background-image:url('{{$mall->image}}')"></div>
            </div>
            <div class="col-lg-10 col-12 comp-contact " style=" padding: 0px 31px 0 24px; ">
                <h5 class="mb-2 d-inline-block mt-1 py-2 font-weight-bold">{{ substr($mall->name,0,15) }}
                </h5>
            </div>
        </div>
    </div>

    <section class="trending">
        <div class="container">
            <div class="row bg-white mb-3  px-4">
                <div class="col-md-2">
                    {{-- showroom nav tabs --}}
                    <div class="showroom-nav">
                        <button class="btn btn-block main-btn my-2 showroom-tabs" id="product">Showrooms</button>
                        <button class="btn btn-block main-btn2 my-2 showroom-tabs" id="info">Info</button>
                    </div>
                </div>
                {{-- showroom content --}}
                <div class="col-md-10" id="main-content">
                    @include('frontend.malls.mallsTabs.showrooms')
                    @include('frontend.malls.mallsTabs.mallInfo')
                </div>
            </div>
    </section>
</div>
@endsection
@section('scripts')
<script>
    var lat = JSON.parse({{$mall->lat}});
    var lng = JSON.parse({{$mall->lng}});
    var map = new google.maps.Map(document.getElementById('map'), {
        center: {
            lat: lat,
            lng: lng
        },
        zoom: 15
    });
    var marker = new google.maps.Marker({
        position: {
            lat: lat,
            lng: lng
        },
        map: map,
    });
</script>
@endsection