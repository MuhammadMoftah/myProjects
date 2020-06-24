@extends('site.master')
@section('body')
<section class="login">
    <div class="container">
        <div class="row">
            <div class="col-xl-10 mx-auto">
                <form action="{{route('user.forget.post')}}" method="POST">
                    @include('site.layouts.errors')
                    @include('site.layouts.message')
                    {{csrf_field()}}
                    <div class="form-title">
                        <div class="title">
                            <h1 style="text-align:center; font-size:35px; max-width: 120px; bottom: -48px; right: -13px;">{{trans('lang.reset_password')}}</h1>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">{{trans('lang.Email')}}</label>
                        <input type="email" name="email" value="{{old('email')}}" class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{trans('lang.Email')}}">
                        {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
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