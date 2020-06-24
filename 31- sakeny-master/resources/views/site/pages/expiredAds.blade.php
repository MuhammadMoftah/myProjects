@extends('site.master')
@section('body')
<section class="all-projects saved-ads">
    <div class="container">

        <div class="title mb-5">
            <h1 class="text-info">{{trans('lang.expired_ads')}}</h1>
        </div>

        <div class="row py-0">
            @if(count($ads)>0)
            @foreach($ads as $ad)
            <div class="col-md-4 my-3 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                <div class="card">
                    <span class="sale bg-danger">@if(app()->getLocale()=='en') {{$ad->offer_type->title_en}} @else {{$ad->offer_type->title_ar}} @endif</span>
                    @if(count($ad->images)>0)
                    <img title="{{$ad->title}}" class="card-img-top" src="{{env('AWS_URL').$ad->images[0]['image']}}" alt="{{$ad->title}}">
                    @endif
                    <div class="card-body">
                        <p title="{{$ad->title}}" class="text-secondary text-center m-0">{{$ad->title}}</p>
                    </div>
                    <div class="card-footer">
                        <small  class="text-muted"><i class="fas fa-map-marker-alt"></i>@if(app()->getLocale()=='en') {{$ad->city->name_en}} @else {{$ad->city->name_ar}} @endif</small>
                        <small class="text-muted float-right"><span class="text-success font-weight-bold">{{$ad->price}}</span>
                            @if(app()->getLocale()=='en') {{$ad->country->currency_en}} @else {{$ad->country->currency_ar}} @endif
                        </small>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <p>{{trans('lang.no ads')}}</p>
            @endif
        </div>
        <div style="margin:auto;">
            {{ $ads->appends(getRequestBetweenPages())->render("pagination::bootstrap-4") }}
        </div>
    </div>
</section>

<section class="houses wow fadeInUp" data-wow-duration="1s">
    <img src="{{url('site')}}/images/footer.jpg" alt="">
</section>
@endsection
@section('scripts')
<script src="{{url('site')}}/js/myads.js"></script>
@endsection