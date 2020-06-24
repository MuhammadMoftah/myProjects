@extends('master')
@section('body')
<!--===== Contact Us =====-->
<!--===== Contact Us =====-->

<div class="container-blog-posts contact-us-header">
    <div class="blog-posts-header">
        <div class="container">
            <h1 class="section-title"><span>Contact Us</span></h1>
        </div>
    </div>
</div>

<div class="container-blog-posts">

    <section class="contact">
        <div class="col-md-7 offset-md-3 py-5 ">
            @include('layouts.message')
            <form action="{{route('user.mail.post')}}" method="POST" class="form-row py-4 px-3 border">
                    {{ csrf_field() }}
                <div class="form-group col-md-6">
                    <label for="exampleInputEmail1"><span class="text-danger">*</span> Email address</label>
                    <input value="{{old('email')}}" type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your email">
                    {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="form-group col-md-6">
                    <label for="exampleInputTitle"><span class="text-danger">*</span> Name</label>
                    <input value="{{old('name')}}" type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" id="exampleInputTitle" placeholder="Enter Your Name">
                    {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="form-group col-md-12">
                    <label for="exampleFormControlTextarea1"><span class="text-danger">*</span> Message</label>
                    <textarea value="{{old('body')}}" name="body" class="form-control {{ $errors->has('body') ? 'is-invalid' : ''}}" id="exampleFormControlTextarea1" rows="5" placeholder="Enter Your Message">{{old('body')}}</textarea>
                    {!! $errors->first('body', '<div class="invalid-feedback">:message</div>') !!}
                </div>
             
                <input class="btn button-fill col-md-3 mx-auto my-1" type="submit" value="Send">
            </form>
        </div>
    </section>


</div>
@endsection