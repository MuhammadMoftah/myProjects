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
                    Edit Mall
                </h2>
            </div>
            <div class="body">
                @include('admin.layouts.errors')
                @include('admin.layouts.message')
                <form id="form_advanced_validation" enctype="multipart/form-data" method="POST" action="{{route('admin.malls.edit.post',$mall->id)}}">
                    {{ csrf_field() }}
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input id="name_en" type="text" value="{{$mall->name}}" class="form-control" name="name" maxlenght="200" required>
                            <label class="form-label">* Name</label>
                        </div>
                        <div class="help-info">Max. Char: 200</div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input id="location" type="text" value="{{$mall->location}}" class="form-control" name="location" maxlenght="500">
                            <label class="form-label">Location</label>
                        </div>
                    </div>
                    <div class="form-group d-flex justify-content-between">
                        <input type="text" class="form-control" id="search_on_map" placeholder="search in map...">
                    </div>

                    <div class="form-group d-flex justify-content-between">
                        <div id="map" style="width: 100%;height: 500px"></div>
                    </div>
                    <input type="hidden" id="lat" value="{{$mall->lat}}" name="lat"/>
                    <input type="hidden" id="lng" value="{{$mall->lng}}" name="lng"/>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input id="facebook" type="text" value="{{$mall->facebook}}" class="form-control" name="facebook" maxlenght="500">
                            <label class="form-label">Facebook</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input id="twitter" type="text" value="{{$mall->twitter}}" class="form-control" name="twitter" maxlenght="500">
                            <label class="form-label">Twitter</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input id="instagram" type="text" value="{{$mall->instagram}}" class="form-control" name="instagram" maxlenght="500">
                            <label class="form-label">Instagram</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <label class="form-label">Opening Hours</label>
                        <div class="form-line">
                            <textarea id="opening_hours" name="opening_hours" value="{{$mall->opening_hours}}" cols="30" rows="5" class="form-control no-resize" required>{{$mall->opening_hours}}</textarea>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <label class="form-label">About</label>
                        <div class="form-line">
                            <textarea cols="10" rows="10" id="about" name="about" value="{{$mall->about}}" cols="30" rows="5" class="form-control no-resize" required>{{$mall->about}}</textarea>
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
                                <option {{ $mall->active == 1?'selected':''}} value="1">Active</option>
                                <option {{ $mall->active == 0?'selected':''}} value="0">Deactivate</option>
                            </select>
                        </div>
                    </div>
                    <button class="btn btn-primary waves-effect" type="submit">Save</button>
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
<script>
    $('form').bind('change keyup', function() {
        $('.submmit').prop('disabled', false); // update button
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
<script>
    $(document).ready(function() {
        $('#opening_hours').summernote({
            height: 500,
        });
    });
</script>
<script>
    var map = new google.maps.Map(document.getElementById('map'), {
        center: {
            lat: JSON.parse($('#lat').val()),
            lng: JSON.parse($('#lng').val()),
        },
        zoom: 15
    });
    var marker = new google.maps.Marker({
        position: {
            lat: JSON.parse($('#lat').val()),
            lng: JSON.parse($('#lng').val()),
        },
        map: map,
        draggable: true
    });

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
</script>
@endsection