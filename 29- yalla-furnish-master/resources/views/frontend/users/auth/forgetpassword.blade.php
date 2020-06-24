@extends('frontend.master')
@section('search')
@include('frontend.search_layouts.search')
@endsection
@section('body')
<section class="trending">
    <div class="container">
        <h3 class="title">Forget Password</h3>

        <div class="row">
            <div class="col-lg-7 col-sm-12 mx-auto">
                <form class="account border" action="{{route('user.forget.post')}}" method="POST">
                    @include('frontend.layouts.errors')
                    @include('frontend.layouts.messages')
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="email">* Email</label>
                        <input type="email" value="{{old('email')}}" class="form-control" id="email" name="email" placeholder="email">
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