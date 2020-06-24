@extends('site.master')
@section('body')
<section class="login">
    <div class="container">
        <div class="row">
            <div class="col-xl-10 mx-auto">
                    {{-- {{ LaravelLocalization::getURLFromRouteNameTranslated( app()->getLocale() , 'routes.contact_us') }} --}}

            <form action="{{ route('user.contactUs.post') }}" method="POST">

                    {{csrf_field()}}

                    @include('site.layouts.errors')
                    @include('site.layouts.message')

                    <div class="form-title">
                        <div class="title">
                            <h1>{{trans('lang.Contact US')}}</h1>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name-input">{{
                                trans('lang.name')}}</label>
                        <input type="text" class="form-control"  name="name" id="name-input" placeholder="{{
                            trans('lang.name')}}" value="{{old('name')}}" required>
                    </div>


                    <div class="form-group">
                        <label for="phone-input">{{
                                trans('lang.phone')}}</label>
                        <input type="text" class="form-control"  name="phone" id="phone-input" placeholder="{{
                            trans('lang.phone')}}" value="{{old('phone')}}" required>
                    </div>

                    <div class="form-group">
                        <label for="email-input"> {{
                                trans('lang.email')}} </label>

                        <input  type="email" 
                                class="form-control"  
                                name="email" 
                                id="email-input" 
                                placeholder="{{ trans('lang.email')}}"  
                                value="{{old('email')}}" required>
                    </div>

                    
                    
                    <div class="form-group">
                        <label for="message-input">{{
                                trans('lang.your_message')}}</label>
                        <textarea class="form-control" name="message" id="message-input" cols="20" rows="6" style="resize:none"  value="{{old('message')}}" required></textarea>
                    </div>

                    <input class="btn btn-primary form-control" type="submit" value="{{
                    trans('lang.sendmessage')}}">
                </form>

       

            </div>
        </div>
    </div>
</section>

<section class="houses">
    <!-- <img src="images/footer.jpg" alt=""> -->
</section>
 @endsection