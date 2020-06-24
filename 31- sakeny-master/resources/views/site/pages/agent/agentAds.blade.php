@extends('site.master')
@section('body')
<section class="all-projects saved-ads">
    <div class="container">

        <div class="title mb-5">
            @include('site.layouts.message')
            <h1 class="text-info">{{trans('lang.my_ads')}}</h1>
        </div>
        <a class="btn btn-success" title="{{trans('lang.Add_ad')}}" href="{{route('company.ad.create.get',app()->getLocale())}}">{{trans('lang.Add_ad')}}</a>

        <div class="row py-0">
            @if(count($ads)>0)
            @foreach($ads as $ad)
            <div class="col-md-4 my-3 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                <div class="card">
                    <span class="sale bg-danger">@if(app()->getLocale()=='en') {{$ad->offer_type->title_en}} @else {{$ad->offer_type->title_ar}} @endif</span>
                    <a title="{{$ad->title}}" href="{{route('user.ad.get',['id'=>$ad->id,'lang'=>app()->getLocale(),'ad_name'=>str_replace('+','-',urlencode(str_replace('/','',$ad->title)))])}}">
                        @if(count($ad->images)>0)
                        <img class="card-img-top" src="{{env('AWS_URL') .$ad->images[0]['image']}}" alt="{{$ad->title}}">
                        @endif
                    </a>
                    <div class="card-body">
                        <a title="{{$ad->title}}" href="{{route('user.ad.get',['id'=>$ad->id,'lang'=>app()->getLocale(),'ad_name'=>str_replace('+','-',urlencode(str_replace('/','',$ad->title)))])}}">
                            <p title="{{$ad->title}}" class="text-secondary text-center m-0">{{$ad->title}}</p>
                        </a>
                    </div>
                    <div class="card-footer">
                        <a title="{{trans('lang.edit')}}" href="{{ route('company.ad.edit',['id'=>$ad->id,'lang'=>app()->getLocale()]) }}" class="btn btn-info"><i class="far fa-edit"></i></a>
                        <small class="text-muted"><i class="fas fa-map-marker-alt"></i>@if(app()->getLocale()=='en') {{$ad->city->name_en}} @else {{$ad->city->name_ar}} @endif</small>
                        <button data-href="{{route('user.add.compare',$ad->id)}}" class="btn btn-success" {{$ad->checkIfInCompare()?'disabled':''}} title="Add to compare"> <i class="fas fa-table"></i></button>
                        <a href="{{route('user.favourite',['id'=>$ad->id,'lang'=>app()->getLocale()])}}" class="{{$ad->isFavourite()?'fas':'far'}} fa-star fa-transparent fav-button float-right mx-1" title="Add to favorite"></a>
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