@extends('admin.master')
@section('styles')
<link href="{{asset('assets/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
<script type="text/javascript" src='https://maps.google.com/maps/api/js?sensor=false&libraries=places&key=AIzaSyCiSj64wEyRti_DeuBJQRkOVSO7M3cJtRY'></script>
@endsection
@section('body')

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Create Showroom
                </h2>
            </div>
            <div class="body">
                @include('admin.layouts.errors')
                @include('admin.layouts.message')
                <form id="form_advanced_validation" enctype="multipart/form-data" method="POST" action="{{route('admin.showroom.store')}}">
                    {{ csrf_field() }}

                    <div class="form-group form-float ">
                        <div class="form-line">
                            <input type="text" value="{{old('name_ar')}}" name="name_ar" class="form-control no-resize">
                            <label class="form-label">* Arabic Name</label>
                        </div>

                        <label for="arabic_name">
                            <p style="color: red">{{ $errors->has('name_ar')?$errors->first('name_ar'):'' }}
                            </p>
                        </label>

                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" value="{{old('name_en')}}" name="name_en" class="form-control no-resize">
                            <label class="form-label">* English Name</label>
                        </div>
                        <label for="english_name">
                            <p style="color: red">{{ $errors->has('name_en')?$errors->first('name_en'):'' }}
                            </p>
                        </label>

                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" id="slug" value="{{old('slug')}}" name="slug" class="form-control no-resize">
                            <label class="form-label">* SLUG</label>
                        </div>
                        <label for="slug">
                            <p style="color: red">{{ $errors->has('slug')?$errors->first('slug'):'' }}
                            </p>
                        </label>

                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" value="{{old('youtube')}}" name="youtube" class="form-control no-resize">
                            <label class="form-label">* YouTube Link</label>
                        </div>
                        <label for="youtube_link">
                            <p style="color: red">{{ $errors->has('youtube')?$errors->first('youtube'):'' }}
                            </p>
                        </label>

                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" value="{{old('facebook')}}" name="facebook" class="form-control no-resize">
                            <label class="form-label">* Facebook Link </label>
                        </div>
                        <label for="facebook_link">
                            <p style="color: red">{{ $errors->has('facebook')?$errors->first('facebook'):'' }}
                            </p>
                        </label>

                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" value="{{old('twitter')}}" name="twitter" class="form-control no-resize">
                            <label class="form-label">* Twitter Link</label>
                        </div>
                        <label for="twitter_link">
                            <p style="color: red">{{ $errors->has('twitter')?$errors->first('twitter'):'' }}
                            </p>
                        </label>

                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" value="{{old('website')}}" name="website" class="form-control no-resize">
                            <label class="form-label">* Website Link</label>
                        </div>
                        <label for="website_link">
                            <p style="color: red">{{ $errors->has('website')?$errors->first('website'):'' }}
                            </p>
                        </label>

                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" value="{{old('instgram')}}" name="instgram" class="form-control no-resize">
                            <label class="form-label">* Instgram Link </label>
                        </div>
                        <label for="instgram_link">
                            <p style="color: red">{{ $errors->has('instgram')?$errors->first('instgram'):'' }}
                            </p>
                        </label>

                    </div>


                    <div class="form-group form-float">
                        <div class="form-line">
                            <textarea name="about" cols="30" rows="5" class="form-control no-resize">{{old('about')}}</textarea>
                            <label class="form-label">* About</label>
                        </div>
                        <label for="about">
                            <p style="color: red">{{ $errors->has('about')?$errors->first('about'):'' }} </p>
                        </label>

                    </div>

                    @if ($users)
                    <div class="form-group form-float">
                        <div class="form-line">
                            <p>
                                <b>* Users</b>
                            </p>
                            <select name="user_id" class="form-control show-tick" data-live-search="true">
                                <option disabled selected>* Select User</option>

                                @foreach ($users as $user)
                                <option value="{{ $user->id }}" {{ old('user_id') ==  $user->id  ? 'selected':'' }}>
                                    {{ $user->first_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <label for="users">
                            <p style="color: red">{{ $errors->has('users')?$errors->first('users'):'' }} </p>
                        </label>

                    </div>
                    @endif

                    @if ($malls)
                    <div class="form-group form-float">
                        <div class="form-line">
                            <p>
                                <b>* Malls</b>
                            </p>
                            <select name="malls[]" class="form-control show-tick" multiple data-live-search="true">
                                @if(old('malls'))
                                <option disabled selected>* Select Malls</option>
                                @endif
                                @foreach ($malls as $mall)
                                <option value="{{ $mall->id }}" @if(old('malls')) {{ in_array($mall->id,old('malls')) ? 'selected':'' }} @endif>
                                    {{ $mall->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <label for="malls">
                            <p style="color: red">{{ $errors->has('malls')?$errors->first('malls'):'' }} </p>
                        </label>
                    </div>
                    @endif

                    @if ($styles)
                    <div class="form-group form-float">
                        <div class="form-line">
                            <p>
                                <b>* Styles</b>
                            </p>
                            <select name="styles[]" class="form-control show-tick" multiple data-live-search="true">
                                @if(old('styles'))
                                <option disabled selected>* Select Style</option>
                                @endif
                                @foreach ($styles as $style)
                                <option value="{{ $style->id }}" @if(old('styles')) {{ in_array($style->id,old('styles')) ? 'selected':'' }} @endif>
                                    {{ $style->name_en }}</option>
                                @endforeach
                            </select>
                        </div>
                        <label for="styles">
                            <p style="color: red">{{ $errors->has('styles')?$errors->first('styles'):'' }} </p>
                        </label>
                    </div>
                    @endif
                    @if ($categories)
                    <div class="form-group form-float">
                        <div class="form-line">
                            <p>
                                <b>* Categories</b>
                            </p>
                            <select name="categories[]" class="form-control show-tick" multiple data-live-search="true">
                                <option disabled selected>* Select Category</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->name_en }}</option>
                                @endforeach
                            </select>
                        </div>
                        <label for="category_id">
                            <p style="color: red">{{ $errors->has('category_id')?$errors->first('category_id'):'' }} </p>
                        </label>

                    </div>
                    @endif

                    @if ($cities)
                    <div class="form-group form-float">
                        <div class="form-line">
                            <p>
                                <b>* City</b>
                            </p>
                            <select name="city_id" id="city" class="form-control show-tick" data-live-search="true">
                                <option disabled selected>* Select City</option>

                                @foreach ($cities as $city)
                                <option value="{{ $city->id }}" {{ old('city_id') ==  $city->id  ? 'selected':'' }}>{{ $city->name_en }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <label for="city">
                            <p style="color: red">{{ $errors->has('city')?$errors->first('city'):'' }} </p>
                        </label>

                    </div>
                    @endif


                    <div class="form-group form-float">
                        <div class="form-line" id="district-content">

                        </div>
                    </div>



                    <div class="form-group form-float" style="width:90%">
                        <div class="form-line">
                            <input style="margin-left: 120px;" type="file" hidden class="form-control" name="showroom_image">
                            <label class="form-label">Showroom Image</label>
                        </div>
                        <div class="help-info">jpg,png,jpeg</div>
                        <label for="showroom_image">
                            <p style="color: red">
                                {{ $errors->has('showroom_image')?$errors->first('showroom_image'):'' }} </p>
                        </label>
                    </div>

                    <div class="form-group form-float" style="width:90%">
                        <div class="form-line">
                            <input style="margin-left: 120px;" type="file" hidden class="form-control" name="background_image">
                            <label class="form-label">Background Image</label>
                        </div>
                        <div class="help-info">jpg,png,jpeg</div>
                        <label for="background_image">
                            <p style="color: red">
                                {{ $errors->has('background_image')?$errors->first('background_image'):'' }} </p>
                        </label>

                    </div>
                    <input type="hidden" id="lat" value="{{old('lat')}}" name="lat" />
                    <input type="hidden" id="lng" value="{{old('lang')}}" name="lang" />
                    <div class="form-group form-float">
                        <div class="form-line">
                            <label for="">English Address</label>
                            <input type="text" value="{{old('address_en')}}" name="address_en" class="form-control no-resize">
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <label for="">Arabic Address</label>
                            <input type="text" value="{{old('address_ar')}}" name="address_ar" class="form-control no-resize">
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <label class="d-inline" for="">Phone1: </label>
                            <input type="text" value="{{old('mob1')}}" name="mob1" class="form-control no-resize">
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <label class="d-inline" for="">Phone2: </label>
                            <input type="text" value="{{old('mob2')}}" name="mob2" class="form-control no-resize">
                        </div>
                    </div>

                    @if ($cities)
                    <div class="form-group form-float">
                        <div class="form-line">
                            <p>
                                <b>* Branch City</b>
                            </p>
                            <select name="branch_city" id="branch_city" class="form-control show-tick" data-live-search="true">
                                <option disabled selected>* Select City</option>
                                @foreach ($cities as $city)
                                <option value="{{ $city->id }}" {{ old('city_id') ==  $city->id  ? 'selected':'' }}>{{ $city->name_en }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <label for="city">
                            <p style="color: red">{{ $errors->has('city')?$errors->first('city'):'' }} </p>
                        </label>

                    </div>
                    @endif

                    <div class="form-group form-float">
                        <div class="form-line" id="district-content-2">

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="d-block" for="">Working Hours: </label>

                        <div class="form-check d-inline-block my-1">
                            <input type="checkbox" {{old('sunday')?'checked':''}} name="sunday" id="new_sunday">
                            <label class="form-check-label" for="new_sunday" style="width:90px">
                                Sunday
                            </label>
                            @include('admin.pages.showrooms.times',['day' => 'sunday'])
                        </div>

                        <div class="form-check d-inline-block my-1">
                            <input type="checkbox" name="monday" {{old('monday')?'checked':''}} id="new_monday">
                            <label class="form-check-label" style="width:90px" for="new_monday">
                                Monday
                            </label>
                            @include('admin.pages.showrooms.times',['day' => 'monday'])
                        </div>

                        <div class="form-check d-inline-block my-1">
                            <input type="checkbox" name="tuesday" {{old('tuesday')?'checked':''}} id="new_tuesday">
                            <label class="form-check-label" style="width:90px" for="new_tuesday">
                                Tuesday
                            </label>
                            @include('admin.pages.showrooms.times',['day' => 'tuesday'])
                        </div>

                        <div class="form-check d-inline-block my-1">
                            <input type="checkbox" name="wednesday" {{old('wednesday')?'checked':''}} id="new_wednesday">
                            <label class="form-check-label" style="width:90px" for="new_wednesday">
                                Wednesday
                            </label>
                            @include('admin.pages.showrooms.times',['day' => 'wednesday'])
                        </div>

                        <div class="form-check d-inline-block my-1">
                            <input type="checkbox" name="thursday" {{old('thursday')?'checked':''}} id="new_thursday">
                            <label class="form-check-label" style="width:90px" for="new_thursday">
                                Thursday
                            </label>
                            @include('admin.pages.showrooms.times',['day' => 'thursday'])
                        </div>

                        <div class="form-check d-inline-block my-1">
                            <input type="checkbox" name="friday" {{old('friday')?'checked':''}} id="new_friday">
                            <label class="form-check-label" style="width:90px" for="new_friday">
                                Friday
                            </label>
                            @include('admin.pages.showrooms.times',['day' => 'friday'])
                        </div>

                        <div class="form-check d-inline-block my-1">
                            <input type="checkbox" name="saturday" {{old('saturday')?'checked':''}} id="new_saturday">
                            <label class="form-check-label" style="width:90px" for="new_saturday">
                                Saturday
                            </label>
                            @include('admin.pages.showrooms.times',['day' => 'saturday'])
                        </div>

                        <div class="form-group d-flex justify-content-between">
                            <input type="text" class="form-control" id="search_on_map" placeholder="search in map...">
                        </div>

                        <div class="form-group d-flex justify-content-between">
                            <div id="map" style="width: 100%;height: 500px"></div>
                        </div>

                    </div>

                    <button class="btn btn-primary waves-effect" type="submit">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
@if(Session::has('success'))
<script>
    Swal.fire({
        position: 'center',
        type: 'success',
        title: 'showroom added successfully',
        timer: 2500,
        showConfirmButton: true,
        showLoaderOnConfirm: true,
    });
</script>
@endif
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
                    var data = "<h5>* District:</h5>" +
                        "<div> <select  name='district_id' id='district' class='form-control-sm form-control p-0 '>";
                    $.each(districts, function(index, value) {
                        data = data + "<option value=" + value['id'] + ">" + value['name_en'] + "</option>";
                    });
                    data = data + "</select></div>";
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
                    var data = "<h5>* District:</h5>" +
                        "<div> <select  name='branch_district' id='branch_district' class='form-control-sm form-control p-0 '>";
                    $.each(districts, function(index, value) {
                        data = data + "<option value=" + value['id'] + ">" + value['name_en'] + "</option>";
                    });
                    data = data + "</select></div>";
                    $('#district-content-2').html(data);
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