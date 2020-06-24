@extends('master')
@section('body')
<div class="container-blog-posts">
    <div class="blog-posts-header">
        <div class="container">
            <h2 class="section-title"><span>Enter Your New Password</span></h2>
        </div>
    </div>

    <section class="login">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 mx-auto">
                    <form action="{{route('user.newpassword.post',$token)}}" method="POST">
                        @include('layouts.errors')
                        @include('layouts.message')
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="password"><span class="text-danger">*</span> Password</label>
                            <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : ''}}" id="password" aria-describedby="emailHelp" placeholder="Enter Your Password">
                            {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
                        </div>

                        <div class="form-group">
                            <label for="confirm"><span class="text-danger">*</span> Password Confirmation</label>
                            <input type="password" name="password_confirmation" class="form-control {{ $errors->has('password') ? 'is-invalid' : ''}}" id="confirm" aria-describedby="emailHelp" placeholder="Enter Password Confirmation">
                            {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
                        </div>

                        <input class="btn btn-danger form-control" type="submit" value="Change Password">
                    </form>                  

                </div>
            </div>
        </div>
    </section>
</div>
@endsection