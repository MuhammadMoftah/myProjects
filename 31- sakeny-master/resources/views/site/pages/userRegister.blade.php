@extends('site.master')
@section('fb_pixel_events')
    fbq('track', 'InitiateCheckout');
@endsection

@section('body')
<section class="login">
    <div class="container">
        <div class="row">
            <div class="col-xl-10 mx-auto">
                <form action="{{route('user.register.post')}}" method="POST">
                    {{csrf_field()}}
                    <div class="form-title">
                        <div class="title" style="right: 120px;bottom: 89px;">
                            <h1>{{trans('lang.signup')}}</h1>
                        </div>
                    </div>

                    <div class="form-group  wow fadeInUp" data-wow-duration="1s">
                        <label for="exampleInputName">{{trans('lang.username')}}</label>
                        <input type="text" name="name" value="{{old('name')}}" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" id="exampleInputName" placeholder="{{trans('lang.username')}}">
                        {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                    </div>

                    <div class="form-group  wow fadeInUp" data-wow-duration="1s">
                        <label for="exampleInputName">{{trans('lang.phone')}}</label>
                        <input type="text" name="phone" value="{{old('phone')}}" class="form-control {{ $errors->has('phone') ? 'is-invalid' : ''}}" id="exampleInputName" placeholder="{{trans('lang.phone')}}">
                        {!! $errors->first('phone', '<div class="invalid-feedback">:message</div>') !!}
                    </div>

                    <div class="form-group  wow fadeInUp" data-wow-duration="1s">
                        <label for="exampleInputEmail1">{{trans('lang.Email')}}</label>
                        <input type="email" value="{{old('email')}}" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{trans('lang.Email')}}">
                        {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
                    </div>

                    <div class="form-group  wow fadeInUp" data-wow-duration="1s">
                        <label for="exampleInputPassword1">{{trans('lang.password')}}</label>
                        <input type="password" name="password" class="form-control mb-2 {{ $errors->has('password') ? 'is-invalid' : ''}}" id="exampleInputPassword1" placeholder="{{trans('lang.password')}}">
                        <input type="password" name="password_confirmation" class="form-control {{ $errors->has('password') ? 'is-invalid' : ''}}" id="exampleInputPassword2" placeholder="{{trans('lang.confirmpassword')}}">
                        {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
                    </div>

                    <div class="form-group wow fadeInUp" data-wow-duration="1s">
                        <select name="gender" class="form-control p-0 {{ $errors->has('gender') ? 'is-invalid' : ''}}">
                            @if(!old('gender'))
                            <option disabled selected>{{trans('lang.gender')}}</option>
                            @endif
                            <option value="1" {{old('gender')&&old('gender')==1?'selected':''}}>{{trans('lang.male')}}</option>
                            <option value="0" {{old('gender')&&old('gender')==0?'selected':''}}>{{trans('lang.female')}}</option>
                        </select>
                        {!! $errors->first('gender', '<div class="invalid-feedback">:message</div>') !!}
                    </div>

                    <div class="custom-control custom-checkbox my-3 was-validated wow fadeInUp" data-wow-duration="1s" style="height: 47px;">
                        <input name="terms_condition" type="checkbox" class="custom-control-input {{ $errors->has('terms_condition') ? 'is-invalid' : ''}}" id="customControlValidation1">
                        <label class="custom-control-label" for="customControlValidation1"><a href="{{route('user.terms',app()->getLocale())}}" class="text-primary">{{trans('lang.Terms & Conditions')}}</a></label>
                        {!! $errors->first('terms_condition', '<div class="invalid-feedback">:message</div>') !!}
                    </div>

                    <input class="btn btn-primary form-control mt-3 wow fadeInUp" data-wow-duration="1s" type="submit" value="{{trans('lang.join_us')}}">
                    
                    <a  class="btn-link text-success" href="{{ LaravelLocalization::getURLFromRouteNameTranslated( app()->getLocale() , 'routes.user_login') }}">
                            {{trans('routes.already_registerd')}}
                    </a>    
                </form>
                {{-- <a href="{{ LaravelLocalization::getURLFromRouteNameTranslated( app()->getLocale() , 'routes.user_login') }}" class="btn btn-success">{{trans('routes.already_registerd')}}</a> --}}

                

            </div>
            
        </div>
    </div>
</section>

<section class="houses wow fadeInUp" data-wow-duration="1s">
    <img src="{{url('site')}}/images/footer.jpg" alt="">
</section>
@endsection