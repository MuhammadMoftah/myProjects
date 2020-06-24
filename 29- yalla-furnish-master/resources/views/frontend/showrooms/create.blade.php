@extends('frontend.master')
@section('styles')

<link rel="stylesheet" href="{{asset('assets/site/css/addProduct.css?rand=1234')}}">
<style>



</style>
<script type="text/javascript" src='https://maps.google.com/maps/api/js?sensor=false&libraries=places&key=AIzaSyCiSj64wEyRti_DeuBJQRkOVSO7M3cJtRY'></script>
@endsection
@section('search')
@include('frontend.search_layouts.search')
@endsection
@section('body')

<section class="new-create-showroom ">
    <div class="container bg-white rounded py-2 my-4">
        <div class="alert alert-success" role="alert">
        </div>
        <div class="alert bg-red errors">
        </div>
        <div class="title head text-center">
            <h1 class="h5 text-capitalize mb-4 font-weight-bold">Create Profile For your Business</h1>
            <p class="h6">Welcome to Yalla Furnish. <br> Take your buisness to the next level and create your online showroom now</p>
        </div>

        <form method="POST" action="{{route('user.store.showroom')}}" id="create-showroom" class="pb-4 px-2" style="max-width: 800px;margin: auto;">
            <input type="hidden" id="lat" name="latitude" />
            <input type="hidden" id="lng" name="longitude" />
            <div class="row mb-2">
                <div class="col-sm-6">
                    <p class="h6 text-capitalize font-weight-bold" style="line-height:35px"> your brand name in english:</p>
                </div>

                <div class="col-sm-6">
                    <input id="name_en" type="text" class="form-control ml-md-0 mx-auto" name="name_en" placeholder="Your brand name in english">
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-6">
                    <p class="h6 text-capitalize font-weight-bold" style="line-height:35px"> your brand name in arabic:</p>
                </div>

                <div class="col-sm-6">
                    <input id="name_ar" type="text" class="form-control ml-md-0 mx-auto" name="name_ar" placeholder="Your brand name in arabic">
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-6">
                    <p class="h6 text-capitalize font-weight-bold" style="line-height:35px"> your SLUG:</p>
                </div>
                <div class="col-sm-6">
                    <input style="" disabled class="form-control ml-md-0 mx-auto" value="{{route('user.index')}}/" type="text">
                    <input id="slug" class="form-control ml-md-0 mx-auto" name="slug" style="max-width: 200px;
                    display: inline;
                    position: absolute;
                    top: 0px;
                    left: 50%;" type="text" placeholder="Slug">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-6 ">
                    <p class="h6 text-capitalize font-weight-bold mb-n1"> upload your brand logo</p>
                    <small class="text-capitalize text-muted"> best size 150 X 150 | supported files JPG, PNG, JPEG</small>
                </div>

                <div class="col-sm-6 text-right">
                    <label for="uploadlogo" class="d-block mb-2" style="cursor:pointer">
                        <span class="btn main-btn4">Upload Logo</span>
                    </label>
                    <img src="{{asset('images/white-image.png')}}" style="max-width:150px; max-height: 150px; border-radius:5px;box-shadow: 0px 0px 5px #cdcccc;" id="profileImage" alt="" />
                    <input type="file" style="display:none" id="uploadlogo" multiple="multiple" onchange="document.getElementById('profileImage').src = window.URL.createObjectURL(this.files[0])" />
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-6 ">
                    <p class="h6 text-capitalize font-weight-bold mb-n1"> upload your brand cover</p>
                    <small class="text-capitalize text-muted"> best size 1140 X 250 | supported files JPG, PNG, JPEG</small>
                </div>

                <div class="col-sm-6 text-right">
                    <label for="uploadcover" class="d-block mb-2" style="cursor:pointer">
                        <span class="btn main-btn4">Upload Cover</span>
                    </label>
                </div>

                <div class="col-sm-12">
                    <div id="profileImage2" style="width:100%;height: 250px; border-radius: 5px; background-image:url({{asset('images/white-image.png')}}); background-size: cover;background-position: center;box-shadow: 0px 0px 5px #cdcccc;">
                    </div>
                    <input type="file" style="display:none" id="uploadcover" multiple="multiple" onchange="document.getElementById('profileImage2').style.backgroundImage = 'url(' + window.URL.createObjectURL(this.files[0]) + ')'" />
                </div>
            </div>

            <div class="row mb-3 mt-4 categories">
                <div class="col-sm-12">
                    <p class="h6 font-weight-bold mt-4 mb-3">What are your brand categories?</p>
                </div>
                @foreach($categories as $category)
                <div class="col-md-3 col-sm-4 my-2">
                    <input class="d-none category-checkbox" type="checkbox" data-id="{{$category->id}}" id="{{$category->name_en}}">
                    <label for="{{$category->name_en}}" class="single-cate">
                        {{$category->name_en}}
                    </label>
                </div>
                @endforeach
                {{--<div class="col-sm-12">
                    <textarea placeholder="Suggest us more categories" class="form-control mt-3" rows="4"></textarea>
                </div>--}}
            </div>

            <div class="row mb-3 mt-4 categories">
                <div class="col-12">
                    <p class="h6 font-weight-bold mt-4 mb-3">What are your brand styles?</p>
                </div>
                @foreach($styles as $style)
                <div class="col-md-3 col-sm-4 my-2">
                    <input class="d-none style-checkbox" type="checkbox" data-id="{{$style->id}}" id="{{$style->name_en}}">
                    <label for="{{$style->name_en}}" class="single-cate">
                        {{$style->name_en}}
                    </label>
                </div>
                @endforeach
                {{--<div class="col-sm-12">
                    <textarea placeholder="Suggest us more styles" class="form-control mt-3" rows="4"></textarea>
                </div>--}}
            </div>

            <div class="row mb-3">
                <div class="col-sm-12">
                    <p class="h6 font-weight-bold my-3">Share your brand story with our visitors:</p>
                </div>

                <div class="col-sm-12">
                    <textarea id="about" name="about" placeholder="Your Bio" class="form-control" rows="5"></textarea>
                </div>
            </div>

            <div class="row mb-3 social-row">
                <div class="col-sm-12">
                    <p class="h6 font-weight-bold my-3">Your social network links:</p>
                </div>
                <div class="col-md-4 col-sm-5 pt-2 offset-md-1">
                    <i class="fas fa-globe-americas mr-2"></i>
                    <span>Brand Website:</span>
                </div>
                <div class="col-sm-7 my-1">
                    <input id="website" name="website" type="text" class="form-control ml-md-0 mx-auto" placeholder="Copy your website URL and paste here">
                </div>

                <div class="col-md-4 col-sm-5 pt-2 offset-md-1">
                    <i class="fab fa-facebook-f mr-2"></i>
                    <span>Facebook Page:</span>
                </div>
                <div class="col-sm-7 my-1">
                    <input id="facebook" name="facebook" type="text" class="form-control ml-md-0 mx-auto" placeholder="Copy your Facebook URL and paste here">
                </div>

                <div class="col-md-4 col-sm-5 pt-2 offset-md-1">
                    <i class="fab fa-instagram mr-2"></i>
                    <span>Instagram Page:</span>
                </div>
                <div class="col-sm-7 my-1">
                    <input id="instgram" name="instgram" type="text" class="form-control ml-md-0 mx-auto" placeholder="Copy your Instagram URL and paste here">
                </div>

                <div class="col-md-4 col-sm-5 pt-2 offset-md-1">
                    <i class="fab fa-youtube mr-2"></i>
                    <span>Youtube Page:</span>
                </div>
                <div class="col-sm-7 my-1">
                    <input id="youtube" name="youtube" type="text" class="form-control ml-md-0 mx-auto" placeholder="Copy your Youtube URL and paste here">
                </div>

                <div class="col-md-4 col-sm-5 pt-2 offset-md-1">
                    <i class="fab fa-twitter mr-2"></i>
                    <span>Twitter Profile:</span>
                </div>
                <div class="col-sm-7 my-1">
                    <input id="twitter" name="twitter" type="text" class="form-control ml-md-0 mx-auto" placeholder="Copy your Twitter URL and paste here">
                </div>

                <div class="col-md-4 col-sm-5 pt-2 offset-md-1">
                    <span>Showroom Location:</span>
                </div>
                <div class="col-sm-3 my-1">
                    <select id="city" name="city_id" class="form-control">
                        <option disabled selected>Select your city</option>
                        @foreach($cities as $city)
                        <option {{old('city_id')==$city->id?'selected':''}} value="{{$city->id}}">{{$city->name_en}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3 my-1 offset-md-1" id="district-content">

                </div>
            </div>

            <div class="row mb-3 social-row">
                <div class="col-sm-12">
                    <p class="h6 font-weight-bold mt-3">Branch Details:</p>
                </div>
                <div class="col-md-11 col-sm-12 py-2 offset-md-1">
                    Add your first branch now and you will be able to add more branches from your dashboard after creating your showroom.
                </div>
                <div class="col-md-4 col-sm-5 pt-2 offset-md-1">
                    <span>Branch Title:</span>
                </div>
                <div class="col-sm-7 my-1">
                    <input id="branch_title" name="title" type="text" class="form-control ml-md-0 mx-auto" placeholder="Ex: Nasr City Branch, 6th of Octorber Branch">
                </div>

                <div class="col-md-4 col-sm-5 pt-2 offset-md-1">
                    <span>English Address:</span>
                </div>
                <div class="col-sm-7 my-1">
                    <input id="new_address_en" name="address_en" type="text" class="form-control ml-md-0 mx-auto" placeholder="Write detailed English adress">
                </div>

                <div class="col-md-4 col-sm-5 pt-2 offset-md-1">
                    <span>Arabic Address:</span>
                </div>
                <div class="col-sm-7 my-1">
                    <input id="new_address_ar" name="address_ar" type="text" class="form-control ml-md-0 mx-auto" placeholder="Write detailed Arabic adress">
                </div>

                <div class="col-md-4 col-sm-5 pt-2 offset-md-1">
                    <span>Branch Location:</span>
                </div>
                <div class="col-sm-3 my-1">
                    <select name="branch_city" id="branch_city" class="form-control">
                        <option disabled selected>Select your city</option>
                        @foreach($cities as $city)
                        <option {{old('branch_city')==$city->id?'selected':''}} value="{{$city->id}}">{{$city->name_en}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3 my-1 offset-md-1" id="branch_districts">

                </div>

                <div class="col-md-4 col-sm-5 pt-2 offset-md-1">
                    <span>Phone Number:</span>
                </div>
                <div class="col-sm-3 my-1">
                    <input id="new_mob1" name="mob2" type="number" class="form-control ml-md-0 mx-auto" placeholder="Mobile or Landline">
                </div>

                <div class="col-md-3 my-1 offset-md-1">
                    <input id="new_mob2" name="mob2" type="number" class="form-control ml-md-0 mx-auto" placeholder="Mobile or Landline">
                </div>

                <div class="col-md-4 col-sm-5 pt-2 offset-md-1">
                    <span>Google Maps:</span>
                </div>
                <div class="col-sm-7 my-1">
                    <input type="text" id="search_on_map" class="form-control ml-md-0 mx-auto" placeholder="Search in map">
                </div>

                <div class="col-md-4 col-sm-5 pt-2 offset-md-1">
                    <span></span>
                </div>
                <div class="col-sm-7 my-1">
                    <div id="map" style="width: 100%;height: 400px"></div>
                </div>

                <div class="col-md-4 col-sm-5 pt-3 offset-md-1">
                    <span>
                        Work Schedules
                    </span>
                </div>
                <div class="col-sm-7 my-1">


                    <div class="row categories mb-2">
                        <div class="col-sm-4 my-1">
                            <input class="d-none" type="checkbox" id="new_sunday">
                            <label for="new_sunday" class="single-cate">
                                Sunday
                            </label>

                        </div>
                        @include('frontend.includes.times',['day' => 'sunday'])
                    </div>

                    <div class="row categories mb-2">
                        <div class="col-sm-4 my-1">
                            <input class="d-none" type="checkbox" id="new_monday">
                            <label for="new_monday" class="single-cate">
                                Monday
                            </label>
                        </div>
                        @include('frontend.includes.times',['day' => 'monday'])
                    </div>
                    <div class="row categories mb-2">
                        <div class="col-sm-4 my-1">
                            <input class="d-none" type="checkbox" id="new_tuesday">
                            <label for="new_tuesday" class="single-cate">
                                Tuesday
                            </label>
                        </div>
                        @include('frontend.includes.times',['day' => 'tuesday'])
                    </div>

                    <div class="row categories mb-2">
                        <div class="col-sm-4 my-1">
                            <input class="d-none" type="checkbox" id="new_wednesday">
                            <label for="new_wednesday" class="single-cate">
                                Wednesday
                            </label>
                        </div>
                        @include('frontend.includes.times',['day' => 'wednesday'])
                    </div>

                    <div class="row categories mb-2">
                        <div class="col-sm-4 my-1">
                            <input class="d-none" type="checkbox" id="new_thursday">
                            <label for="new_thursday" class="single-cate">
                                Thursday
                            </label>
                        </div>
                        @include('frontend.includes.times',['day' => 'thursday'])
                    </div>

                    <div class="row categories mb-2">
                        <div class="col-sm-4 my-1">
                            <input class="d-none" type="checkbox" id="new_friday">
                            <label for="new_friday" class="single-cate">
                                Friday
                            </label>
                        </div>
                        @include('frontend.includes.times',['day' => 'friday'])
                    </div>

                    <div class="row categories mb-2">
                        <div class="col-sm-4 my-1">
                            <input class="d-none" type="checkbox" id="new_staurday">
                            <label for="new_staurday" class="single-cate">
                                Saturday
                            </label>
                        </div>
                        @include('frontend.includes.times',['day' => 'saturday'])
                    </div>



                </div>

                <div class="row pt-3" style="border-top: 1px solid #dadada;">
                    <div class="col-12 my-2">
                        Our team will contact you to give you a full brief about how to use Yalla Furnish in the best way and handle your products and categories. Kindly provide us your contact details.
                    </div>

                    <div class="col-sm-4 my-1">
                        <input type="text" id="contact_name" name="contact_name" class="form-control" placeholder="Name">
                    </div>

                    <div class="col-sm-4 my-1">
                        <input type="number" id="phone" name="phone" class="form-control" placeholder="Phone Number">
                    </div>

                    <div class="col-sm-4 my-1">
                        <input type="email" id="contact_email" name="contact_email" class="form-control" placeholder="Email Address">
                    </div>

                    <div class="col-12 text-center mt-4 mb-3">
                        <button type="submit" id="create-showroom-btn" class="btn main-btn">Create My Showroom</button>
                    </div>

                </div>
        </form>
    </div>
</section>
@endsection
@section('scripts')
<script src="{{asset('assets/site/js/addShowroom.js?rand=4000')}}"></script>
<script>
    $(document).ready(function() {
        $("#city").on('change', function() {
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
                    var data = "<select  name='district_id' id='district' class='form-control'>";
                    $.each(districts, function(index, value) {
                        data = data + "<option value=" + value['id'] + ">" + value['name_en'] + "</option>";
                    });
                    data = data + "</select>";
                    $('#district-content').html(data);
                    $('.loader').hide();
                }
            });
        });


        $("#branch_city").on('change', function() {
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
                    var data = "<select  name='district_id' id='district' class='form-control'>";
                    $.each(districts, function(index, value) {
                        data = data + "<option value=" + value['id'] + ">" + value['name_en'] + "</option>";
                    });
                    data = data + "</select>";
                    $('#branch_districts').html(data);
                    $('.loader').hide();
                }
            });
        });
    })
</script>
<script>
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude,
                },
                zoom: 15
            });
            var marker = new google.maps.Marker({
                position: {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude,
                },
                map: map,
                draggable: true
            });
            $('#lat').val(position.coords.latitude);
            $('#lng').val(position.coords.longitude);

            var searchBox = new google.maps.places.SearchBox(document.getElementById('search_on_map'));
            google.maps.event.addListener(searchBox, 'places_changed', function() {
                var places = searchBox.getPlaces();
                var bounds = new google.maps.LatLngBounds();
                var i, place;
                for (i = 0; place = places[i]; i++) {
                    bounds.extend(place.geometry.location);
                    marker.setPosition(place.geometry.location);
                }
                map.fitBounds(bounds);
                map.setZoom(15);
            });

            google.maps.event.addListener(marker, 'position_changed', function() {
                var lat = marker.getPosition().lat();
                var lng = marker.getPosition().lng();
                $('#lat').val(lat);
                $('#lng').val(lng);
            });
        }, function(error) {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {
                    lat: 30.06263,
                    lng: 31.24967,
                },
                zoom: 15
            });
            var marker = new google.maps.Marker({
                position: {
                    lat: 30.06263,
                    lng: 31.24967,
                },
                map: map,
                draggable: true
            });
            $('#lat').val(30.06263);
            $('#lng').val(31.24967);

            var searchBox = new google.maps.places.SearchBox(document.getElementById('search_on_map'));
            google.maps.event.addListener(searchBox, 'places_changed', function() {
                var places = searchBox.getPlaces();
                var bounds = new google.maps.LatLngBounds();
                var i, place;
                for (i = 0; place = places[i]; i++) {
                    bounds.extend(place.geometry.location);
                    marker.setPosition(place.geometry.location);
                }
                map.fitBounds(bounds);
                map.setZoom(15);
            });

            google.maps.event.addListener(marker, 'position_changed', function() {
                var lat = marker.getPosition().lat();
                var lng = marker.getPosition().lng();
                $('#lat').val(lat);
                $('#lng').val(lng);
            });
        });
    }
</script>
@endsection