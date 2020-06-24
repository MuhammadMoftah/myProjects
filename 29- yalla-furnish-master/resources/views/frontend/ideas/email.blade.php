@extends('frontend.master')
@section('search')
@include('frontend.search_layouts.search')
@endsection
@section('body')
<section class="trending">
    <div class="container">
        <h3 class="title">Share Idea</h3> 
        <div class="row">
            <div class="col-lg-7 col-sm-12 mx-auto">
                <form method="POST" action="{{route('user.idea.shareViaEmailPost', ['id' => $idea->id])}}" class="account border">

                    @include('frontend.layouts.errors')
                    @include('frontend.layouts.messages')
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input required value="{{old('email')}}" name="email" type="email" class="form-control" id="email" placeholder="Enter Sharing Email">
                    </div> 
                    <div class="form-group">
                        <input type="submit" class="form-control w-50 mx-auto main-btn" value="Share">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection