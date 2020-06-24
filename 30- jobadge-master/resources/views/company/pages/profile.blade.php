@extends('master')
@section('styles')
<script src="https://maps.google.com/maps/api/js?key=AIzaSyCr2cKkyIlgLRLQApsDL5g4C-NtkdwVSKU&libraries=places"></script>
@endsection
@section('body')
<!--===== Join Us =====-->
<!--===== Join Us =====-->
<div class="container-blog-posts">
    <section class="comp-profile" id="tabs">
        <div class="container">
            @include('layouts.message')
            <div class="row">
                <div class="col-md-4 part">
                    <div class="profile">
                        <div class="card">
                            <img src="{{$company->getCompanyLogo()}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-center">{{$company->name}}</h5>
                                <p class="card-text text-left p-2">
                                    {{$company->description}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-8 part">
                    <nav>
                        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link {{old('type')!='change_p' && old('type')!='edit_p'?'active':''}} w-25" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><i class="fas fa-info-circle"></i> Info</a>

                            <a class="nav-item nav-link w-25 {{old('type')=='edit_p'?'active':''}}" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="far fa-edit"></i> Edit</a>

                            <a class="nav-item nav-link w-25 {{old('type')=='change_p'?'active':''}}" id="nav-account-tab" data-toggle="tab" href="#nav-account" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="fas fa-cog"></i> Account</a>

                            <a class="nav-item nav-link w-25" id="nav-saved-tab" data-toggle="tab" href="#nav-saved" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="far fa-save"></i> Drafts</a>
                        </div>
                    </nav>

                    <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                        <div class="tab-pane fade {{old('type')!='change_p' && old('type')!='edit_p'?'show active':''}}" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <form action="" class="form-row">
                                <div class="form-group col-md-6">
                                    <label>First name</label>
                                    <input type="name" class="form-control" disabled placeholder="{{$company->first_name}}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Last name</label>
                                    <input type="name" class="form-control" disabled placeholder="{{$company->last_name}}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="exampleInputCompany">Company Name</label>
                                    <input type="name" class="form-control" id="exampleInputCompany" disabled placeholder="{{$company->name}}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="exampleInputCompEmail">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputCompEmail" aria-describedby="emailHelp" placeholder="{{$company->email}}" disabled>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="exampleInputCompCity">City</label>
                                    <input type="name" class="form-control" id="exampleInputCompCity" placeholder="{{$company->city->name_en}}" disabled>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="exampleInputCompCountry">Country</label>
                                    <input type="name" class="form-control" id="exampleInputCompCountry" placeholder="{{$company->country->name_en}}" disabled>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="exampleInputCompPhone">Phone</label>
                                    <input type="name" class="form-control" id="exampleInputCompPhone" placeholder="{{$company->phone}}" disabled>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="exampleInputCompEmp">Employess number</label>
                                    <input type="name" class="form-control" id="exampleInputCompEmp" placeholder="{{$company->size->from}} - {{$company->size->to}}" disabled>
                                </div>
                                @if($company->package_id)
                                <div class="form-group col-md-6">
                                    <label>Pacakge</label>
                                    <input type="name" class="form-control" disabled placeholder="{{$company->package->name_en}}">
                                </div>
                                @endif

                                <div class="form-group col-md-6">
                                    <label>Industry</label>
                                    <input type="name" class="form-control" disabled placeholder="{{$company->industry->name_en}}">
                                </div>

                                @if($company->facebook)
                                <div class="form-group col-md-6">
                                    <label>facebook</label>
                                    <input type="name" class="form-control" disabled placeholder="{{$company->facebook}}">
                                </div>
                                @endif

                                @if($company->twitter)
                                <div class="form-group col-md-6">
                                    <label>twitter</label>
                                    <input type="name" class="form-control" disabled placeholder="{{$company->twitter}}">
                                </div>
                                @endif

                                @if($company->linked_in)
                                <div class="form-group col-md-6">
                                    <label>linkedin</label>
                                    <input type="name" class="form-control" disabled placeholder="{{$company->linked_in}}">
                                </div>
                                @endif

                                <div class="form-group col-md-6">
                                    <label>website URL</label>
                                    <input type="name" class="form-control" disabled placeholder="{{$company->URL}}">
                                </div>

                                {{--<div id="viewmap" style="height: 300px; width: 100%;"></div>--}}

                                @if($company->cr_logo)
                                <div class="form-group col-md-12">
                                    <label>CR File</label>
                                    <embed src="{{$company->getCompanyCr()}}" type="application/pdf" width="100%" height="700px" />
                                </div>
                                @else
                                <p class="text-danger">* please Edit your Profile and Upload Your CR file</p>
                                @endif

                                @if($company->video)
                                <div class="form-group col-md-12">
                                    <label>Video Cv</label>
                                    <video width="100%" height="500" controls>
                                        <source src="{{$company->getCompanyVideo()}}" type="video/mp4">
                                    </video>
                                </div>
                                @endif

                            </form>
                        </div>

                        <div class="tab-pane fade {{old('type')=='edit_p'?'show active':''}}" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <form action="{{route('company.profile.post')}}" method="POST" enctype="multipart/form-data" class="form-row">
                                <input value="edit_p" name="type" type="hidden" />
                                {{ csrf_field() }}

                                <div class="form-group col-md-6">
                                    <label>First Name</label>
                                    <input value="{{$company->first_name}}" type="text" name="first_name" class="form-control {{ $errors->has('first_name') ? 'is-invalid' : ''}}">
                                    {!! $errors->first('first_name', '<div class="invalid-feedback">:message</div>') !!}
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Last Name</label>
                                    <input type="text" value="{{$company->last_name}}" name="last_name" class="form-control {{ $errors->has('last_name') ? 'is-invalid' : ''}}">
                                    {!! $errors->first('last_name', '<div class="invalid-feedback">:message</div>') !!}
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Company Name</label>
                                    <input type="text" value="{{$company->name}}" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}">
                                    {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Email address</label>
                                    <input type="email" value="{{$company->email}}" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}">
                                    {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Phone</label>
                                    <input type="text" name="phone" value="{{$company->phone}}" class="form-control {{ $errors->has('phone') ? 'is-invalid' : ''}}">
                                    {!! $errors->first('phone', '<div class="invalid-feedback">:message</div>') !!}
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="country1">Country</label>
                                    <select id="country1" name="country_id" class="form-control p-0 {{ $errors->has('country_id') ? 'is-invalid' : ''}}">
                                        @foreach($countries as $country)
                                        <option {{$company->country_id==$country->id?'selected':''}} value="{{$country->id}}">{{$country->name_en}}</option>
                                        @endforeach
                                    </select>
                                    {!! $errors->first('country_id', '<div class="invalid-feedback">:message</div>') !!}
                                </div>

                                <div class="form-group col-md-3" id="cities_holder">
                                    <label>City</label>
                                    <select name="city_id" class="form-control p-0 {{ $errors->has('city_id') ? 'is-invalid' : ''}}">
                                        @foreach($cities as $city)
                                        <option {{$company->city_id==$city->id?'selected':''}} value="{{$city->id}}">{{$city->name_en}}</option>
                                        @endforeach
                                    </select>
                                    {!! $errors->first('city_id', '<div class="invalid-feedback">:message</div>') !!}
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="size">Company Size</label>
                                    <select id="size" name="size_id" class="form-control p-0 {{ $errors->has('size_id') ? 'is-invalid' : ''}}">
                                        @foreach($sizes as $size)
                                        <option {{$size->id==$company->size_id?'selected':''}} value="{{$size->id}}">{{$size->from}} - {{$size->to}}</option>
                                        @endforeach
                                    </select>
                                    {!! $errors->first('size_id', '<div class="invalid-feedback">:message</div>') !!}
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="industry">Industry</label>
                                    <select id="industry" name="industry_id" class="form-control p-0 {{ $errors->has('industry_id') ? 'is-invalid' : ''}}">
                                        @foreach($industries as $industry)
                                        <option {{$industry->id==$company->industry_id?'selected':''}} value="{{$industry->id}}">{{$industry->name_en}}</option>
                                        @endforeach
                                    </select>
                                    {!! $errors->first('industry_id', '<div class="invalid-feedback">:message</div>') !!}
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Website</label>
                                    <input value="{{$company->URL}}" type="text" name="url" class="form-control {{ $errors->has('url') ? 'is-invalid' : ''}}">
                                    {!! $errors->first('url', '<div class="invalid-feedback">:message</div>') !!}
                                </div>

                                <div class="form-group col-md-6">
                                    <label>twitter</label>
                                    <input value="{{$company->twitter}}" type="text" name="twitter" class="form-control {{ $errors->has('twitter') ? 'is-invalid' : ''}}">
                                    {!! $errors->first('twitter', '<div class="invalid-feedback">:message</div>') !!}
                                </div>

                                <div class="form-group col-md-6">
                                    <label>facebook</label>
                                    <input value="{{$company->facebook}}" type="text" name="facebook" class="form-control {{ $errors->has('facebook') ? 'is-invalid' : ''}}">
                                    {!! $errors->first('facebook', '<div class="invalid-feedback">:message</div>') !!}
                                </div>

                                <div class="form-group col-md-6">
                                    <label>linked_in</label>
                                    <input value="{{$company->linked_in}}" type="text" name="linked_in" class="form-control {{ $errors->has('linkedin') ? 'is-invalid' : ''}}">
                                    {!! $errors->first('linked_in', '<div class="invalid-feedback">:message</div>') !!}
                                </div>

                                <div class="form-group col-md-9">
                                    <label for="description">Description</label>
                                    <textarea rows="10" value="{{$company->description}}" name="description" class="form-control {{ $errors->has('description') ? 'is-invalid' : ''}}" id="description" placeholder="company description">{{$company->description}}</textarea>
                                    {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
                                </div>

                                <div class="form-group col-md-6"> Upload CR FILE (.pdf) , Max Size: 10 MB
                                    <input type="file" class="custom-file-input {{ $errors->has('cr_logo') ? 'is-invalid' : ''}}" id="compFiles" name="cr_logo">
                                    <label style="width: 90%;top:32px" class="custom-file-label" for="compFiles">CR File .PDF , Max Size: 10 MB</label>
                                    {!! $errors->first('cr_logo', '<div class="invalid-feedback">:message</div>') !!}
                                </div>

                                <div class="form-group col-md-6"> Company Logo (.png,jpg,jpeg, Max Size: 4 MB)
                                    <input type="file" class="custom-file-input {{ $errors->has('logo') ? 'is-invalid' : ''}}" name="logo" id="compLogo">
                                    <label style="width: 90%;top:32px" class="custom-file-label" for="compLogo">Company Logo jpg,png,jpeg ,Max Size: 4 MB</label>
                                    {!! $errors->first('logo', '<div class="invalid-feedback">:message</div>') !!}
                                </div>

                                <div class="form-group col-md-6"> partner's logos (.png,jpg,jpeg, Max Size: 4 MB)
                                    <input type="file" multiple="multiple" class="custom-file-input {{ $errors->has('logos.*') ? 'is-invalid' : ''}}" name="logos[]" id="partners">
                                    <label style="width: 90%;top:32px" class="custom-file-label" for="partners">Company Partners jpg,png,jpeg</label>
                                    {!! $errors->first('logos.*', '<p class="help-block">:message</p>') !!}
                                </div>

                                <div class="form-group col-md-6"> Company Video (.mp4)
                                    <input type="file" class="custom-file-input {{ $errors->has('video') ? 'is-invalid' : ''}}" name="video" id="compVideo">
                                    <label style="width: 90%;top:32px" class="custom-file-label" for="compVideo">Company Video .mp4</label>
                                    {!! $errors->first('video', '<div class="invalid-feedback">:message</div>') !!}
                                </div>

                                <hr style="width: 100%;">
                                <div class="form-group col-md-6">
                                    <label for="address">Address</label>
                                    <input value="{{$company->address}}" type="text" name="address" class="form-control {{ $errors->has('address') && old('type')=='company' ? 'is-invalid' : ''}}" id="address" placeholder="Enter your Company address">
                                    @if(old('type')=='company') {!! $errors->first('address', '<div class="invalid-feedback">:message</div>') !!} @endif
                                </div>
                                {{--<div id="map" style="height: 400px; width: 100%;"></div>--}}

                                {{--<input type="hidden" value="{{$company->lat}}" id="lat" name="lat" />
                                <input type="hidden" value="{{$company->lng}}" id="lng" name="lng" />--}}

                                <div class="custom-control custom-checkbox mb-3 ml-4 col-md-12">
                                    <input type="checkbox" name="subscription" {{$company->subscription==1?'checked':''}} class="custom-control-input" id="subscription">
                                    <label class="custom-control-label" for="subscription">Subscription</label>
                                </div>

                                <div class="form-group col-md-12">
                                    <input type="submit" class="btn btn-info w-25 my-1" value="Save">
                                </div>
                            </form>
                        </div>

                        <div class="tab-pane fade {{old('type')=='change_p'?'show active':''}}" id="nav-account" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <form action="{{route('company.password.change')}}" method="POST" class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Change Your Password</label>
                                    <input value="change_p" name="type" type="hidden" />
                                    {{csrf_field()}}
                                    <input type="password" name="old_password" class="form-control m-1 {{ $errors->has('old_password') ? 'is-invalid' : ''}}" placeholder="Old Password">
                                    {!! $errors->first('old_password', '<div class="invalid-feedback">:message</div>') !!}
                                    <input type="password" name="password" class="form-control m-1 {{ $errors->has('password') ? 'is-invalid' : ''}}" placeholder="New Password">
                                    {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
                                    <input type="password" name="password_confirmation" class="form-control m-1 {{ $errors->has('password') ? 'is-invalid' : ''}}" placeholder="Confirm Password">
                                    {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
                                    <input type="submit" class="form-control btn btn-info m-1" value="Change">
                                </div>

                                <div class="form-group  pt-3 border-top text-center col-md-12">
                                    <a href="{{route('company.deactivate')}}" class="btn btn-danger" id="compDelete"> Deactivate My Company </a>
                                </div>
                            </form>
                        </div>

                        <div class="tab-pane fade" id="nav-saved" role="tabpanel" aria-labelledby="nav-saved-tab">
                            <div class="container-post-jobs p-0">
                                <div class="container">
                                    <div class="post-job-list-view">
                                        @if(count($drafts)>0)
                                        @foreach($drafts as $draft)
                                        <div class="list-view-item">
                                            <div class="row align-items-center no-gutters">
                                                <div class="col-md-6">
                                                    <div class="item-post-job">
                                                        <div class="item-post">
                                                            <h4 class="post-name"><a href="{{route('company.draft.get',$draft->id)}}">{{$draft->title}}</a></h4>
                                                            <span class="post-date">{{$draft->created_at->diffForHumans()}}</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="row no-gutters">
                                                        <div class="col-12 col-md-5">
                                                            <div class="item-position">
                                                                <img src="{{ asset('site/images/icon/location.png')}}" class="mx-1" width="15" alt="">
                                                                <span class="position-text">{{$draft->company->country->name_en}}</span>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 col-md-4">
                                                            <div class="item-time-type">
                                                                <img src="{{ asset('site/images/icon/time.png')}}" class="mx-1" width="18" alt="">
                                                                <span class="type-text">{{$draft->jobtype->name_en}}</span>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 col-md-3 text-sm-center text-md-right">
                                                            <a href="{{route('company.draft.get',$draft->id)}}" class="button-outline"><span>Edit</span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        @else
                                        <p>No Drafts Found</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
@section('scripts')
<script type="text/javascript">

    //  display cr_logo file name after uploading it 
    $('#cr_logo').change(function() {
        var i = $(this).next('label').clone();
        var file = $('#cr_logo')[0].files[0].name;
        $(this).next('label').text(file);
    });
    

    //  display compLogo file name after uploading it 
    $('#compLogo').change(function() {
        var i = $(this).next('label').clone();
        var file = $('#compLogo')[0].files[0].name;
        $(this).next('label').text(file);
    });

    

    //  display compLogo file name after uploading it 
    $('#compVideo').change(function() {
        var i = $(this).next('label').clone();
        var file = $('#compVideo')[0].files[0].name;
        $(this).next('label').text(file);
    });

    


    //  display compLogo file name after uploading it 
    $('#compFiles').change(function() {
        var i = $(this).next('label').clone();
        var file = $('#compFiles')[0].files[0].name;
        $(this).next('label').text(file);
    });

    

    //  display compLogo file name after uploading it 
    $('#partners').change(function() {
        var i = $(this).next('label').clone();
        var names = '';
        var inp =  $('#partners')[0]
        for (var i = 0; i < inp.files.length; ++i) {
            var name = inp.files.item(i).name;
             names += name + ' '
        } 
         $(this).next('label').text(names);
    });

    $('#country1').change(function() {
        var country = $(this).val();
        var url = "{{route('user.countries.cities.get',':country')}}".replace(":country", country);
        $.ajax({
            url: url,
        }).done(function(response) {
            var cities = response.cities;
            var cities_select = '<label for="">Select your city</label><select name="city_id" class="form-control" required> <option disabled selected>*please select your city</option>';
            $.each(cities, function(index, city) {
                cities_select = cities_select + '<option value="' + city.id + '">' + city.name_en + '</option>';
            });
            cities_select = cities_select + '</select>';
            $('#cities_holder').html(cities_select);
        });
    });

    // //view map
    // var lat = JSON.parse({{$company->lat}});
    // var lng = JSON.parse({{$company->lng}});
    // var map = new google.maps.Map(document.getElementById('viewmap'), {
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

    // // edit map
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

    // google.maps.event.addListener(marker, 'position_changed', function() {
    //     var lat = marker.getPosition().lat();
    //     var lng = marker.getPosition().lng();
    //     $('#lat').val(lat);
    //     $('#lng').val(lng);
    // });
</script>
@endsection