@extends('master')
@section('styles')
<script src="https://maps.google.com/maps/api/js?key=AIzaSyCr2cKkyIlgLRLQApsDL5g4C-NtkdwVSKU&libraries=places"></script>
@endsection
@section('body')


<div class="container-blog-posts join-us-header">
    <div class="blog-posts-header">
        <div class="container">
            <h1 class="section-title"><span>Join Us</span></h1>
        </div>
    </div>
</div>

<div class="container-blog-posts">
    <section id="tabs">
        <div class="container">
            @include('layouts.message')
            <div class="row">
                <div class="col-sm-12 ">
                    <nav>
                        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link {{!old('type')=='company' || old('type')=='user' ?'active':''}}" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><i class="fas fa-briefcase"></i> Job Seeker</a>
                            <a class="nav-item nav-link {{old('type')=='company'?'active':''}}" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="fas fa-building"></i> Company</a>
                        </div>
                    </nav>

                    <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                        <div class="tab-pane fade {{!old('type')=='company' || old('type')=='user' ?'show active':''}}" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <form class="form-row" method="POST" action="{{route('user.register.post')}}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" name="type" value="user" />
                                <div class="form-group col-md-6">
                                    <label for="exampleInputName"><span class="text-danger">*</span> First Name</label>
                                    <input value="{{old('first_name')}}" type="text" name="first_name" class="form-control  {{ $errors->has('first_name')&&old('type')=='user' ? 'is-invalid' : ''}}" id="exampleInputName" placeholder="Enter your Firstname">
                                    @if(old('type')=='user') {!! $errors->first('first_name', '<div class="invalid-feedback">:message</div>') !!} @endif
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="exampleInputLastName"><span class="text-danger">*</span> Last Name</label>
                                    <input value="{{old('last_name')}}" type="text" name="last_name" class="form-control  {{ $errors->has('last_name') && old('type')=='user' ? 'is-invalid' : ''}}" id="exampleInputLastName" placeholder="Enter your Lastname">
                                    @if(old('type')=='user') {!! $errors->first('last_name', '<div class="invalid-feedback">:message</div>') !!} @endif
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1"><span class="text-danger">*</span> Email address</label>
                                    <input value="{{old('email')}}" type="email" name="email" class="form-control  {{ $errors->has('email') && old('type')=='user' ? 'is-invalid' : ''}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                    @if(old('type')=='user') {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!} @endif
                                </div>

                                <div class="form-group col-md-6 d-block">
                                    <label for="exampleInputPassword1"><span class="text-danger">*</span> Password</label>
                                    <input name="password" type="password" class="form-control {{ $errors->has('password') && old('type')=='user' ? 'is-invalid' : ''}}" id="exampleInputPassword1" placeholder="Password">
                                    @if(old('type')=='user') {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!} @endif
                                </div>

                                {{-- <div class="form-group col-md-6">
                                    <label for="exampleInputPassword2"><span class="text-danger">*</span> Confirm Password</label>
                                    <input name="password_confirmation" type="password" class="form-control {{ $errors->has('password') && old('type')=='user' ? 'is-invalid' : ''}}" id="exampleInputPassword2" placeholder="Conform Password">
                                    @if(old('type')=='user') {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!} @endif
                                </div> --}}

                                <div class="form-group col-md-6">
                                    <label for="title"><span class="text-danger">*</span> Job Title</label>
                                    <input value="{{old('title')}}" type="text" name="title" class="form-control {{ $errors->has('title') && old('type')=='user' ? 'is-invalid' : ''}}" id="title" placeholder="Enter your title">
                                    @if(old('type')=='user') {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!} @endif
                                </div>

                                {{-- <div class="form-group col-md-3">
                                    <label for="age"><span class="text-danger">*</span> Age</label>
                                    <input value="{{old('age')}}" type="number" name="age" class="form-control {{ $errors->has('age') && old('type')=='user' ? 'is-invalid' : ''}}" id="age" placeholder="Enter your age">
                                    @if(old('type')=='user') {!! $errors->first('age', '<div class="invalid-feedback">:message</div>') !!} @endif
                                </div> --}}

                                {{-- <div class="form-group col-md-3">
                                    <label for="gender"><span class="text-danger">*</span> Gender</label>
                                    <select id="gender" name="gender" class="form-control p-0 {{ $errors->has('gender') && old('type')=='user' ? 'is-invalid' : ''}}">
                                        @if(!old('gender'))
                                        <option disabled selected>Select your Gender</option>
                                        @endif
                                        <option {{old('gender')=='male'?'selected':''}} value="male">Male</option>
                                        <option {{old('gender')=='female'?'selected':''}} value="female">Female</option>
                                    </select>
                                    @if(old('type')=='user') {!! $errors->first('gender', '<div class="invalid-feedback">:message</div>') !!} @endif
                                </div> --}}

                                <div class="form-group col-md-6">
                                    <label for="exampleInputPhone"><span class="text-danger">*</span> Phone</label>
                                    <input value="{{old('phone')}}" type="text" name="phone" class="form-control {{ $errors->has('phone') && old('type')=='user' ? 'is-invalid' : ''}}" id="exampleInputPhone" placeholder="Enter your Phone">
                                    @if(old('type')=='user') {!! $errors->first('phone', '<div class="invalid-feedback">:message</div>') !!} @endif
                                </div>

                                {{-- <div class="form-group col-md-3"> <span class="text-danger">*</span> Upload your Cv (.pdf,.doc)
                                    <input type="file" class="custom-file-input {{ $errors->has('cv') && old('type')=='user' ? 'is-invalid' : ''}}" id="cv" name="cv">

                                    <label style="width: 90%;top:32px" class="custom-file-label" for="cv">Choose file .pdf, .doc</label>
                                    @if(old('type')=='user') {!! $errors->first('cv', '<div class="invalid-feedback">:message</div>') !!} @endif
                                </div> --}}

                                {{-- <div class="form-group col-md-3">
                                    <label for="nationality"><span class="text-danger">*</span> Nationality</label>
                                    <select id="nationality" name="nationality_id" class="form-control p-0 {{ $errors->has('nationality_id') && old('type')=='user' ? 'is-invalid' : ''}}">
                                        <option disabled selected>Select your Nationality</option>
                                        @foreach($nationalities as $nationality)
                                        <option {{old('nationality_id')==$nationality->id && old('type')=='user' ?'selected':''}} value="{{$nationality->id}}">{{$nationality->name_en}}</option>
                                        @endforeach
                                    </select>
                                    @if(old('type')=='user') {!! $errors->first('nationality_id', '<div class="invalid-feedback">:message</div>') !!} @endif
                                </div> --}}

                                <div class="form-group col-md-6">
                                    <label for="country1"><span class="text-danger">*</span> Country</label>
                                    <select id="country1" name="country_id" class="form-control p-0 {{ $errors->has('country_id') && old('type')=='user' ? 'is-invalid' : ''}}">
                                        <option disabled selected>Select your Country</option>
                                        @foreach($countries as $country)
                                        <option value="{{$country->id}}">{{$country->name_en}}</option>
                                        @endforeach
                                    </select>
                                    @if(old('type')=='user') {!! $errors->first('country_id', '<div class="invalid-feedback">:message</div>') !!} @endif
                                </div>

                                <div class="form-group col-md-6" id="cities_holder1">
                                <label for="city1"><span class="text-danger">*</span> City</label>
                                    <select id="cit1" name="city_id" class="form-control p-0 {{ $errors->has('city_id') && old('type')=='user' ? 'is-invalid' : ''}}">
                                        <option disabled selected>Select your City</option>
                                    </select>
                                    @if(old('type')=='user') {!! $errors->first('city_id', '<div class="invalid-feedback">:message</div>') !!} @endif
                                </div>

                                {{-- <div class="form-group col-md-6"> Video Cv (.mp4)
                                    <input type="file" class="custom-file-input {{ $errors->has('video_cv') ? 'is-invalid' : ''}}" name="video_cv" id="video">
                                    <label style="width: 90%;top:32px" class="custom-file-label" for="video">.mp4 Video Cv</label>
                                    {!! $errors->first('video_cv', '<div class="invalid-feedback">:message</div>') !!}
                                </div> --}}

                                <div class="custom-control custom-checkbox mb-3 was-validated ml-4 col-md-12">
                                    <input type="checkbox" name="terms_conditions" class="custom-control-input {{ $errors->has('terms_conditions') && old('type')=='user' ? 'is-invalid' : ''}}" id="customControlValidation1" required="">
                                    <label class="custom-control-label" for="customControlValidation1">I have read <a href="{{route('user.privacy')}}" class="text-primary">Terms &amp; Conditions </a></label>
                                    @if(old('type')=='user') {!! $errors->first('terms_conditions', '<div class="invalid-feedback">:message</div>') !!} @endif
                                </div>
                                <input class="col-md-3 mx-auto button-fill border-0 mt-3" type="submit" value="Join us">
                            </form>
                        </div>

                        <div class="tab-pane fade {{old('type')=='company'?'show active':''}}" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <form method="POST" action="{{route('company.register.post')}}" enctype="multipart/form-data" class="form-row">
                                {{csrf_field()}}
                                <input type="hidden" name="type" value="company" />
                                <div class="form-group col-md-4">
                                    <label for="first_name"><span class="text-danger">*</span> First Name</label>
                                    <input value="{{old('first_name')}}" type="text" name="first_name" class="form-control {{ $errors->has('first_name') && old('type')=='company' ? 'is-invalid' : ''}}" id="first_name" placeholder="Enter Firstname">
                                    @if(old('type')=='company') {!! $errors->first('first_name', '<div class="invalid-feedback">:message</div>') !!} @endif
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="last_name"><span class="text-danger">*</span> Last Name</label>
                                    <input value="{{old('last_name')}}" type="text" name="last_name" class="form-control {{ $errors->has('last_name') && old('type')=='company' ? 'is-invalid' : ''}}" id="last_name" placeholder="Enter Lastname">
                                    @if(old('type')=='company') {!! $errors->first('last_name', '<div class="invalid-feedback">:message</div>') !!} @endif
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="name"><span class="text-danger">*</span> Company Name</label>
                                    <input value="{{old('name')}}" type="text" name="name" class="form-control {{ $errors->has('name') && old('type')=='company' ? 'is-invalid' : ''}}" id="name" placeholder="Enter company name">
                                    @if(old('type')=='company') {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!} @endif
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="exampleInputCompEmail"><span class="text-danger">*</span> Email address</label>
                                    <input value="{{old('email')}}" type="email" name="email" class="form-control {{ $errors->has('email') && old('type')=='company' ? 'is-invalid' : ''}}" id="exampleInputCompEmail" aria-describedby="emailHelp" placeholder="Enter email">
                                    @if(old('type')=='company') {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!} @endif
                                </div>

                                <div class="form-group col-md-4 d-block">
                                    <label for="exampleInputPassword3"><span class="text-danger">*</span> Password</label>
                                    <input name="password" type="password" class="form-control {{ $errors->has('password') && old('type')=='company' ? 'is-invalid' : ''}}" id="exampleInputPassword3" placeholder="Password">
                                    @if(old('type')=='company') {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!} @endif
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="exampleInputPassword4"><span class="text-danger">*</span> Confirm Password</label>
                                    <input name="password_confirmation" type="password" class="form-control {{ $errors->has('password') && old('type')=='company' ? 'is-invalid' : ''}}" id="exampleInputPassword4" placeholder="Conform Password">
                                    @if(old('type')=='company') {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!} @endif
                                </div>

                                <div class="form-group col-md-6"> <span class="text-danger">*</span> Upload Company Logo (.png,jpg,jpeg, Max Size: 4 MB)
                                    <input type="file" name="logo" class="custom-file-input {{ $errors->has('logo') && old('type')=='company' ? 'is-invalid' : ''}}" id="Clogo">
                                    <label style="width: 90%;top:32px" class="custom-file-label" for="Clogo">Choose file</label>
                                    @if(old('type')=='company') {!! $errors->first('logo', '<div class="invalid-feedback">:message</div>') !!} @endif
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="cphone"><span class="text-danger">*</span> Phone</label>
                                    <input value="{{old('phone')}}" type="text" name="phone" class="form-control {{ $errors->has('phone') && old('type')=='company' ? 'is-invalid' : ''}}" id="cphone" placeholder="Enter your Phone">
                                    @if(old('type')=='company') {!! $errors->first('phone', '<div class="invalid-feedback">:message</div>') !!} @endif
                                </div>

                                <div class="form-group col-md-9">
                                    <label for="description"><span class="text-danger">*</span> Description</label>
                                    <textarea rows="10" value="{{old('description')}}" name="description" class="form-control {{ $errors->has('description') && old('type')=='company' ? 'is-invalid' : ''}}" id="description" placeholder="company description">{{old('description')}}</textarea>
                                    @if(old('type')=='company') {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!} @endif
                                </div>

                                <hr style="width: 100%;">

                                <div class="form-group col-md-3">
                                    <label for="size"><span class="text-danger">*</span> Company Size</label>
                                    <select id="size" name="size_id" class="form-control p-0 {{ $errors->has('size_id') && old('type')=='company' ? 'is-invalid' : ''}}">
                                        <option disabled selected>Select your Company size</option>
                                        @foreach($sizes as $size)
                                        <option {{old('size_id')==$size->id && old('type')=='company' ? 'selected':''}} value="{{$size->id}}">{{$size->from}} - {{$size->to}}</option>
                                        @endforeach
                                    </select>
                                    @if(old('type')=='company') {!! $errors->first('size_id', '<div class="invalid-feedback">:message</div>') !!} @endif
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="industry"><span class="text-danger">*</span> Industry</label>
                                    <select id="industry" name="industry_id" class="form-control p-0 {{ $errors->has('industry_id') && old('type')=='company' ? 'is-invalid' : ''}}">
                                        <option disabled selected>Select your Company industry</option>
                                        @foreach($industries as $industry)
                                        <option {{old('industry_id')==$industry->id && old('type')=='company' ? 'selected':''}} value="{{$industry->id}}">{{$industry->name_en}}</option>
                                        @endforeach
                                    </select>
                                    @if(old('type')=='company') {!! $errors->first('industry_id', '<div class="invalid-feedback">:message</div>') !!} @endif
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="country2"><span class="text-danger">*</span> Country</label>
                                    <select id="country2" name="country_id" class="form-control p-0 {{ $errors->has('country_id') && old('type')=='company' ? 'is-invalid' : ''}}">
                                        <option disabled selected>Select your Country</option>
                                        @foreach($countries as $country)
                                        <option value="{{$country->id}}">{{$country->name_en}}</option>
                                        @endforeach
                                    </select>
                                    @if(old('type')=='company') {!! $errors->first('country_id', '<div class="invalid-feedback">:message</div>') !!} @endif
                                </div>

                                <div class="form-group col-md-3" id="cities_holder2">
                                    <label for="city2"><span class="text-danger">*</span> City</label>
                                    <select id="city2" name="city_id" class="form-control p-0 {{ $errors->has('city_id') && old('type')=='company' ? 'is-invalid' : ''}}">
                                        <option disabled selected>Select your City</option>
                                    </select>
                                    @if(old('type')=='company') {!! $errors->first('city_id', '<div class="invalid-feedback">:message</div>') !!} @endif
                                </div>

                                <hr style="width: 100%;">

                                <div class="form-group col-md-3">
                                    <label for="url"><span class="text-danger">*</span> Company URL</label>
                                    <input value="{{old('url')}}" type="text" name="url" class="form-control {{ $errors->has('url') && old('type')=='company' ? 'is-invalid' : ''}}" id="url" placeholder="Enter you Company Url">
                                    @if(old('type')=='company') {!! $errors->first('url', '<div class="invalid-feedback">:message</div>') !!} @endif
                                    <label for="url"><span class="text-danger"></span>( www.example.com )</label>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="twitter">Twitter</label>
                                    <input value="{{old('twitter')}}" type="text" name="twitter" class="form-control {{ $errors->has('twitter') && old('type')=='company' ? 'is-invalid' : ''}}" id="twitter" placeholder="Enter you Company Twitter">
                                    @if(old('type')=='company') {!! $errors->first('twitter', '<div class="invalid-feedback">:message</div>') !!} @endif
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="facebook">Facebook</label>
                                    <input value="{{old('facebook')}}" type="text" name="facebook" class="form-control {{ $errors->has('facebook') && old('type')=='company' ? 'is-invalid' : ''}}" id="facebook" placeholder="Enter you Company Facebook">
                                    @if(old('type')=='company') {!! $errors->first('facebook', '<div class="invalid-feedback">:message</div>') !!} @endif
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="linked_in">Linkedin</label>
                                    <input value="{{old('linked_in')}}" type="text" name="linked_in" class="form-control {{ $errors->has('linked_in') && old('type')=='company' ? 'is-invalid' : ''}}" id="linked_in" placeholder="Enter you Company linkedin">
                                    @if(old('type')=='company') {!! $errors->first('linked_in', '<div class="invalid-feedback">:message</div>') !!} @endif
                                </div>

                                <hr style="width: 100%;">
                                <div class="form-group col-md-6">
                                    <label for="address">Address</label>
                                    <input value="{{old('address')}}" type="text" name="address" class="form-control {{ $errors->has('address') && old('type')=='company' ? 'is-invalid' : ''}}" id="address" placeholder="Enter your Company address">
                                    @if(old('type')=='company') {!! $errors->first('address', '<div class="invalid-feedback">:message</div>') !!} @endif
                                </div>
                                {{--<div id="map" style="height: 400px; width: 100%;"></div>--}}

                                <div class="custom-control custom-checkbox mb-3 was-validated col-md-12">
                                    <input type="checkbox" name="terms_conditions" class="custom-control-input {{ $errors->has('terms_conditions') && old('type')=='company' ? 'is-invalid' : ''}}" id="customControlValidation2" required="">
                                    <label class="custom-control-label" for="customControlValidation2">I have read <a href="{{route('user.privacy')}}"  target="_blank" class="text-primary">Terms &amp; Conditions </a></label>
                                    @if(old('type')=='company') {!! $errors->first('terms_conditions', '<div class="invalid-feedback">:message</div>') !!} @endif
                                </div>

                                {{--<input type="hidden" id="lat" name="lat" />
                                <input type="hidden" id="lng" name="lng" />--}}

                                <input class="col-md-3 mx-auto button-fill border-0 mt-3" type="submit" value="Join us">
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>
@endsection
@section('scripts')
{{--<script src="{{asset('site/js/maps.js')}}"></script>--}}
<script type="text/javascript">
    $('#country1').change(function() {
        var country = $(this).val();
        var url = "{{route('user.countries.cities.get',':country')}}".replace(":country", country);
        $.ajax({
            url: url,
        }).done(function(response) {
            var cities = response.cities;
            var cities_select = '<label for=""><span class="text-danger">*</span> City</label><select name="city_id" class="form-control" required> <option disabled selected><span class="text-danger">*</span>please select your city</option>';
            $.each(cities, function(index, city) {
                cities_select = cities_select + '<option value="' + city.id + '">' + city.name_en + '</option>';
            });
            cities_select = cities_select + '</select>';
            $('#cities_holder1').html(cities_select);
        });
    });

    //  display cv file name after uploading it 
    $('#cv').change(function() {
        var i = $(this).next('label').clone();
        var file = $('#cv')[0].files[0].name;
        $(this).next('label').text(file);
    });

    //  display Clogo file name after uploading it 
    $('#Clogo').change(function() {
        var i = $(this).next('label').clone();
        var file = $('#Clogo')[0].files[0].name;
        $(this).next('label').text(file);
    });

    //  display video file name after uploading it 
    $('#video').change(function() {
        var i = $(this).next('label').clone();
        var file = $('#video')[0].files[0].name;
        $(this).next('label').text(file);
    });





    $('#country2').change(function() {
        var country = $(this).val();
        var url = "{{route('user.countries.cities.get',':country')}}".replace(":country", country);
        $.ajax({
            url: url,
        }).done(function(response) {
            var cities = response.cities;
            var cities_select = '<label for=""><span class="text-danger">*</span> City</label><select name="city_id" class="form-control" required> <option disabled selected><span class="text-danger">*</span>please select your city</option>';
            $.each(cities, function(index, city) {
                cities_select = cities_select + '<option value="' + city.id + '">' + city.name_en + '</option>';
            });
            cities_select = cities_select + '</select>';
            $('#cities_holder2').html(cities_select);
        });
    });
</script>
@endsection