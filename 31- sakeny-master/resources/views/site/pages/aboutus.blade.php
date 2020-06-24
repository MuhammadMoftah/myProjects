@extends('site.master')
@section('body')
<section class="about">
    <div class="container">
        <div class="row">
            <div class="title2 col-sm-12 py-3 rounded mb-5">
                <h1 class="text-center text-white font-weight-bold m-0">{{trans('lang.About Us')}}</h1>
            </div>


            <div class="col-md-12 py-5 wow fadeInUp" data-wow-duration="1s">
                <div class="title">
                    <h1>{{trans("lang.What's Sakeny")}}</h1>
                </div>
                <p class="text-secondary">
                    {{trans('lang.What_text')}}
                </p>
            </div>

            <div class="col-md-12 py-2 wow fadeInUp" data-wow-duration="1s">
                <div class="title">
                    <h1>{{trans('lang.our_vision')}}</h1>
                </div>
                <p class="text-secondary">
                    {{trans('lang.vision_text')}}
                </p>
            </div>

            <div class="col-md-12 py-2 wow fadeInUp" data-wow-duration="1s">
                <div class="title">
                    <h1>{{trans('lang.our_mission')}}</h1>
                </div>
                <p class="text-secondary">
                    {{trans('lang.mission_text')}}
                </p>
            </div>

        </div>
    </div>
</section>

<section class="houses wow fadeInUp" data-wow-duration="1s">
    <img src="{{url('site')}}/images/footer.jpg" alt="">
</section>
@endsection