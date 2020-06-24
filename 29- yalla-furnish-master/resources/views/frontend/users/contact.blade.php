@extends('frontend.master')
@section('search')
@include('frontend.search_layouts.search')
@endsection
@section('body')
<section class="trending">
    <div class="container">
        <h3 class="title">Contact Us</h3>

        <div class="row">
            <div class="col-lg-7 col-sm-12 mx-auto">
                <form method="POST" action="{{route('user.post.contact')}}" class="account border">
                    @include('frontend.layouts.errors')
                    @include('frontend.layouts.messages')
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="exampleFormControlInput3">Email address</label>
                        <input required value="{{old('email')}}" name="email" type="email" class="form-control" id="exampleFormControlInput3" placeholder="name@example.com">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Your Name</label>
                        <input required value="{{old('name')}}" name="name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Your Name">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput4">Subject</label>
                        <input required value="{{old('subject')}}" name="subject" type="text" class="form-control" id="exampleFormControlInput4" placeholder="Subject">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Message</label>
                        <textarea required value="{{old('message')}}" name="message" class="form-control" id="exampleFormControlTextarea1" rows="5" placeholder="Your Message" style="resize:none">
                        {{old('message')}}
                        </textarea>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="form-control w-50 mx-auto main-btn" value="Send">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection