@extends('site.master')
@section('body')
<section class="all-projects saved-favourites">
    <div class="container">

        <div class="title mb-5">
            <h1>{{trans('lang.get_saved')}}</h1>
        </div>


        <div class="row py-0">
            @if(count($favourites)>0)
            @foreach($favourites as $favourite)
            <div class="col-md-4 my-3 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                <div class="card">
                    <span class="sale bg-danger">@if(app()->getLocale()=='en') {{$favourite->ad->offer_type->title_en}} @else {{$favourite->ad->offer_type->title_ar}} @endif</span>
                    @if(count($favourite->ad->images)>0)
                    <a title="{{$favourite->ad->title}}" href="{{route('user.ad.get',['id'=>$favourite->ad->id,'lang'=>app()->getLocale(),'ad_name'=>str_replace('+','-',urlencode(str_replace('/','',$favourite->ad->title)))])}}">
                        <img class="card-img-top" src="{{env('AWS_URL') .$favourite->ad->images[0]['image']}}" alt="{{$favourite->ad->title}}">
                    </a>
                    @endif
                    <div class="card-body">
                        <a title="{{route('user.ad.get',['id'=>$favourite->ad->id,'lang'=>app()->getLocale(),'ad_name'=>str_replace('+','-',urlencode(str_replace('/','',$favourite->ad->title)))])}}">
                            <p class="text-secondary text-center m-0">{{$favourite->ad->title}}</p>
                        </a>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted"><i class="fas fa-map-marker-alt"></i> @if(app()->getLocale()=='en') {{$favourite->ad->city->name_en}} @else {{$favourite->ad->city->name_ar}} @endif</small>
                        <button data-href="{{route('user.add.compare',$favourite->ad->id)}}" class="btn btn-success" {{$favourite->ad->checkIfInCompare()?'disabled':''}} title="Add to compare"> <i class="fas fa-table"></i></button>
                        <a href="{{route('user.favourite',['id'=>$favourite->ad->id,'lang'=>app()->getLocale()])}}" class="{{$favourite->ad->isFavourite()?'fas':'far'}} fa-star fa-transparent fav-button float-right mx-1" title="Add to favorite"></a>
                        <small class="text-muted float-right"><span class="text-success font-weight-bold"> {{$favourite->ad->price}} </span> @if(app()->getLocale()=='en') {{$favourite->ad->country->currency_en}} @else {{$favourite->ad->country->currency_ar}} @endif</small>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <p>{{trans('lang.no ads')}}</p>
            @endif
        </div>
        <div style="margin:auto;">
            {{ $favourites->appends(getRequestBetweenPages())->render("pagination::bootstrap-4") }}
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