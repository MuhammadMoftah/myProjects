@extends('admin.master')
@section('styles')
<link href="{{asset('assets/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
<script src="https://maps.google.com/maps/api/js?key=AIzaSyCr2cKkyIlgLRLQApsDL5g4C-NtkdwVSKU&libraries=places"></script>
@endsection
@section('body')
<!-- Horizontal Layout -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Edit Company
                </h2>
            </div>
            <div class="body">
                @include('admin.layouts.errors')
                <form id="form_advanced_validation" enctype="multipart/form-data" method="POST" action="{{route('admin.companies.edit.post',$company->id)}}">
                    {{ csrf_field() }}
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" value="{{$company->first_name}}" class="form-control" name="first_name" maxlenght="200" required>
                            <label class="form-label">* First Name</label>
                        </div>
                        <div class="help-info">Max. Char: 200</div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" value="{{$company->last_name}}" class="form-control" name="last_name" maxlenght="200" required>
                            <label class="form-label">* Last Name</label>
                        </div>
                        <div class="help-info">Max. Char: 200</div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="email" value="{{$company->email}}" class="form-control" name="email" maxlenght="254" required>
                            <label class="form-label">* Email</label>
                        </div>
                        <div class="help-info">Max. Char: 200</div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" value="{{$company->name}}" class="form-control" name="name" maxlenght="200" required>
                            <label class="form-label">* Name</label>
                        </div>
                        <div class="help-info">Max. Char: 200</div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" value="{{$company->facebook}}" class="form-control" name="facebook" maxlenght="200">
                            <label class="form-label">* Facebook</label>
                        </div>
                        <div class="help-info">eg.https://www.example.com</div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" value="{{$company->twitter}}" class="form-control" name="twitter" maxlenght="200">
                            <label class="form-label">* Twitter</label>
                        </div>
                        <div class="help-info">eg.https://www.example.com</div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" value="{{$company->linked_in}}" class="form-control" name="linked_in" maxlenght="200">
                            <label class="form-label">* linked_in</label>
                        </div>
                        <div class="help-info">eg.https://www.example.com</div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" value="{{$company->URL}}" class="form-control" name="url" maxlenght="200" required>
                            <label class="form-label">* Company URL</label>
                        </div>
                        <div class="help-info">eg.https://www.example.com</div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input value="{{$company->phone}}" class="form-control" name="phone" maxlenght="11" required>
                            <label class="form-label">* Phone</label>
                        </div>
                        <div class="help-info"></div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" minlength="8" maxlength="254">
                            <label class="form-label">Password</label>
                        </div>
                        <div class="help-info">Min. 8 , Max. 254 characters</div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="password" class="form-control" name="password_confirmation" minlength="8" maxlength="254">
                            <label class="form-label">Password Confirmation</label>
                        </div>
                        <div class="help-info"></div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <textarea name="description" value="{{$company->description}}" cols="30" rows="5" class="form-control no-resize" required>{{$company->description}}</textarea>
                            <label class="form-label">* Description</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <p>
                                <b>* size</b>
                            </p>
                            <select name="size_id" class="form-control show-tick" data-live-search="true" required>
                                @foreach($sizes as $size)
                                <option {{$size->id==$company->size_id?'selected':''}} value="{{$size->id}}">{{$size->from}} - {{$size->to}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <p>
                                <b>* industry</b>
                            </p>
                            <select name="industry_id" class="form-control show-tick" data-live-search="true" required>
                                @foreach($industries as $industry)
                                <option {{$industry->id==$company->industry_id ?'selected':''}} value="{{$industry->id}}">{{$industry->name_en}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <p>
                                <b>* package</b>
                            </p>
                            <select name="package_id" class="form-control show-tick" data-live-search="true">
                                @foreach($packages as $package)
                                <option {{$package->id==$company->size_id?'selected':''}} value="{{$package->id}}">{{$package->name_en}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <p>
                                <b>* country</b>
                            </p>
                            <select id="country" name="country_id" class="form-control show-tick" data-live-search="true" required>
                                @foreach($countries as $country)
                                <option {{$country->id==$company->country_id?'selected':''}} value="{{$country->id}}">{{$country->name_en}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group form-float" id="cities_holder">
                        <div class="form-line">
                            <p>
                                <b>* city</b>
                            </p>
                            <select name="city_id" class="form-control show-tick" data-live-search="true" required>
                                @foreach($cities as $city)
                                <option {{$city->id==$company->city_id?'selected':''}} value="{{$city->id}}">{{$city->name_en}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group form-float" style="width:90%">
                        <div class="form-line">
                            <input style="margin-left: 50px;" type="file" hidden class="form-control" name="cr_logo">
                            <label class="form-label">* CR File</label>
                        </div>
                        <div class="help-info">.pdf</div>
                    </div>
                    <div class="form-group form-float" style="width:90%">
                        <div class="form-line">
                            <input style="margin-left: 50px;" type="file" hidden class="form-control" name="logo">
                            <label class="form-label">* LOGO</label>
                        </div>
                        <div class="help-info">jpg,png,jpeg</div>
                    </div>
                    <div class="form-group form-float" style="width:90%">
                        <div class="form-line">
                            <input style="margin-left: 50px;" type="file" class="form-control" name="video">
                            <label class="form-label">Video</label>
                        </div>
                        <div class="help-info">.mp4,mov</div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" value="{{$company->address}}" class="form-control" name="address" maxlenght="400">
                            <label class="form-label">Address</label>
                        </div>
                        <div class="help-info">Max. Char: 400</div>
                    </div>
                    <div class="form-group">
                        <input {{$company->verified==1?'checked':''}} type="checkbox" id="verified" name="verified">
                        <label for="verified">Verified</label>
                    </div>
                    <div class="form-group">
                        <input {{$company->subscription==1?'checked':''}} type="checkbox" id="subscription" name="subscription">
                        <label for="subscription">Subscription to get All news</label>
                    </div>
                    {{--<div id="map" style="height: 400px; width: 100%;"></div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <p>
                                <b>* latitude</b>
                            </p>
                            <input type="text" id="lat" value="{{$company->lat}}" class="form-control" name="lat" required>
                            <label class="form-label"></label>
                        </div>
                        <div class="help-info"></div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <p>
                                <b>* longitude</b>
                            </p>
                            <input id="lng" type="text" value="{{$company->lng}}" class="form-control" name="lng" required>
                            <label class="form-label"></label>
                        </div>
                        <div class="help-info"></div>
                    </div>--}}
                    <button class="btn btn-primary waves-effect" type="submit">Edit</button>
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
<script type="text/javascript">
    $('#country').change(function() {
        var country = $(this).val();
        var url = "{{route('admin.countries.cities.get',':country')}}".replace(":country", country);
        $.ajax({
            url: url,
        }).done(function(response) {
            var cities = response.cities;
            var cities_select = '<div class="form-line"> <select name="city_id" class="form-control show-tick" data-live-search="true" required> <option disabled selected>*please select your city</option>';
            $.each(cities, function(index, city) {
                cities_select = cities_select + '<option value="' + city.id + '">' + city.name_en + '</option>';
            });
            cities_select = cities_select + '</select></div>';
            $('#cities_holder').html(cities_select);
        });
    });
</script>
<script>
    // var map = new google.maps.Map(document.getElementById('map'), {
    //     center: {
    //         lat: JSON.parse($('#lat').val()),
    //         lng: JSON.parse($('#lng').val())
    //     },
    //     zoom: 15
    // });
    // var marker = new google.maps.Marker({
    //     position: {
    //         lat: JSON.parse($('#lat').val()),
    //         lng: JSON.parse($('#lng').val())
    //     },
    //     map: map,
    //     draggable: true
    // });

    // var searchBox = new google.maps.places.SearchBox(document.getElementById('searchmap'));
    // google.maps.event.addListener(searchBox, 'places_changed', function() {
    //     var places = searchBox.getPlaces();
    //     var bounds = new google.maps.LatLngBounds();
    //     var i, place;
    //     for (i = 0; place = places[i]; i++) {
    //         bounds.extend(place.geometry.location);
    //         marker.setPosition(place.geometry.location); //set marker position new...
    //     }
    //     map.fitBounds(bounds);
    //     map.setZoom(15);
    // });

    // google.maps.event.addListener(marker, 'position_changed', function() {
    //     var lat = marker.getPosition().lat();
    //     var lng = marker.getPosition().lng();
    //     $('#lat').val(lat);
    //     $('#lng').val(lng);
    // });
</script>
@endsection 