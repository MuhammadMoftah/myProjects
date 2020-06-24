@extends('site.master')
@section('body')

<section class="latest-prop py-5">
    <div class="container mt-5">
        <div class="title">
            <h1 class="removeafterborder text-center">{{$pageTitle}}</h1>
            @if(app()->getLocale()=='ar')
            <h2 class="text-center">عقارات معروضة للبيع في القاهرة و الاسكندرية و الجيزة وجميع محافظات مصر</h2>
            <p class="text-center">جميع انواع العقارات المعروضة للبيع في مصر سواء كان الغرض سكني او إداري او تجاري – هنا هتلاقي كل اعلانات العقارات من شقق وشاليهات وفيلل واراضي ومنازل وعيادات ومكاتب وغيرها من العقارات – اختار العقار المناسب لك وتواصل مع المعلن مباشرة الآن </p>
            @endif
        </div>
        @include('site.layouts.mini_search')
        <div class="row py-0">
            @if(count($allAds)>0)
            @foreach($allAds as $key=>$typeAds)
            <div class="row">
                <div class="col-12">
                    <h3 class="removeafterborder @if(app()->getLocale()=='ar') text-right @endif">
                        @if(app()->getLocale()=='en')
                        {{$typeAds[0]->property_type->name_en}}
                        @else
                        {{$typeAds[0]->property_type->name_ar}}
                        @endif
                        {{trans('lang.for_sale_in_egypt')}}
                    </h3>
                </div>
                @foreach($typeAds as $ad)
                <div class="col-md-4 my-3 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                    <div class="card">
                        <span class="sale bg-danger">@if(app()->getLocale()=='en') {{$ad->offer_type->title_en}} @else {{$ad->offer_type->title_ar}} @endif</span>
                        @if(count($ad->images)>0)
                        <a title="{{$ad->title}}" href="{{route('user.ad.get',['id'=>$ad->id,'lang'=>app()->getLocale(),'ad_name'=>str_replace('+','-',urlencode(str_replace('/','',$ad->title)))])}}">
                            <img class="card-img-top" src="{{env('AWS_URL') .$ad->images[0]['image']}}" alt="{{$ad->title}}">
                        </a>
                        @endif
                        <div class="card-body">
                            <a title="{{$ad->title}}" href="{{route('user.ad.get',['id'=>$ad->id,'lang'=>app()->getLocale(),'ad_name'=>str_replace('+','-',urlencode(str_replace('/','',$ad->title)))])}}">
                                <p class="text-secondary text-center m-0">{{$ad->title}}</p>
                            </a>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted"><i class="fas fa-map-marker-alt"></i> @if(app()->getLocale()=='en') {{$ad->city->name_en}} @else {{$ad->city->name_ar}} @endif</small>
                            <button data-href="{{route('user.add.compare',$ad->id)}}" class="btn btn-success" {{$ad->checkIfInCompare()?'disabled':''}} title="Add to compare"> <i class="fas fa-table"></i></button>
                            <a href="{{route('user.favourite',['id'=>$ad->id,'lang'=>app()->getLocale()])}}" class="{{$ad->isFavourite()?'fas':'far'}} fa-star fa-transparent fav-button float-right mx-1" title="Add to favorite"></a>
                            <small class="text-muted float-right"><span class="text-success font-weight-bold"> {{$ad->price}} </span> @if(app()->getLocale()=='en') {{$ad->country->currency_en}} @else {{$ad->country->currency_ar}} @endif</small>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="col-md-4 my-3 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                    <div class="adv d-flex justify-content-center align-items-center h-100">
                        @if($key==1)
                        <a class="btn btn-outline-success" href="{{ LaravelLocalization::getURLFromRouteNameTranslated( app()->getLocale() , 'routes.properties_for_sale_apartments_only') }}?city_id={{request('city_id')}}&district_id={{request('district_id')}}&min_price={{request('min_price')}}&max_price={{request('max_price')}}&min_size={{request('min_size')}}&max_size={{request('max_size')}}&min_bedrooms_num={{request('min_bedrooms_num')}}&max_bedrooms_num={{request('max_bedrooms_num')}}&search={{request('search')}}">{{trans('lang.more_ads')}}</a>
                        @else
                        <a class="btn btn-outline-success" href="{{ LaravelLocalization::getURLFromRouteNameTranslated(app()->getLocale(),'routes.ads_search')}}?property_type_id={{$key}}&offer_type_id=1&city_id={{request('city_id')}}&district_id={{request('district_id')}}&min_price={{request('min_price')}}&max_price={{request('max_price')}}&min_size={{request('min_size')}}&max_size={{request('max_size')}}&min_bedrooms_num={{request('min_bedrooms_num')}}&max_bedrooms_num={{request('max_bedrooms_num')}}&search={{request('search')}}">{{trans('lang.more_ads')}}</a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <p>{{trans('lang.no ads')}}</p>
            @endif
        </div>
        {{--<div style="text-align:center;">
            {{ $ads->appends(getRequestBetweenPages())->render("pagination::bootstrap-4") }}
    </div>--}}
    </div>
</section>
@endsection
@section('scripts')
<script type="text/javascript">
    $('#city').change(function() {
        var city = $(this).val();
        var lang = "{{app()->getLocale()}}"
        var url = "{{route('city.districts',['city_id'=>':city','lang'=>':lang'])}}".replace(":city", city).replace(':lang', lang);
        $.ajax({
            url: url,
        }).done(function(response) {
            $('#districts_holder').html(response);
        });
    });
</script>
@endsection