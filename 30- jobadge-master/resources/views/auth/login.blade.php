@extends('master')

@section('body')
<div class="container-blog-posts">
    <div class="blog-posts-header">
        <div class="container">
            <h2 class="section-title"><span>Sign in</span></h2>
        </div>
    </div>

    <section class="login">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 mx-auto">
                    <form method="POST" action="{{route('user.login.post')}}">
                        @include('layouts.errors')
                        @include('layouts.message')
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1"><span class="text-danger">*</span> Email address</label>
                            <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                            {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1"><span class="text-danger">*</span> Password</label>
                            <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : ''}}" id="exampleInputPassword1" placeholder="Password">
                            {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
                            <a href="{{route('user.forget.get')}}"><small id="emailHelp" class="form-text text-muted">Forgot your Password?</small></a>
                            <a href="{{route('user.register.get')}}"><small id="emailHelp" class="form-text text-muted">Create New Account?</small></a>
                        </div>

                        <div class="custom-control custom-checkbox form-group">
                            <input type="checkbox" name="remember_me" class="custom-control-input form-check-label checkt" id="customCheck1">
                            <label class="custom-control-label" for="customCheck1">Remember me</label>
                        </div>

                        <input class="btn btn-info form-control" type="submit" value="Login">
                    </form>

                    <!--<div class="col-12 pb-4">-->
                    <!--    <h4>OR SIGN UP WITH</h4>-->
                    <!--</div>-->

                    <!--<div class="text-center social-login pb-5">-->
                    <!--    <a class="facebook" href="{{route('user.social.redirect','facebook')}}">-->
                    <!--        <fa name="facebook"><i aria-hidden="true" class="fab fa-facebook-f"></i></fa>-->
                    <!--    </a>-->
                    <!--    <a class="google" href="{{route('user.social.redirect','google')}}">-->
                    <!--        <fa name="google"><i aria-hidden="true" class="fab fa-google"></i></fa>-->
                    <!--    </a>-->
                    <!--    <a class="twitter" href="{{route('user.social.redirect','twitter')}}">-->
                    <!--        <fa name="twitter"><i aria-hidden="true" class="fab fa-twitter"></i></fa>-->
                    <!--    </a>-->
                    <!--    <a class="linked" href="{{route('user.social.redirect','linkedin')}}">-->
                    <!--        <fa name="linkedin"><i aria-hidden="true" class="fab fa-linkedin-in"></i></fa>-->
                    <!--    </a>-->
                    <!--</div>-->

                </div>
            </div>
        </div>
    </section>
</div>
@endsection
