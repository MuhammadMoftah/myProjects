@extends('frontend.master')
@section('search')
@include('frontend.search_layouts.search')
@endsection
@section('body')
<section class="trending">
    <div class="container">
        <h3 class="title">New Password</h3>

        <div class="row">
            <div class="col-lg-7 col-sm-12 mx-auto">
                <form class="account border" action="{{route('user.newpassword.post',request('token'))}}" method="POST">
                    @include('frontend.layouts.errors')
                    @include('frontend.layouts.messages')
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="password">* New Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="New Password">
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">* Confirm Password</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="form-control w-50 mx-auto main-btn" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection