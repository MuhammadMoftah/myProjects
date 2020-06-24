@extends('master')
@section('styles')
<!-- Bootstrap Material Datetime Picker Css -->
<link href="{{asset('assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}" rel="stylesheet" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

@endsection
@section('body')
@if(session()->has("comeRegister")  == false) 

<div class="container text-center">
    <hr>
    <div class="alert alert-info">
        <h4 class="alert-title">Complete Basic Information </h4>
    </div>
    <hr>
</div>
@endif
<!--===== Join Us =====-->
<!--===== Join Us =====-->
<div class="container-blog-posts">
    <section class="comp-profile" id="tabs">
        <div class="container">
            @include('layouts.message')
            <div class="row">
                <div id="fb-root"></div>
                <div class="col-md-4 part">
                    <div class="profile">
                        <div class="card">
                            <img src="{{$user->getUserImage()}}" class="card-img-top" alt="{{$user->first_name}}">
                            <div class="card-body text-center">
                                @if($user->image != "user.png")
                                <form method="POST" action="{{ route('user.delete.picture') }} ">
                                        @csrf
                                        <button class="btn btn-danger confirm" data-message="Are You Sure ? To Delete The Picture ">Delete image</button>
                                    </form>
                                @endif
                                <h5 class="card-title text-center">{{$user->first_name}} {{$user->last_name}}</h5>
                                <h6 class="text-center text-info">{{$user->title}}</h6>
                                {{-- <br> --}}
                                {{-- <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: {{$user->getUserRate()}}%;" aria-valuenow="{{$user->getUserRate()}}" aria-valuemin="0" aria-valuemax="100">{{$user->getUserRate()}}%</div>



                                </div> --}}

                                <div class="progress mt-3" style="width: 180px; height: 13px;margin: auto;">
                                    <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width: {{$user->getUserRate()}}%;" aria-valuenow="{{$user->getUserRate()}}" aria-valuemin="0" aria-valuemax="100">{{$user->getUserRate()}}%</div>
                                </div>
                            <a class="text-success" href="{{  route('user.profile.manage' ) }}"> Complete Your Profile</a>
                                <br>

                                <h5 class="card-title text-center mt-3">Share My Profile</h5>
                                <div class=" social-login pb-5">
                                    <a class="facebook" href="{{route('user.profile.share','facebook')}}">
                                        <fa name="facebook"><i aria-hidden="true" class="fab fa-facebook-f"></i></fa>
                                    </a>
                                    <a class="twitter" href="{{route('user.profile.share','twitter')}}">
                                        <fa name="twitter"><i aria-hidden="true" class="fab fa-twitter"></i></fa>
                                    </a>
                                    <a class="linked" href="{{route('user.profile.share','linkedin')}}">
                                        <fa name="linkedin"><i aria-hidden="true" class="fab fa-linkedin-in"></i></fa>
                                    </a>
                                    <a class="linked" href="{{route('user.profile.share','tumblr')}}">
                                        <fa name="tumblr"><i aria-hidden="true" class="fab fa-tumblr"></i></fa>
                                    </a>
                                </div>
                                <h5 class="card-title text-center">Invite Friends</h5>
                                <div class=" social-login pb-5">
                                    <a class="facebook" onclick="newInvite()">
                                        <fa name="facebook"><i aria-hidden="true" class="fab fa-facebook-messenger"></i></fa>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-8 part">
                    <nav>
                        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link w-25 {{old('type')!='change_p' && old('type')!='edit_p'?'active':''}}" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><i class="fas fa-info-circle"></i> Info</a>

                            <a class="nav-item nav-link w-25 @if(old('type')=='edit_p' || session()->has("comeRegister")) active @endif" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="far fa-edit"></i> Edit</a>
                            @if(!$user->IfSocialUser())
                            <a class="nav-item nav-link w-25 {{old('type')=='change_p'?'active':''}}" id="nav-account-tab" data-toggle="tab" href="#nav-account" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="fas fa-cog"></i> Account</a>
                            @endif
                        </div>
                    </nav>

                    <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                        <div class="tab-pane fade {{old('type')!='change_p' && old('type')!='edit_p'?'show active':''}}" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <form action="" class="form-row">
                                <div class="form-group col-md-6">
                                    <label>First name</label>
                                    <input type="text" class="form-control" disabled placeholder="{{$user->first_name}}">
                                </div>
                                @if($user->last_name)
                                <div class="form-group col-md-6">
                                    <label>Last name</label>
                                    <input type="email" class="form-control" placeholder="{{$user->last_name}}" disabled>
                                </div>
                                @endif

                                <div class="form-group col-md-6">
                                    <label>Email</label>
                                    <input type="email" class="form-control" placeholder="{{$user->email}}" disabled>
                                </div>

                                @if($user->title)
                                <div class="form-group col-md-6">
                                    <label for="exampleInputCompEmail">Job Title</label>
                                    <input type="email" class="form-control" placeholder="{{$user->title}}" disabled>
                                </div>
                                @endif

                                @if($user->nationality_id)
                                <div class="form-group col-md-6">
                                    <label>Nationality</label>
                                    <input type="text" class="form-control" placeholder="{{$user->nationality->name_en}}" disabled>
                                </div>
                                @endif

                                @if($user->country_id)
                                <div class="form-group col-md-6">
                                    <label>Country</label>
                                    <input type="text" class="form-control" placeholder="{{$user->country->name_en}}" disabled>
                                </div>
                                @endif

                                @if($user->city_id)
                                <div class="form-group col-md-6">
                                    <label>City</label>
                                    <input type="text" class="form-control" placeholder="{{$user->city->name_en}}" disabled>
                                </div>
                                @endif

                                @if($user->phone)
                                <div class="form-group col-md-6">
                                    <label>Phone</label>
                                    <input type="text" class="form-control" placeholder="{{$user->phone}}" disabled>
                                </div>
                                @endif

                                @if($user->gender)
                                <div class="form-group col-md-6">
                                    <label>Gender</label>
                                    <input type="text" class="form-control" placeholder="{{$user->gender}}" disabled>
                                </div>
                                @endif

                                @if($user->age)
                                <div class="form-group col-md-6">
                                    <label>age</label>
                                    <input type="text" class="form-control" placeholder="{{$user->age}}" disabled >
                                </div>
                                @endif

                                @if($user->cv)
                                <div class="form-group col-md-12">
                                    <label>CV</label>
                                    <embed src="{{$user->getUserCv()}}" type="application/pdf" width="100%" height="700px" />
                                </div>
                                @else
                                <p class="text-danger">* please Edit your Profile and Upload Your Cv to complete Your profile</p>
                                @endif

                                @if($user->video_cv)
                                <div class="form-group col-md-12">
                                    <label>Video Cv</label>
                                    <video width="100%" height="500" controls>
                                        <source src="{{$user->getVideoCv()}}" type="video/mp4">
                                    </video>
                                </div>
                                    <button class="btn btn-danger confirm deleted-cv"  data-message="Are You Sure ? To Delete The Vedio Cv ">Deleted</button>
                                @endif
                            </form>
                        </div>

                        <form method="POST"  id="deleted-cv" style="display: none" action="{{ route('user.delete.vedio') }} ">
                            @csrf

                        </form>
                        <div class="tab-pane fade @if(old('type')=='edit_p' || session()->has("comeRegister") ) show active @endif" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <form action="{{route('user.profile.post')}}" method="POST" class="form-row" enctype="multipart/form-data">
                                <input value="edit_p" name="type" type="hidden"/>
                                {{ csrf_field() }}
                                <div class="form-group col-md-6">
                                    <label for="firstname">* First Name</label>
                                    <input value="{{$user->first_name}}" type="text" name="first_name" class="form-control {{ $errors->has('first_name') ? 'is-invalid' : ''}}" id="firstname" placeholder="First name">
                                    {!! $errors->first('first_name', '<div class="invalid-feedback">:message</div>') !!}
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="lastname">* Last name</label>
                                    <input value="{{$user->last_name}}" type="text" name="last_name" class="form-control {{ $errors->has('last_name') ? 'is-invalid' : ''}}" id="lastname" placeholder="Last name">
                                    {!! $errors->first('last_name', '<div class="invalid-feedback">:message</div>') !!}
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="email">* Email address</label>
                                    <input value="{{$user->email}}" type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}" id="email" aria-describedby="emailHelp" placeholder="Email address">
                                    {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="phone">* Phone</label>
                                    <input value="{{$user->phone}}" type="text" name="phone" class="form-control {{ $errors->has('phone') ? 'is-invalid' : ''}}" id="phone" placeholder="Phone">
                                    {!! $errors->first('phone', '<div class="invalid-feedback">:message</div>') !!}
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="nationality">* Nationality</label>
                                    <select id="nationality" name="nationality_id" class="form-control p-0 {{ $errors->has('nationality_id') ? 'is-invalid' : ''}}">
                                        @if(!$user->nationality_id)
                                        <option disabled selected>please select your nationality</option>
                                        @endif
                                        @foreach($nationalities as $nationality)
                                        <option {{$user->nationality_id==$nationality->id || old('nationality_id')==$nationality->id?'selected':''}} value="{{$nationality->id}}">{{$nationality->name_en}}</option>
                                        @endforeach
                                    </select>
                                    {!! $errors->first('nationality_id', '<div class="invalid-feedback">:message</div>') !!}
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="country1">* Country</label>
                                    <select id="country1" name="country_id" class="form-control p-0 {{ $errors->has('country_id') ? 'is-invalid' : ''}}">
                                        @if(!$user->country_id)
                                        <option disabled selected>please select your country</option>
                                        @endif
                                        @foreach($countries as $country)
                                        <option {{$user->country_id==$country->id?'selected':''}} value="{{$country->id}}">{{$country->name_en}}</option>
                                        @endforeach
                                    </select>
                                    {!! $errors->first('country_id', '<div class="invalid-feedback">:message</div>') !!}
                                </div>

                                <div class="form-group col-md-6" id="cities_holder">
                                    <label>* City</label>
                                    <select name="city_id" class="form-control p-0 {{ $errors->has('city_id') ? 'is-invalid' : ''}}">
                                        @if(!$user->city_id)
                                        <option disabled selected>please select your city</option>
                                        @endif
                                        @foreach($cities as $city)
                                        <option {{$user->city_id==$city->id?'selected':''}} value="{{$city->id}}">{{$city->name_en}}</option>
                                        @endforeach
                                    </select>
                                    {!! $errors->first('city_id', '<div class="invalid-feedback">:message</div>') !!}
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="title">* Job Title</label>
                                    <input value="{{$user->title}}" type="text" name="title" class="form-control {{ $errors->has('title') ? 'is-invalid' : ''}}" id="title" placeholder="Title">
                                    {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="age">* Birth Date</label>
                                    <input value="{{$user->birth_date?:old('birth_date')}}" type="text" name="birth_date" class="form-control  {{ $errors->has('birth_date') ? 'is-invalid' : ''}}" id="Birth_Date" placeholder="Birth Date" data-language='en' data-format="y-m-d">
                                    {!! $errors->first('birth_date', '<div class="invalid-feedback">:message</div>') !!}
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="gender">* Gender</label>
                                    <select id="gender" name="gender" class="form-control p-0 {{ $errors->has('gender') ? 'is-invalid' : ''}}">
                                        @if(!$user->gender)
                                        <option disabled selected>Select your Gender</option>
                                        @endif
                                        <option {{$user->gender=='male' || old('gender')=='male'?'selected':''}} value="male">Male</option>
                                        <option {{$user->gender=='female'|| old('gender')=='female'?'selected':''}} value="female">Female</option>
                                    </select>
                                    {!! $errors->first('gender', '<div class="invalid-feedback" style="display:block">:message</div>') !!}
                                </div>

                                <div class="form-group col-md-6"> @if(!$user->cv)  * @endif Upload CV (.pdf, .doc)
                                    <input type="file" name="cv" class="custom-file-input {{ $errors->has('cv') ? 'is-invalid' : ''}}" id="cv">
                                    <label style="width: 90%;top:32px" class="custom-file-label" for="cv">.PDF,.DOC CV</label>
                                    {!! $errors->first('cv', '<div class="invalid-feedback">:message</div>') !!}
                                </div>

                                <div class="form-group col-md-6"> Profile Picture (.jpg,png,jpeg,gif)
                                    <input type="file" class="custom-file-input {{ $errors->has('image') ? 'is-invalid' : ''}}" name="image" id="image">
                                    <label style="width: 90%;top:32px" class="custom-file-label" for="image">.jpg .png .jpeg Picture</label>
                                    {!! $errors->first('image', '<div class="invalid-feedback">:message</div>') !!}
                                </div>

                                <div class="form-group col-md-6"> Video Cv (.mp4)
                                    <input type="file" class="custom-file-input {{ $errors->has('video_cv') ? 'is-invalid' : ''}}" name="video_cv" id="video">
                                    <label style="width: 90%;top:32px" class="custom-file-label" for="video">.mp4 Video Cv</label>
                                    {!! $errors->first('video_cv', '<div class="invalid-feedback">:message</div>') !!}
                                </div>

                                <div class="custom-control custom-checkbox mb-3 ml-4 col-md-12">
                                    <input type="checkbox" name="subscription" {{$user->subscription==1?'checked':''}} name="subscription" class="custom-control-input" id="subscription">
                                    <label class="custom-control-label" for="subscription">Subscription</label>
                                </div>

                                <div class="form-group col-md-12">
                                    {{-- @if($user->getUserRate() < 75)
                                        <div class="alert alert-primary">
                                            Your Profile is {{$user->getUserRate()}}%  ,  complete your profile to edit your info , from this <a href="{{route('user.profile.manage') }}" class=" text-muted font-weight-bold"> Link </a>
                                        </div>
                                    @else  --}}
                                    <input type="submit" class="btn btn-info w-25 my-1" value="Save">
                                    {{-- @endif --}}

                                </div>
                            </form>
                        </div>

                        @if(!$user->IfSocialUser())
                        <div class="tab-pane fade {{old('type')=='change_p'?'show active':''}}" id="nav-account" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <form action="{{route('user.password.change')}}" method="POST" class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Change Your Password</label>
                                    <input value="change_p" name="type" type="hidden"/>
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
                                    <a class="btn btn-danger" href="{{route('user.deactivate')}}" id="userDelete"> Deactivate My Account </a>
                                </div>
                            </form>
                        </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>
@endsection
@section('scripts')
<!-- datepicker Js -->
<script src="{{asset('assets/plugins/momentjs/moment.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}"></script>
<script src="{{asset('assets/js/pages/forms/basic-form-elements.js')}}"></script>
{{--  --}}
<script type="text/javascript" src="https://connect.facebook.net/en_US/all.js"></script>
<script type="text/javascript">
    FB.init({
        appId: '1074007959473341',
        status: true, // check login status
        cookie: true, // enable cookies to allow the server to access the session
        xfbml: true // parse XFBML
    });

    function newInvite() {
        var receiverUserIds = FB.ui({
                method: 'send',
                link: "{{route('user.register.get')}}"
            },
            function(status) {

            }
        );
    }

    //  display file name after uploading it
    $('#cv').change(function() {
        var i = $(this).next('label').clone();
        var file = $('#cv')[0].files[0].name;
        $(this).next('label').text(file);
    });



    //  display file name after uploading it
    $('#video').change(function() {
        var i = $(this).next('label').clone();
        var file = $('#video')[0].files[0].name;
        $(this).next('label').text(file);
    });

    //  display file name after uploading it
    $('#image').change(function() {
        var i = $(this).next('label').clone();
        var file = $('#image')[0].files[0].name;
        $(this).next('label').text(file);
    });


    $('#country1').change(function() {
        var country = $(this).val();
        var url = "{{route('user.countries.cities.get',':country')}}".replace(":country", country);
        $.ajax({
            url: url,
        }).done(function(response) {
            var cities = response.cities;
            var cities_select = '<label for="">City</label><select name="city_id" class="form-control" required> <option disabled selected>*please select your city</option>';
            $.each(cities, function(index, city) {
                cities_select = cities_select + '<option value="' + city.id + '">' + city.name_en + '</option>';
            });
            cities_select = cities_select + '</select>';
            $('#cities_holder').html(cities_select);
        });
    });
    $(".confirm").click(function(e){
        e.preventDefault();
        $msg  = $(this).data("message")
        let x = confirm($msg)
        if(x){
            if($(this).hasClass("deleted-cv")){
                $("#deleted-cv").submit();
            }else{
                $(this).parent("form").submit();
            }
        }


    })

    $('#video').bind('change', function() {
        if( this.files[0]){
            if(this.files[0].size/(1024*1024) > {{ env("VEDIO_CV_LIMIT",9 ) }} ){
                alert('This file size is: ' + (this.files[0].size/(1024*1024)).toFixed(2)+ "MB is too larage allow {{ env('VEDIO_CV_LIMIT',9 ) }} MB");
                delete this.files[0];
                $(this).siblings("label").text("Video Cv (.mp4)")
                $(this).val(null)
            }
                

        }
            
        })
       
</script>
 @if(session()->has("comeRegister") ) 
        <script>
            $("#nav-profile-tab").click();
        </script>
 @endif

 <script>
     $(function(){
        var today = moment().subtract(16, 'years')
         $("#Birth_Date").bootstrapMaterialDatePicker({
              format : 'YYYY-MM-DD',
              time: false,
              endDate: "today",
              maxDate: today
            })
     })
 </script>
@endsection
