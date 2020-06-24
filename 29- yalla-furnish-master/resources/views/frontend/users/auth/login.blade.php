@extends('frontend.master')
@section('search')
@include('frontend.search_layouts.search')
@endsection
@section('body')
<section class="trending">
    <div class="container">
        <h3 class="title">Sign in</h3>

        <div class="row">
            <div class="col-lg-7 col-sm-12 mx-auto">
                <form class="account border" action="{{route('user.login.post')}}" method="POST">
                    @include('frontend.layouts.errors')
                    @include('frontend.layouts.messages')
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="email">* Email</label>
                        <input type="email" value="{{old('email')}}" class="form-control" id="email" name="email" placeholder="email">
                    </div>

                    <div class="form-group">
                        <label for="password">* Password</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="remember_me" id="remember_me">
                        <label class="form-check-label" for="remember_me">
                            Remember me
                        </label>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="form-control w-50 mx-auto main-btn" value="Login">
                    </div>
                    <a href="{{route('user.forget.get')}}">Forget Your Password?</a><br>
                    New to Yalla Furnish?<a href="{{route('user.register.get')}}"> Join Now</a><br>
                    <p>By Login or Signup I agree to Yalla Furnish <a href="{{route('user.get.terms')}}">Terms of use and Privacy Policy</a></p>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection