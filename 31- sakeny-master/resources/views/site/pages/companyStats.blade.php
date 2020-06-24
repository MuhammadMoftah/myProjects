@extends('site.master')
@section('body')
<section class="count-companies ">
    <div class="container">
        <div class="row">


            <div class="col-md-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                <div class="card-counter bg-primary text-white">
                    <i class="fas fa-building"></i>
                    <span class="count-numbers">599</span>
                    <span class="count-name text-white-50">{{trans('lang.units')}}</span>
                </div>
            </div>

            <div class="col-md-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                <div class="card-counter bg-danger text-white">
                    <i class="fas fa-briefcase"></i> <span class="count-numbers">{{$count}}</span>
                    <span class="count-name">{{trans('lang.partners')}}</span>
                </div>
            </div>

            <div class="col-md-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                <div class="card-counter bg-info text-white">
                    <i class="fa fa-users"></i>
                    <span class="count-numbers">35</span>
                    <span class="count-name">{{trans('lang.pages_view')}}</span>
                </div>
            </div>
            @if(!auth()->guard('user')->check()||!auth()->guard('user')->user()->activation==1)
            <button class="btn mx-auto my-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s" style="background-color:#7812b2;">
                <a href="{{route('company.register.get',app()->getLocale())}}"> {{trans('lang.register')}} </a>
            </button>
            @endif
        </div>

        <div class="row py-5">
            @foreach($companies as $company)
            <div class="card col-lg-2 col-md-4 col-sm-6 my-2  wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                <img class="card-img-top" src="{{env('AWS_URL') .$company->logo}}" alt="{{$company->registered_name}}">
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection