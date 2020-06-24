@extends('site.master')
@section('body')
<section class="company-reg">
    <div class="container">
        <div class="row">
            <div class="col-xl-10 mx-auto">
                <form action="{{route('company.profile.post')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-title">
                        <div class="title text-center" style="right: 131px;">
                            <h1>{{trans('lang.profile')}}</h1>
                        </div>
                    </div>
                    @include('site.layouts.message')
                    <div class="form-group">
                        <div class="col-md-12 text-center">
                            <label for="profileImg" style="cursor:pointer">
                                <img src="{{env('AWS_URL') .$user->image}}" style="width:150px; height: 150px; border-radius:50%;" id="profileImage" alt="{{$user->name}}">
                            </label>
                            <input type="file" accept="image/*" name="image" style="display:none" id="profileImg" onchange="document.getElementById('profileImage').src = window.URL.createObjectURL(this.files[0])">
                            {!! $errors->first('image', '<div class="invalid-feedback">:message</div>') !!}
                            <h4>{{$user->name}}</h4>

                        </div>
                    </div>

                    <div class="form-group wow fadeInUp" data-wow-duration="1s">
                        <label for="username">{{trans('lang.username')}}</label>
                        <input type="text" value="{{$user->name}}" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" id="username" required placeholder="{{trans('username')}}">
                        {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                    </div>

                    <div class="row">
                        <div class="form-group col-md-12 wow fadeInUp" data-wow-duration="1s">
                            <label for="Phone">{{trans('lang.phone_number')}}</label>
                            <input type="text" class="form-control {{ $errors->has('phone') ? 'is-invalid' : ''}}" id="Phone" name="phone" value="{{$user->phone}}" required placeholder="{{trans('lang.phone_number')}}">
                            {!! $errors->first('phone', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>

                    <div class="form-group  wow fadeInUp" data-wow-duration="1s">
                        <label for="exampleCompanyRegName">{{trans('lang.new_password')}}</label>
                        <input type="password" name="password" class="form-control my-1 {{ $errors->has('password') ? 'is-invalid' : ''}}" id="exampleCompanyRegName" placeholder="{{trans('lang.new_password')}}">
                        <input type="password" name="password_confirmation" class="form-control my-1 {{ $errors->has('password') ? 'is-invalid' : ''}}" id="exampleCompanyRegName" placeholder="{{trans('lang.password_confirmation')}}">
                        {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
                    </div>

                    <input class="btn btn-primary form-control mt-3 wow fadeInUp" data-wow-duration="1s" type="submit" value="{{trans('lang.save')}}">
                </form>

            </div>
        </div>
    </div>
</section>

<section class="houses wow fadeInUp" data-wow-duration="1s">
    <img src="{{url('site')}}/images/footer.jpg" alt="">
</section>
@endsection