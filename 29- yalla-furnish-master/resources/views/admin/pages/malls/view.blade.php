@extends('admin.master')
@section('styles')
<script type="text/javascript" src='https://maps.google.com/maps/api/js?sensor=false&libraries=places&key=AIzaSyCiSj64wEyRti_DeuBJQRkOVSO7M3cJtRY'></script>
@endsection
@section('body')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2 style="margin-bottom: 10px;">
                    Mall View
                </h2>
            </div>
            <div class="body table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <td>{{$mall->name}}</td>
                        </tr>
                        <tr>
                            <th>Location</th>
                            <td>{{$mall->location}}</td>
                        </tr>
                        <tr>
                            <td></td>
                        <td>
                            <div class="maps" id="map" style="height:200px; width:500px;"></div>
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
                        </td>
                        </tr>
                        <tr>
                            <th>Facebook</th>
                            <td><a href="{{$mall->facebook}}">{{$mall->facebook}}</a></td>
                        </tr>
                        <tr>
                            <th>Twitter</th>
                            <td><a href="{{$mall->twitter}}">{{$mall->twitter}}</a></td>
                        </tr>
                        <tr>
                            <th>Instagram</th>
                            <td><a href="{{$mall->instagram}}">{{$mall->instagram}}</a></td>
                        </tr>
                        <tr>
                            <th>Opening Hours</th>
                            <td>{!! $mall->opening_hours !!}</td>
                        </tr>
                        <tr>
                            <th>About</th>
                            <td>{{$mall->about}}</td>
                        </tr>
                        <tr>
                            <th>Mall Image</th>
                            <td>
                                <img src="{{$mall->image}}" height="200" width="200" />
                            </td>
                        </tr>
                        <tr>
                            <th>Mall Cover</th>
                            <td>
                                <img src="{{$mall->cover}}" height="200" width="200" />
                            </td>
                        </tr>
                        <tr>
                            <th>Showrooms</th>
                            <td>
                                @foreach($mall->showrooms as $showroom)
                                  <a href="{{route('user.get.singleShowroom',['slug' => $showroom->slug ])}}">{{$showroom->name_en}}</a> @if(!$loop->last)|@endif          
                                @endforeach
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- #END# Bordered Table -->
@endsection