@extends('site.master')

@section('fb_pixel_events')
    fbq('track', 'CompleteRegistration');
@endsection

@section('body')

    <section class="about">
        <div class="container">
            <div class="row">
                <div class="title2 col-sm-12 py-3 rounded mb-5">
                    <h1 class="text-center text-white font-weight-bold m-0">{{trans('lang.thankyou')}}</h1>
                </div>


                <div class="col-md-12 py-5 wow fadeInUp jumbotron text-xs-center">
                    <h1 class="display-3 text-center">{{trans('lang.thankyou')}}</h1>
                    <p class="lead"></p>
                    <hr>
                    <p>
                        {{trans('lang.know_more')}} <a href="{{route('user.aboutus',app()->getLocale())}}">{{trans('lang.aboutus')}}</a>
                    </p>
                </div>

            </div>
        </div>
    </section>



    <section class="houses wow fadeInUp" data-wow-duration="1s">
        <img src="{{url('site')}}/images/footer.jpg" alt="">
    </section>
@endsection