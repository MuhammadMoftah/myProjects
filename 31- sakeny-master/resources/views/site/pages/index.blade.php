@extends('site.master')
@section('styles')
<!-- <script type="text/javascript" src='https://maps.google.com/maps/api/js?libraries=places&key=AIzaSyAiJwjqodwVVY04ESTFA9REOjqOt1pXOQI'></script> -->
@endsection
@section('body')
@include('site.layouts.search')

@if(count($videos)>0)
<!-- ==== Video Section ===== -->
<!-- ==== Video Section ===== -->
<section class="videos-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-2 px-0 text-center d-md-block d-none">
            @if($first_left_ad && $first_left_ad->getOriginal('image'))
                <a href="{{$first_left_ad->link}}"><img style="margin-top: 122px;max-width:100%;" src="{{$first_left_ad->image}}" alt=""></a>
            @endif
            </div>

            <div class="col-md-8">
                <!-- Carousel row -->
                <div class="row">
                    
                    <div class="col-12" style="max-width: 1130px;width: auto;margin: auto;">
                        <div class="title py-3">
                            <h2>{{trans('lang.latest_videos')}}</h2>
                        </div>
                        <!-- Carousel -->
                        <div id="carousel-example" class="carousel slide">
                            <ol class="carousel-indicators">
                                @foreach($videos as $key=>$video)
                                <li data-target="#carousel-example" data-slide-to="{{$key}}" @if($key==0) class="active" @endif></li>
                                @endforeach
                            </ol>
                            <div class="carousel-inner">
                                @foreach($videos as $key => $video)
                                <div class="carousel-item @if($key==0) active @endif">
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item" src="{{$video->video}}" allowfullscreen></iframe>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#carousel-example" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carousel-example" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        <!-- End carousel -->
                    </div>
                </div>
                <!-- End carousel row -->
            </div>
            <div class="col-md-2 px-0 text-center d-md-block d-none">
            @if($first_right_ad && $first_right_ad->getOriginal('image'))
            <a href="{{$first_right_ad->link}}"><img style="margin-top: 122px;max-width:100%;" src="{{$first_right_ad->image}}" alt=""></a>
            @endif
            </div>
        </div>
    </div>
</section>
@endif

<!--    ===== Latest Ads =====-->
<!--    ===== Latest Ads =====-->
<section class="latest-prop py-5">
    <div class="container-fluid" style="position:relative">
        <div class="row">
            <div class="col-md-2 text-center d-md-block d-none">
                <div class="left-sekoseko" style="margin-top:72px;margin-bottom:1200px">
                @if($second_left_ad && $second_left_ad->getOriginal('image'))
                <a href="{{$second_left_ad->link}}"><img src="{{$second_left_ad->image}}" alt=""></a>
                @endif
                </div>
                <div class="left-sekoseko">
                @if($third_left_ad && $third_left_ad->getOriginal('image'))             
                <a href="{{$third_left_ad->link}}"><img src="{{$third_left_ad->image}}" alt=""></a>
                @endif
                </div>
            </div>

            <div class="col-md-8">
                <div class="title">
                    <h2 style="{{app()->getLocale()=='ar'?'text-align:right':''}}"><a style="color:#1c1d26;" href="{{route('user.search.ads',app()->getLocale())}}">{{trans('lang.Latest Ads')}}</a></h2>
                </div>

                <div class="row py-2">
                    @if(count($latest_ads)>0)
                    @foreach($latest_ads as $ad)
                    <div itemscope class="col-md-4 my-3 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                        <div class="card">
                            <span class="sale bg-danger">
                                @if(app()->getLocale()=='en') {{$ad->offer_type->title_en}} @else {{$ad->offer_type->title_ar}} @endif
                            </span>
                            @if(count($ad->images)>0)
                            <a title="{{$ad->title}}" href="{{route('user.ad.get',['id'=>$ad->id,'lang'=>app()->getLocale(),'ad_name'=>str_replace('+','-',urlencode(str_replace('/','',$ad->title)))])}}" class="card">
                            <img class="card-img-top" src="{{env('AWS_URL') .$ad->images[0]['image']}}" alt="{{$ad->title}}">
                            </a>
                            @endif
                            <div class="card-body">
                                <h3 class="text-secondary text-center m-0 h6"><a style="color: #343a40ba;" href="{{route('user.ad.get',['id'=>$ad->id,'lang'=>app()->getLocale(),'ad_name'=>str_replace('+','-',urlencode(str_replace('/','',$ad->title)))])}}">{{$ad->title}}</a></h3>
                            </div>
                            <div class="card-footer">
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
                    <div class="col-12 text-center ">
                        <a class="btn btn-primary my-3 px-5" href="{{ LaravelLocalization::getURLFromRouteNameTranslated( app()->getLocale() , 'routes.ads_search') }}">{{trans('lang.show_more_realstate')}}</a>
                    </div>
                    @else
                    <p>{{trans('lang.no ads')}}</p>
                    @endif
                </div>
            </div>

            <div class="col-md-2  text-center d-md-block d-none">
                <div class="right-sekoseko" style="margin-top:72px;margin-bottom:1200px">
                @if($second_right_ad && $second_right_ad->getOriginal('image'))
                <a href="{{$second_right_ad->link}}"><img src="{{$second_right_ad->image}}" alt=""></a>
                @endif
                </div>
                <div class="right-sekoseko" >
                @if($third_right_ad && $third_right_ad->getOriginal('image'))
                <a href="{{$third_right_ad->link}}"><img src="{{$third_right_ad->image}}" alt=""></a>
                @endif
                </div>
            </div>
        </div>
       
    </div>
</section>


<div class="middle-sekoseko">
@if($top_of_site_ad && $top_of_site_ad->getOriginal('image'))
<a href="{{$top_of_site_ad->link}}"><img src="{{$top_of_site_ad->image}}" alt=""></a>
@endif
</div>
<!--    ===== Projects =====-->
<!--    ===== Projects =====-->
<section class="projects py-5">
    <div class="container">
        <div class="title">
            <h2 style="{{app()->getLocale()=='ar'?'text-align:right':''}}"><a href="{{ route('user.search.projects',app()->getLocale()) }}">{{ trans('lang.Our Projects')}}</a></h2>
        </div>

        <div class="row">
            @if(count($projects)>0)
            @foreach($projects as $project)
            <div class="col-md-4 my-3 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                <a title="@if(app()->getLocale()=='en') {{$project->title_en}} @else {{$project->title_ar}} @endif" class="card" href="{{route('user.project.get',['lang'=>app()->getLocale(),'id'=>$project->id,'project_title'=>str_replace('+','-',urlencode(str_replace('/','',$project->title_en)))])}}">
                    <img class="card-img-top" src="{{env('AWS_URL') .$project->images()->first()->image}}" alt="@if(app()->getLocale()=='en') {{$project->title_en}} @else {{$project->title_ar}} @endif">
                    <div class="card-body">
                       @if(app()->getLocale()=='en') 
                        <h6 class="card-title text-dark m-0">
                            {{$project->title_en}} 
                            </h6>
                            @else 
                        <h6 class="card-title text-dark m-0 text-right">

                            {{$project->title_ar}} 
                        </h6>
                            @endif
                        
                    </div>
                    <div class="card-footer">
                        <small class="text-muted text-capitalize"><i class="fas fa-map-marker-alt"></i> @if($project->district_id)@if(app()->getLocale()=='en') {{$project->district->name_en}} @else {{$project->district->name_ar}} @endif @endif</small>
                    </div>
                </a>
            </div>
            @endforeach
            <div class="col-12 text-center">
                <a class="btn btn-primary my-3 px-5" href="{{ LaravelLocalization::getURLFromRouteNameTranslated( app()->getLocale() , 'routes.projects_search') }}">{{trans('lang.show_more_projects')}}</a>
             </div>
            @else
            <p>{{trans('lang.no projects')}}</p>
            @endif
        </div>
    </div>
</section>

    <div class="middle-sekoseko">
    @if($bottom_of_site_ad && $bottom_of_site_ad->getOriginal('image'))
    <a href="{{$bottom_of_site_ad->link}}"><img src="{{$bottom_of_site_ad->image}}" alt=""></a>
    @endif
    </div>
<!--=====Our Companies =====-->
<!--=====Our Companies =====-->
<section class="companies py-5">
    <div class="container">
        <div class="title">
            <h1>{{trans('lang.partners')}}</h1>
        </div>
        <div class="swiper-container py-3 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
            <div class="swiper-wrapper">
                @foreach($developers_section['developers'] as $key=>$developer)
                <div class="swiper-slide"><img src="{{ env('AWS_URL')  . $developer->image}}" alt="{{$developer->name}}"></div>
                @endforeach
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>
@endsection



