@extends('site.master')
@section('body')
<section class="login">
    <div class="container">
        <div class="row">
            <div class="col-xl-10 mx-auto">
                <form action="{{route('user.newpassword.post',$user->reset_password_code)}}" method="POST">
                    @include('site.layouts.errors')
                    @include('site.layouts.message')
                    {{csrf_field()}}
                    <div class="form-title">
                        <div class="title">
                            <h1>{{trans('lang.reset_password')}}</h1>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">{{trans('lang.new_password')}}</label>
                        <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : ''}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{trans('lang.password')}}">
                        {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">{{trans('lang.confirmpassword')}}</label>
                        <input type="password" name="password_confirmation" class="form-control {{ $errors->has('password') ? 'is-invalid' : ''}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{trans('lang.confirmpassword')}}">
                        {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <input class="btn btn-primary form-control" type="submit" value="{{trans('lang.reset_password')}}">
                </form>

            </div>
        </div>
    </div>
</section>

<section class="houses">
    <img src="{{url('site')}}/images/footer.jpg" alt="">
</section>
@endsection