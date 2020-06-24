@extends('site.master')
@section('fb_pixel_events')
fbq('track', 'InitiateCheckout');
@endsection
@section('body')
<section class="company-reg">
    <div class="container">
        <div class="row">
            <div class="col-xl-10 mx-auto">
                <form action="{{route('company.register.post')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-title">
                        <div class="title text-center" style="max-width: 160px;">
                            <h1 style=" {{app()->getLocale()=='ar'? 'right:-30px': ''}}">
                                {{trans('lang.company registeration')}}</h1>
                        </div>
                    </div>

                    <div class="form-group wow fadeInUp" data-wow-duration="1s">
                        <label for="exampleCompanyName">{{trans('lang.Company Name')}}</label>
                        <input type="text" name="name" value="{{old('name')}}"
                            class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" id="exampleCompanyName"
                            placeholder="{{trans('lang.Company Name')}}">
                        {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                    </div>

                    <div class="form-group  wow fadeInUp" data-wow-duration="1s">
                        <label for="exampleCompanyRegName">{{trans('lang.company_registered_name')}}</label>
                        <input type="text" value="{{old('registered_name')}}" name="registered_name"
                            class="form-control {{ $errors->has('registered_name') ? 'is-invalid' : ''}}"
                            id="exampleCompanyRegName" placeholder="{{trans('lang.company_registered_name')}}">
                        {!! $errors->first('registered_name', '<div class="invalid-feedback">:message</div>') !!}
                    </div>

                    <div class="form-group wow fadeInUp" data-wow-duration="1s">
                        <label for="exampleFormControlTextarea1">{{trans('lang.company_description')}}</label>
                        <textarea name="description" value="{{old('description')}}" style="resize:none"
                            class="form-control {{ $errors->has('description') ? 'is-invalid' : ''}}"
                            id="exampleFormControlTextarea1" rows="5">{{old('description')}}</textarea>
                        {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
                    </div>

                    <div class="col-12 form-line pb-4 mt-5 text-capitalize">
                        <h4>{{trans('lang.contact_info')}}</h4>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 wow fadeInUp" data-wow-duration="1s">
                            <label for="exampleInputEmail1">{{trans('lang.Email')}}</label>
                            <input type="email" name="email" value="{{old('email')}}"
                                class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}"
                                id="exampleInputEmail1" aria-describedby="emailHelp"
                                placeholder="{{trans('lang.Email')}}">
                            {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
                        </div>

                        <div class="form-group col-md-6">
                            <label for="CRnumber">{{trans('lang.cr_number')}}</label>
                            <input type="text" name="cr_number" value="{{old('cr_number')}}"
                                class="form-control {{ $errors->has('cr_number') ? 'is-invalid' : ''}}" id="CRnumber"
                                placeholder="{{trans('lang.cr_number')}}">
                            {!! $errors->first('cr_number', '<div class="invalid-feedback">:message</div>') !!}
                        </div>

                        <div class="form-group col-md-6 wow fadeInUp" data-wow-duration="1s">
                            <label for="password">{{trans('lang.password')}}</label>
                            <input type="password" name="password"
                                class="form-control {{ $errors->has('password') ? 'is-invalid' : ''}}" id="password"
                                aria-describedby="emailHelp" placeholder="{{trans('lang.password')}}">
                            {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
                        </div>

                        <div class="form-group col-md-6">
                            <label for="password_confirmation">{{trans('lang.confirmpassword')}}</label>
                            <input type="password" name="password_confirmation" class="form-control"
                                id="password_confirmation" placeholder="{{trans('lang.confirmpassword')}}">
                            <div class="invalid-tooltip">
                                <!-- Please choose a unique and valid username. -->
                            </div>
                        </div>

                        <div class="form-group col-md-6 custom-file wow fadeInUp" data-wow-duration="1s"
                            style="height: 90px;"> {{trans('lang.upload_cr_number')}}
                            <input type="file" name="cr_number_file"
                                class="custom-file-input {{ $errors->has('cr_number_file') ? 'is-invalid' : ''}}"
                                id="customFile">
                            <label style="margin-left: 15px; width: 90%; top:32px; @if(app()->getLocale()=='ar') text-align:center; @endif" class="custom-file-label"
                                for="customFile">@if(app()->getLocale()=='en') Choose file @else اختر ملف @endif</label>
                            {!! $errors->first('cr_number_file', '<div class="invalid-feedback">:message</div>') !!}
                        </div>

                        <div class="form-group col-md-6 wow fadeInUp" data-wow-duration="1s">
                            <label for="Phone">{{trans('lang.phone')}}</label>
                            <input type="text" name="phone" value="{{old('phone')}}"
                                class="form-control {{ $errors->has('phone') ? 'is-invalid' : ''}}" id="Phone"
                                placeholder="{{trans('lang.phone')}}">
                            {!! $errors->first('phone', '<div class="invalid-feedback">:message</div>') !!}
                        </div>

                        <div class="form-group col-md-6 wow fadeInUp" data-wow-duration="1s">
                            <label for="exampleInputPassword1">{{trans('lang.country')}}</label>
                            <select id="selected_country"
                                class="form-control {{ $errors->has('country_id') ? 'is-invalid' : ''}}"
                                name="country_id">
                                @if(!old('country_id'))
                                <option selected disabled>{{trans('lang.select country')}}</option>
                                @endif
                                @foreach($countries as $country)
                                <option value="{{$country->id}}"
                                    {{old('country_id')&&$country->id==old('country_id')?'selected':''}}>
                                    @if(app()->getLocale()=='en') {{$country->name_en}} @else {{$country->name_ar}}
                                    @endif</option>
                                @endforeach
                            </select>
                            {!! $errors->first('country_id', '<div class="invalid-feedback">:message</div>') !!}
                        </div>

                        <div class="form-group col-md-6 wow fadeInUp" data-wow-duration="1s">
                            <label for="exampleInputPassword1">{{trans('lang.city')}}</label>
                            <select id="selected_city"
                                class="form-control {{ $errors->has('city') ? 'is-invalid' : ''}}" name="city">
                   
                            </select>
                            {!! $errors->first('city', '<div class="invalid-feedback">:message</div>') !!}
                        </div>


                        <div class="form-group col-md-6 wow fadeInUp" data-wow-duration="1s">
                            <label for="zipCode">{{trans('lang.zip_code')}}</label>
                            <input type="text" name="zip_code" value="{{old('zip_code')}}" id="zipCode"
                                class="form-control {{ $errors->has('zip_code') ? 'is-invalid' : ''}}"
                                placeholder="{{trans('lang.zip_code')}}">
                            {!! $errors->first('zip_code', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="form-group col-md-6 wow fadeInUp" data-wow-duration="1s">
                            <label for="no_of_agents">{{trans('lang.no_of_agents')}}</label>
                            <input type="number" name="num_agents" value="{{old('num_agents')}}" id="no_of_agents"
                                class="form-control {{ $errors->has('num_agents') ? 'is-invalid' : ''}}"
                                placeholder="{{trans('lang.no_of_agents')}}">
                            {!! $errors->first('num_agents', '<div class="invalid-feedback">:message</div>') !!}
                        </div>

                        <div class="form-group col-md-6 custom-file wow fadeInUp" data-wow-duration="1s"
                            style="height: 90px;"> {{trans('lang.upload_logo')}}
                            <input type="file" name="logo"
                                class="custom-file-input {{ $errors->has('logo') ? 'is-invalid' : ''}}" id="CRlogo">
                            <label style="margin-left: 15px;width: 90%;top:32px" class="custom-file-label"
                                for="CRlogo">Choose file</label>
                            {!! $errors->first('logo', '<div class="invalid-feedback">:message</div>') !!}
                        </div>

                    </div>

                    <div class="custom-control custom-checkbox my-3 was-validated wow fadeInUp" data-wow-duration="1s"
                        style="height: 47px;">
                        <input name="terms_condition" type="checkbox"
                            class="custom-control-input {{ $errors->has('terms_condition') ? 'is-invalid' : ''}}"
                            id="customControlValidation1">
                        <label class="custom-control-label" for="customControlValidation1"><a
                                href="{{route('user.terms',app()->getLocale())}}"
                                class="text-primary">{{trans('lang.Terms & Conditions')}}</a></label>
                        {!! $errors->first('terms_condition', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <input class="btn btn-primary form-control mt-3 wow fadeInUp" data-wow-duration="1s" type="submit"
                        value="{{trans('lang.join_as_company')}}">
                </form>

            </div>
        </div>
    </div>
</section>

<section class="houses wow fadeInUp" data-wow-duration="1s">
    <img src="{{url('site')}}/images/footer.jpg" alt="">
</section>
@endsection
<script src="{{url('backend')}}/assets/js/jquery.min.js"></script>

<script>
    $(document).ready(function(){
$("#selected_country").on('change',function(){
    var locale = '{{ config('app.locale') }}';
    $("#selected_city").html("");
    var country_id=$(this).val();
    $.ajax({
               type:"Get",
               url:"{{ route('get.cities',':lang')}}".replace(':lang',locale),
               data:{
                   country_id:country_id
               },
               success:function(data) {
                   for (let i = 0; i < data.cities.length; i++) {
                    if( locale == 'en' ) {
                    $("#selected_city").append('<option>'+data.cities[i].name_en+'</option>');
                    }else{
                        $("#selected_city").append('<option>'+data.cities[i].name_ar+'</option>');

                    }
                   }
               }
            });
});
});
</script>