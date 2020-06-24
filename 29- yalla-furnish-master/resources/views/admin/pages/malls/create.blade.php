@extends('admin.master')
@section('styles')
<link href="{{asset('assets/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
<script type="text/javascript" src='https://maps.google.com/maps/api/js?sensor=false&libraries=places&key=AIzaSyCiSj64wEyRti_DeuBJQRkOVSO7M3cJtRY'></script>
@endsection
@section('body')
<!-- Horizontal Layout -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Create Mall
                </h2>
            </div>
            <div class="body">
                @include('admin.layouts.errors')
                @include('admin.layouts.message')
                <form id="form_advanced_validation" enctype="multipart/form-data" method="POST" action="{{route('admin.malls.create.post')}}">
                    {{ csrf_field() }}
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input id="name_en" type="text" value="{{old('name')}}" class="form-control" name="name" maxlenght="200" required>
                            <label class="form-label">* Name</label>
                        </div>
                        <div class="help-info">Max. Char: 200</div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input id="location" type="text" value="{{old('location')}}" class="form-control" name="location" maxlenght="500">
                            <label class="form-label">Location</label>
                        </div>
                    </div>
                    <div class="form-group d-flex justify-content-between">
                        <input type="text" class="form-control" id="search_on_map" placeholder="search in map...">
                    </div>

                    <div class="form-group d-flex justify-content-between">
                        <div id="map" style="width: 100%;height: 500px"></div>
                    </div>
                    <input type="hidden" id="lat" value="{{old('lat')}}" name="lat" />
                    <input type="hidden" id="lng" value="{{old('lang')}}" name="lng" />
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input id="facebook" type="text" value="{{old('facebook')}}" class="form-control" name="facebook" maxlenght="500">
                            <label class="form-label">Facebook</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input id="twitter" type="text" value="{{old('twitter')}}" class="form-control" name="twitter" maxlenght="500">
                            <label class="form-label">Twitter</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input id="instagram" type="text" value="{{old('instagram')}}" class="form-control" name="instagram" maxlenght="500">
                            <label class="form-label">Instagram</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <label class="form-label">Opening Hours</label>
                        <div class="form-line">
                            <textarea id="opening_hours" name="opening_hours" value="{{old('opening_hours')}}" cols="30" rows="5" class="form-control no-resize" required>{{old('opening_hours')}}</textarea>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <label class="form-label">About</label>
                        <div class="form-line">
                            <textarea cols="10" rows="10" id="about" name="about" value="{{old('about')}}" cols="30" rows="5" class="form-control no-resize">{{old('about')}}</textarea>
                        </div>
                    </div>
                    <div class="form-group form-float" style="width:90%">
                        <label class="form-label">Mall Image</label>
                        <div class="form-line">
                            <input style="margin-left: 50px;" type="file" hidden class="form-control" name="image">
                        </div>
                        <div class="help-info"></div>
                    </div>
                    <div class="form-group form-float" style="width:90%">
                        <label class="form-label">Mall Cover</label>
                        <div class="form-line">
                            <input style="margin-left: 50px;" type="file" hidden class="form-control" name="cover">
                        </div>
                        <div class="help-info"></div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <p>
                                <b>Mall Status</b>
                            </p>
                            <select name="active" class="form-control show-tick">
                                <option {{ old('active') == 1?'selected':''}} value="1">Active</option>
                                <option {{ old('active') == 0?'selected':''}} value="0">Deactivate</option>
                            </select>
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
<!-- Validation Plugin Js -->
<script src="{{asset('assets/plugins/jquery-validation/jquery.validate.js')}}"></script>
<script src="{{asset('assets/js/pages/forms/form-validation.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
<script>
    $(document).ready(function() {
        $('#opening_hours').summernote({
            height: 500,
        });
    });
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