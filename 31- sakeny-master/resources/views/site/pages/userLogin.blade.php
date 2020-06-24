@extends('site.master')
@section('body')
<section class="login">
    <div class="container">
        <div class="row">
            <div class="col-xl-10 mx-auto">
                <form action="{{route('user.login.post')}}" method="POST">
                    @include('site.layouts.errors')
                    @include('site.layouts.message')
                    {{csrf_field()}}
                    <div class="form-title">
                        <div class="title" style="right: 121px;bottom: 100px;">
                            <h1 style="bottom: -15px;">{{trans('lang.signin')}}</h1>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">{{trans('lang.Email')}}</label>
                        <input type="email" name="email" value="{{old('email')}}" class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{trans('lang.Email')}}">
                        {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">{{trans('lang.password')}}</label>
                        <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : ''}}" id="exampleInputPassword1" placeholder="{{trans('lang.password')}}">
                        {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
                       <h4> <a href="{{route('user.forget.get',app()->getLocale())}}"><small id="emailHelp" class="form-text text-muted text-capitalize">{{trans('lang.iforgetmypassword')}}</small></a></h4>
                    </div>

                    <!-- <div class="custom-control custom-checkbox form-group">
                        <input type="checkbox" class="custom-control-input form-check-label checkt" id="customCheck1">
                        <label class="custom-control-label" for="customCheck1">Remember me</label>
                    </div> -->

                    <input class="btn btn-primary form-control" type="submit" value="{{trans('lang.login')}}">

                    <a  class="btn-link text-success" href="{{ LaravelLocalization::getURLFromRouteNameTranslated( app()->getLocale() , 'routes.user_register') }}">
                            {{trans('routes.not_registered')}}
                    </a>   
                </form>
                {{-- <a href="{{ LaravelLocalization::getURLFromRouteNameTranslated( app()->getLocale() , 'routes.user_register') }}" class="btn btn-success">{{trans('routes.not_registered')}}</a> --}}


                <div class="col-12 pb-4 form-line">
                    <h4>{{trans('lang.sign_up_with')}}</h4>
                </div>

                <div class="text-center social-login pb-5">
                    <a class="facebook" href="{{route('user.social.redirect','facebook')}}">
                        <fa name="facebook"><i aria-hidden="true" class="fab fa-facebook-f"></i></fa>
                    </a>
                    <a class="google" href="{{route('user.social.redirect','google')}}">
                        <fa name="google"><i aria-hidden="true" class="fab fa-google"></i></fa>
                    </a>
                    {{--<a class="twitter" href="{{route('user.social.redirect','twitter')}}">
                        <fa name="twitter"><i aria-hidden="true" class="fab fa-twitter"></i></fa>
                    </a>--}}
                    {{--<a class="linked" href="{{route('user.social.redirect','linkedin')}}">
                        <fa name="linkedin"><i aria-hidden="true" class="fab fa-linkedin-in"></i></fa>
                    </a>--}}
                </div>

            </div>
        </div>
    </div>
</section>

<section class="houses">
    <img src="{{url('site')}}/images/footer.jpg" alt="">
</section>
@endsection