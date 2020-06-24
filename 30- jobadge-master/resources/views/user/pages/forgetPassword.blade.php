@extends('master')
@section('body')
<!--===== Join Us =====-->
<!--===== Join Us =====-->
<div class="container-blog-posts">
    <div class="blog-posts-header">
        <div class="container">
            <h2 class="section-title"><span>Forget your password</span></h2>
        </div>
    </div>

    <section class="login">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 mx-auto">
                    <form action="{{route('user.forget.post')}}" method="POST">
                        @include('layouts.errors')
                        @include('layouts.message')
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail5"><span class="text-danger">*</span> Email address</label>
                            <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}" id="exampleInputEmail5" aria-describedby="emailHelp" placeholder="Enter email">
                            {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
                        </div>

                        <input class="btn btn-danger form-control" type="submit" value="Recover my password">
                    </form>                  

                </div>
            </div>
        </div>
    </section>
</div>
@endsection