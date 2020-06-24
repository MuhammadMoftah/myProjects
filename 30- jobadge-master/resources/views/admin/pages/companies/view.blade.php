@extends('admin.master')
@section('styles')
<script src="https://maps.google.com/maps/api/js?key=AIzaSyCr2cKkyIlgLRLQApsDL5g4C-NtkdwVSKU&libraries=places"></script>
@endsection
@section('body')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2 style="margin-bottom: 10px;">
                    company View
                </h2>
            </div>
            <div class="body table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Logo</th>
                            <td>
                                <div class="image">
                                    <img src="{{$company->getCompanyLogo()}}" width="100" height="100" alt="User" />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>Verified</th>
                            <td>
                                @if($company->verified==1)
                                <i class="material-icons">done</i>
                                @else
                                <i class="material-icons">close</i>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>First Name</th>
                            <td>{{$company->first_name}}</td>
                        </tr>
                        <tr>
                            <th>Last NAME</th>
                            <td>{{$company->last_name}}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{$company->email}}</td>
                        </tr>
                        <tr>
                            <th>NAME</th>
                            <td>{{$company->name}}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>{{$company->address}}</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>{{$company->phone}}</td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td>{{$company->description}}</td>
                        </tr>
                        <tr>
                            <th>Twitter</th>
                            <td><a href="{{$company->twitter}}">{{$company->twitter}}</a></td>
                        </tr>
                        <tr>
                            <th>facebook</th>
                            <td><a href="{{$company->facebook}}">{{$company->facebook}}</a></td>
                        </tr>
                        <tr>
                            <th>linked in</th>
                            <td><a href="{{$company->linked_in}}">{{$company->linked_in}}</a></td>
                        </tr>
                        <tr>
                            <th>Company Url</th>
                            <td><a href="{{$company->getUrlAtrribute()}}">{{$company->URL}}</a></td>
                        </tr>
                        <tr>
                            <th>Package</th>
                            @if($company->package_id)
                            <td>{{$company->package->name_en}} - {{$company->package->name_ar}}</td>
                            @else
                            N/A
                            @endif
                        </tr>
                        <tr>
                            <th>Country</th>
                            <td>{{$company->country->name_en}} - {{$company->country->name_ar}}</td>
                        </tr>
                        <tr>
                            <th>City</th>
                            <td>{{$company->city->name_en}} - {{$company->city->name_ar}}</td>
                        </tr>
                        <tr>
                            <th>Industry</th>
                            <td>{{$company->industry->name_en}} - {{$company->industry->name_ar}}</td>
                        </tr>
                        <tr>
                            <th>Size</th>
                            <td>{{$company->size->from}} - {{$company->size->to}}</td>
                        </tr>
                        <tr>
                            <th>subscription</th>
                            <td>
                                @if($company->subscription==1)
                                <i class="material-icons">done</i>
                                @else
                                <i class="material-icons">close</i>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>CR FILE</th>
                            <td>
                                @if($company->cr_logo)
                                <embed src="{{$company->getCompanyCr()}}" type="application/pdf" width="100%" height="600px" />
                                @else
                                No Cr File Uploaded
                                @endif
                            </td>
                        </tr>
                        @if($company->video)
                        <tr>
                            <th>video</th>
                            <td>
                                <video width="320" height="240" controls>
                                    <source src="{{$company->getCompanyVideo()}}" type="video/mp4">
                                </video>
                            </td>
                        </tr>
                        @endif
                        {{--<tr>
                            <th>Location</th>
                            <td>
                                <div id="map" style="height: 300px; width: 100%;"></div>
                            </td>
                        </tr>--}}
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
@section('scripts')
<script>
    // var lat = JSON.parse({{$company->lat}});
    // var lng = JSON.parse({{$company->lng}});
    // var map = new google.maps.Map(document.getElementById('map'), {
    //     center: {
    //         lat: lat,
    //         lng: lng
    //     },
    //     zoom: 15
    // });
    // var marker = new google.maps.Marker({
    //     position: {
    //         lat: lat,
    //         lng: lng
    //     },
    //     map: map,
    // });
</script>
@endsection 