    <!-- ===== Cover =====-->
    <!-- ===== Cover =====-->
    <div class="top-cover pt-5 paddingfornav" style="background-image:url({{$cover_image?$cover_image->getImageUrl():''}})">
        <div class="container">
            @if(app()->getLocale()=='ar')
            <h1 class="text-center text-white h2" style="z-index: 2;position: relative;text-shadow: 1px 1px 4px black;">سكّني أكبر موقع لبيع العقارات في مصر</h1>
            <h2 class=" text-center text-white pb-3 h6" style="z-index: 2;position: relative;text-shadow: 1px 1px 4px black;"> إبحث عن شقق للبيع أو شقق للإيجار في كل محافظات مصر </h2>
            @endif
            <form action="{{ LaravelLocalization::getURLFromRouteNameTranslated( app()->getLocale() , 'routes.ads_search') }}" class="bg-dark p-4 ">
                <div class="row form-group ">
                    <div class="col-xl-2 col-lg-2 col-md-2 form-group">
                        <select class="form-control" name="city_id" id="city">
                            <option value="">{{trans('lang.select city')}}</option>
                            @foreach($cities as $city)
                            <option value="{{$city->id}}">@if(app()->getLocale()=='en') {{$city->name_en}} @else {{$city->name_ar}} @endif</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-xl-2 col-lg-2 col-md-2 form-group">
                        <select class="form-control" name="district_id" id="districts_holder">
                            <option value=""> {{trans('lang.select district')}} </option>
                        </select>
                    </div>

                    <div class="col-xl-8 col-lg-8 col-md-8 form-group">
                        <input autocomplete="off" id="searchmap" type="search" placeholder="{{trans('lang.search_by_city')}}" class="form-control">
                        <!-- <button style="position: absolute;top: 0;right: 15px;" class="btn btn-success px-3"><i class="fas fa-map-marker-alt"></i></button> -->
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-3 form-group">
                        <select class=" form-control" name="offer_type_id">
                            <option value=""> {{trans('lang.property status')}} </option>
                            @foreach($search_data['offer_type_list'] as $type)
                            <option value="{{$type->id}}">@if(app()->getLocale()=='en') {{$type->title_en}} @else {{$type->title_ar}} @endif</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-3 form-group">
                        <select class="form-control" name="property_type_id">
                            <option value=""> {{trans('lang.property type')}} </option>
                            @foreach($search_data['property_type_list'] as $type)
                            <option {{request('property_type_id')==$type->id?'selected':''}} value="{{$type->id}}">@if(app()->getLocale()=='en') {{$type->name_en}} @else {{$type->name_ar}} @endif</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-3 form-group">
                        <select class="form-control" name="min_price">
                            <option value=""> {{trans('lang.min price')}} </option>
                            @for($i=100000;$i<=40000000;$i+=100000) <option {{request('min_price')==$i?'selected':''}} value="{{$i}}">{{number_format($i)}} @if(app()->getLocale()=='en') {{$country->currency_en}} @else {{$country->currency_ar}} @endif </option>
                                @endfor
                        </select>
                    </div>

                    <div class="col-xl-2 col-lg-2 col-md-3 form-group">
                        <select class="form-control" name="max_price">
                            <option value=""> {{trans('lang.max price')}} </option>
                            @for($i=100000;$i<=40000000;$i+=100000) <option {{request('max_price')==$i?'selected':''}} value="{{$i}}">{{number_format($i)}} @if(app()->getLocale()=='en') {{$country->currency_en}} @else {{$country->currency_ar}} @endif </option>
                                @endfor
                        </select>
                    </div>

                    <div class="col-xl-2 col-lg-2 col-md-3 form-group">
                        <select class="form-control" name="min_bedrooms_num">
                            <option value=""> {{trans('lang.min bed')}} </option>
                            <option value="1"> 1 {{trans('lang.rooms')}} </option>
                            <option value="2"> 2 {{trans('lang.rooms')}} </option>
                            <option value="3"> 3 {{trans('lang.rooms')}} </option>
                            <option value="4"> 4 {{trans('lang.rooms')}} </option>
                            <option value="5"> 5 {{trans('lang.rooms')}} </option>
                            <option value="6"> 6 {{trans('lang.rooms')}} </option>
                            <option value="7"> 7 {{trans('lang.rooms')}} </option>
                        </select>
                    </div>

                    <div class="col-xl-2 col-lg-2 col-md-3 form-group">
                        <select class="form-control" name="max_bedrooms_num">
                            <option value=""> {{trans('lang.max bed')}} </option>
                            <option value="1"> 1 {{trans('lang.rooms')}} </option>
                            <option value="2"> 2 {{trans('lang.rooms')}} </option>
                            <option value="3"> 3 {{trans('lang.rooms')}} </option>
                            <option value="4"> 4 {{trans('lang.rooms')}} </option>
                            <option value="5"> 5 {{trans('lang.rooms')}} </option>
                            <option value="6"> 6 {{trans('lang.rooms')}} </option>
                            <option value="7"> 7 {{trans('lang.rooms')}} </option>
                        </select>
                    </div>

                    <div class="col-xl-2 col-lg-2 col-md-3 form-group">
                        <select class="form-control" name="min_size">
                            <option value=""> {{trans('lang.min area')}} </option>
                            @for($i=50;$i<=5000;$i+=200) <option {{request('min_size')==$i?'selected':''}} value="{{$i}}">{{number_format($i)}} {{trans('lang.m2')}}</option>
                                @endfor
                        </select>
                    </div>

                    <div class="col-xl-2 col-lg-2 col-md-3 form-group">
                        <select class="form-control" name="max_size">
                            <option value=""> {{trans('lang.max area')}} </option>
                            @for($i=50;$i<=5000;$i+=200) <option {{request('max_size')==$i?'selected':''}} value="{{$i}}">{{number_format($i)}} {{trans('lang.m2')}}</option>
                                @endfor
                        </select>
                    </div>
                    
                    <input name="lat" type="hidden" id="lat">
                    <input name="lng" type="hidden" id="lng">

                    <div class="col-xl-4 col-lg-4 col-md-4 form-group">
                        <input value="{{request('search')}}" name="search" type="text" placeholder="{{trans('lang.keywords')}}" class="form-control">
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-4">
                        <input type="submit" value="{{trans('lang.search')}}" class="btn btn-danger w-100">
                    </div>

                </div>
            </form>
        </div>
    </div>
    <!--===== Google Maps =====-->
    <!--===== Google Maps =====-->
    <div class="row mx-0">
        <div class="col-md-3 text-center">

        </div>
        @if(Route::currentRouteName()!='user.index')
        <div class="col-md-6">
            <div id="map" style="width: 100%;height: 500px"></div>
        </div>
        @endif
        <div class="col-md-3 text-center">

        </div>
    </div>

    @section('scripts')
    <script src="{{url('site')}}/js/myads.js"></script>
    <!-- <script type="text/javascript" src="{{url('site')}}/js/search.js"></script> -->
    <script type="text/javascript">
        $('#city').change(function() {
            var city = $(this).val();
            var lang = "{{app()->getLocale()}}"
            var url = "{{route('city.districts',['city_id'=>':city','lang'=>':lang'])}}".replace(":city", city).replace(':lang', lang);
            $.ajax({
                url: url,
            }).done(function(response) {
                $('#districts_holder').html(response);
            });
        });

        <?php
        if (isset($ads)) {
        ?>
            var locations = <?php print_r(json_encode($ads)) ?>;
        <?php
        } else {
        ?>
            var locations = [];
        <?php }
        ?>

        <?php
        if (isset($projects)) {
        ?>
            var projects = <?php print_r(json_encode($projects)) ?>;
        <?php
        } else {
        ?>
            var projects = [];
        <?php }
        ?>
        @if(Route::currentRouteName() != 'user.index')
        var image = 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png';
        var lastWindow = null;
        locations["data"] ? locations = locations['data'] : locations = locations;
        if (locations.length > 0 || projects.length > 0) {
            navigator.geolocation.getCurrentPosition(function(position) {

                // set my position and search box
                var map = new google.maps.Map(document.getElementById('map'), {
                    center: {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude,
                    },
                    zoom: 10
                });
                var marker = new google.maps.Marker({
                    position: {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude,
                    },
                    map: map,
                    draggable: true,
                    icon: image,
                    title: 'my position',
                });

                var searchBox = new google.maps.places.SearchBox(document.getElementById('searchmap'));

                google.maps.event.addListener(searchBox, 'places_changed', function() {
                    var places = searchBox.getPlaces();
                    var bounds = new google.maps.LatLngBounds();
                    var i, place;
                    for (i = 0; place = places[i]; i++) {
                        bounds.extend(place.geometry.location);
                        marker.setPosition(place.geometry.location);
                    }
                    map.fitBounds(bounds);
                    map.setZoom(10);
                });

                google.maps.event.addListener(marker, 'position_changed', function() {
                    var lat = marker.getPosition().lat();
                    var lng = marker.getPosition().lng();
                    $('#lat').val(lat);
                    $('#lng').val(lng);
                });

                // set projects locations
                $.each(projects, function(index, value) {
                    var marker = new google.maps.Marker({
                        position: {
                            lat: JSON.parse(value['latitude']),
                            lng: JSON.parse(value['longitude'])
                        },
                        map: map,
                        title: value['title'],
                        icon: "https://maps.google.com/mapfiles/ms/icons/blue-dot.png",
                    });
                    var description = '<h2>' + value['description_en'] + '<br></h2><hr>';
                    var lang = "{{app()->getLocale()}}"
                    var url = "{{route('user.project.get',['id'=>':id','project_title'=>':project_title','lang'=>':lang'])}}".replace(":id", value['id']).replace(":project_title", value['title_en']).replace(":lang", lang);

                    var infowindow = new google.maps.InfoWindow({
                        content: '<div id="content">' +
                            '<div id="siteNotice">' +
                            '</div>' +
                            '<a target="_blank" style="color:black;" href="' + url + '"><h1 id="firstHeading">' + value['title_en'] + '</h1></a>' +
                            '<div id="bodyContent">' + description + '</div>'
                    });
                    marker.addListener('click', function() {
                        if (lastWindow) lastWindow.close();
                        infowindow.open(map, marker);
                        lastWindow = infowindow;
                    });
                });
            });
        } else {
            var map = '';
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var map = new google.maps.Map(document.getElementById('map'), {
                        center: {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude,
                        },
                        zoom: 10
                    });

                    var marker = new google.maps.Marker({
                        position: {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude,
                        },
                        map: map,
                        draggable: true,
                        icon: image,
                        title: 'my position',
                    });

                    var searchBox = new google.maps.places.SearchBox(document.getElementById('searchmap'));
                    google.maps.event.addListener(searchBox, 'places_changed', function() {
                        var places = searchBox.getPlaces();
                        var bounds = new google.maps.LatLngBounds();
                        var i, place;
                        for (i = 0; place = places[i]; i++) {
                            bounds.extend(place.geometry.location);
                            marker.setPosition(place.geometry.location);
                        }
                        map.fitBounds(bounds);
                        map.setZoom(10);
                    });

                    google.maps.event.addListener(marker, 'position_changed', function() {
                        var lat = marker.getPosition().lat();
                        var lng = marker.getPosition().lng();
                        $('#lat').val(lat);
                        $('#lng').val(lng);
                    });
                });
            }
        }
        @endif
    </script>
    @endsection