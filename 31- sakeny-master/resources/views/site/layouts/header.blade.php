<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    @if(session('country_id')==1 && app()->getLocale()=='ar')
    <link rel="alternate" href="https://sakeny.com" hreflang="ar-eg" />
    @elseif(session('country_id')==1 && app()->getLocale()=='en')
    <link rel="alternate" href="https://sakeny.com" hreflang="en-eg" />
    @elseif(session('country_id')==2 && app()->getLocale()=='ar')
    <link rel="alternate" href="https://sakeny.com" hreflang="ar-sa" />
    @elseif(session('country_id')==2 && app()->getLocale()=='en')
    <link rel="alternate" href="https://sakeny.com" hreflang="en-sa" />
    @elseif(session('country_id')==3 && app()->getLocale()=='ar')
    <link rel="alternate" href="https://sakeny.com" hreflang="ar-ae" />
    @elseif(session('country_id')==3 && app()->getLocale()=='en')
    <link rel="alternate" href="https://sakeny.com" hreflang="en-ae" />
    @endif
    @include('site.layouts.googleAnalyticsCode')

    <meta http-equiv="X-UA-Compatible" content="IE=edge">


    @if( \Request::route()->getName() == 'user.project.get' && isset($project) )
    <meta name="description" content="
            @if(app()->getLocale()=='en')
                {{strip_tags($project->description_en) }}
           @else
                {{ strip_tags($project->description_ar)}}
           @endif">

    @elseif( \Request::route()->getName() == 'user.ad.get' && isset($ad) )
    <meta name="description" content="{{strip_tags($ad->description)}}" />
    @elseif(isset($pageMetaDescription))
    <meta name="description" content="{{$pageMetaDescription}}">
    @else
    <meta name="description" content="{{trans('lang.meta_description')}} @if(app()->getLocale()=='en') {{$setting->description_en}} @else {{$setting->description_ar}} @endif">
    @endif

    <meta name="keywords" content="{{trans('lang.meta_keywords')}} @if(app()->getLocale()=='en') {{$setting->keywords_en}} @else {{$setting->keywords_ar}} @endif">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/css/swiper.min.css" integrity="sha256-XwfUNXGiAjWyUGBhyXKdkRedMrizx1Ejqo/NReYNdUE=" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{url('site')}}/css/bootstrap.min.css?rand=5000">
    <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css" integrity="sha256-HtCCUh9Hkh//8U1OwcbD8epVEUdBvuI8wj1KtqMhNkI=" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{url('site')}}/css/index.min.css?rand=4000">
    @yield('styles')
    @if(app()->getLocale()=='ar')
    <link rel="stylesheet" href="{{url('site')}}/css/rtl.min.css?rand=4000">
    @endif
    <title>{{$title}}</title>

    @include('site.layouts.FBPixelCode')
    <meta name="ahrefs-site-verification" content="25e782f7f534f2ecb46f7a284a53f30f1b98728bd45367f659f21ade55c1854e">
</head>

<body>
    <!-- Google Tag Manager (noscript) -->

    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P2K2TF8" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <!--===== NavBar =====-->
    <!--===== NavBar =====-->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="{{route('user.index')}}"><img src="{{url('site')}}/icons/logo-sakenypng.png" alt=""></a>
        <a href="#" class="a-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </a>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNavAltMarkup">
            <div class="navbar-nav">


                <a class="nav-item nav-link active" title="{{trans('lang.Home Page')}}" href="{{route('user.index')}}">{{trans('lang.Home Page')}}</a>


                {{-- <a class="nav-item nav-link active" title="{{trans('lang.prop_for_sale')}}" href="{{route('user.sales',app()->getLocale())}}">{{trans('lang.prop_for_sale')}}</a> --}}
                {{-- <a class="nav-item nav-link active" title="{{trans('lang.prop_for_rent')}}" href="{{route('user.rent',app()->getLocale())}}">{{trans('lang.prop_for_rent')}}</a> --}}
                {{-- <a class="nav-item nav-link active" title="{{trans('lang.Newest projects')}}" href="{{route('user.search.projects',app()->getLocale())}}">{{trans('lang.Newest projects')}}</a> --}}

                <a class="nav-item nav-link active" title="{{trans('lang.prop_for_rent_link')}}" href="{{ LaravelLocalization::getURLFromRouteNameTranslated( app()->getLocale() , 'routes.properties_for_rent') }}">{{trans('lang.prop_for_rent_link')}}</a>

                <a class="nav-item nav-link active" title="{{trans('lang.prop_for_sale_link')}}" href="{{ LaravelLocalization::getURLFromRouteNameTranslated( app()->getLocale() , 'routes.properties_for_sale') }}">{{trans('lang.prop_for_sale_link')}}</a>

                <a class="nav-item nav-link active" title="{{trans('lang.Newest projects')}}" href="{{ LaravelLocalization::getURLFromRouteNameTranslated( app()->getLocale() , 'routes.projects_search') }}">{{trans('lang.Newest projects')}}</a>

                {{-- <a class="nav-item nav-link" title="{{trans('lang.About Us')}}" href="{{route('user.aboutus',app()->getLocale())}}">{{trans('lang.About Us')}}</a> --}}

                <a class="nav-item nav-link" title="{{trans('lang.About Us')}}" href="{{ LaravelLocalization::getURLFromRouteNameTranslated(app()->getLocale() , 'routes.aboutus') }}">{{trans('lang.About Us')}}</a>

                <a class="nav-item nav-link active" title="{{trans('lang.Home Page')}}" href="{{ LaravelLocalization::getURLFromRouteNameTranslated( app()->getLocale() , 'routes.contact_us') }}">{{trans('lang.Contactus')}}</a>


                @if(!auth()->guard('user')->check())
                {{-- <a class="nav-item nav-link" title="{{trans('lang.company registeration')}}" href="{{route('company.register.get',app()->getLocale())}}">{{trans('lang.company registeration')}}</a> --}}
                <a class="nav-item nav-link" title="{{trans('lang.company registeration')}}" href="{{ LaravelLocalization::getURLFromRouteNameTranslated(app()->getLocale() , 'routes.company_registertion') }}">{{trans('lang.company registeration')}}</a>
                @endif
                <div class="nav-item nav-link dropdown country p-1">
                    @if(session('country_id')==1)
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{env('AWS_URL') .$countries[0]['image']}}" alt=""> @if(app()->getLocale()=='en')
                        {{$countries[0]['name_en']}} @else {{$countries[0]['name_ar']}} @endif
                    </a>
                    @elseif(session('country_id')==2)
                    <a class=" dropdown-toggle " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{env('AWS_URL') .$countries[1]['image']}}" alt=""> @if(app()->getLocale()=='en')
                        {{$countries[1]['name_en']}} @else {{$countries[1]['name_ar']}} @endif
                    </a>
                    @else
                    <a class=" dropdown-toggle " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{env('AWS_URL') .$countries[2]['image']}}" alt=""> @if(app()->getLocale()=='en')
                        {{$countries[2]['name_en']}} @else {{$countries[2]['name_ar']}} @endif
                    </a>
                    @endif
                    <div class="dropdown-menu bg-secondary" aria-labelledby="dropdownMenuLink">
                        @foreach($countries as $country)
                        <a class="dropdown-item text-body py-2" href="{{route('country.change',$country->id)}}"><img src="{{env('AWS_URL') .$country->image}}" alt=""> @if(app()->getLocale()=='en')
                            {{$country->name_en}} @else {{$country->name_ar}} @endif</a>
                        @endforeach
                        <!-- <a class="dropdown-item text-body py-2" href="#"><img src="{{url('site')}}/icons/uae.png" alt=""> UAE</a> -->
                    </div>
                </div>
                @if(app()->getLocale()=='en')
                <a class="nav-item nav-link" href="{{route('user.change.lang','ar')}}">عربي</a>
                @else
                <a class="nav-item nav-link" href="{{route('user.change.lang','en')}}">English</a>
                @endif
                @if(auth()->guard('user')->check() && auth()->guard('user')->user()->activation==1)
                @if(auth()->guard('user')->user()->type==1)
                <a class="nav-item nav-link" title="{{trans('lang.Add_ad')}}" href="{{route('user.ad.create',app()->getLocale())}}">{{trans('lang.Add_ad')}}</a>
                @endif
                @if(auth()->guard('user')->user()->type==1)
                <div class="nav-item nav-link dropdown country p-1">
                    <a class=" dropdown-toggle " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{env('AWS_URL') .auth()->guard('user')->user()->image}}" style="width: 30px;height: 30px;border-radius: 50%;" alt="">
                        {{auth()->guard('user')->user()->name}}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="nav-item nav-link" title="{{trans('lang.profile')}}" href="{{route('user.profile.get',app()->getLocale())}}">{{trans('lang.profile')}}</a>
                        <a class="nav-item nav-link" title="{{trans('lang.get_saved')}}" href="{{route('user.get.saved',app()->getLocale())}}">{{trans('lang.get_saved')}}</a>
                        <a class="nav-item nav-link" title="{{trans('lang.my_ads')}}" href="{{route('user.my.ads',app()->getLocale())}}">{{trans('lang.my_ads')}}</a>
                        <a class="nav-item nav-link" title="{{trans('lang.expired_ads')}}" href="{{route('user.my.expired',app()->getLocale())}}">{{trans('lang.expired_ads')}}</a>
                        <a class="nav-item nav-link" title="{{trans('lang.comparing')}}" href="{{route('user.my.comparing',app()->getLocale())}}">{{trans('lang.comparing')}}</a>
                        <a class="nav-item nav-link" title="{{trans('lang.messaging')}}" href="{{route('user.my.inbox',app()->getLocale())}}">{{trans('lang.messaging')}}
                            @if($messages_count>0)
                            <span class="badge badge-danger">{{$messages_count}}</span>
                            @endif
                        </a>
                        <a title="{{trans('lang.history')}}" class="nav-item nav-link" href="{{route('user.history',app()->getLocale())}}">{{trans('lang.history')}}</a>
                    </div>
                </div>
                @endif
                @if(auth()->guard('user')->user()->type==2)
                <a class="nav-item nav-link" title="{{trans('lang.Add_ad')}}" href="{{route('company.ad.create.get',app()->getLocale())}}">{{trans('lang.Add_ad')}}</a>
                @endif
                @if(auth()->guard('user')->user()->type==2)
                <div class="nav-item nav-link dropdown country p-1">
                    <a class=" dropdown-toggle " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{env('AWS_URL') .auth()->guard('user')->user()->image}}" style="width: 30px;height: 30px;border-radius: 50%;" alt="">
                        {{auth()->guard('user')->user()->name}}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="nav-item nav-link" title="{{trans('lang.profile')}}" href="{{route('company.profile.get',app()->getLocale())}}">{{trans('lang.profile')}}</a>
                        <a class="nav-item nav-link" title="{{trans('lang.dashboard')}}" href="{{route('company.dashboard',app()->getLocale())}}">{{trans('lang.dashboard')}}</a>
                        <a class="nav-item nav-link" title="{{trans('lang.messaging')}}" href="{{route('company.my.inbox',app()->getLocale())}}">{{trans('lang.messaging')}}
                            @if($messages_count>0)
                            <span class="badge badge-danger">{{$messages_count}}</span>
                            @endif
                        </a>
                    </div>
                </div>
                @endif

                @if(auth()->guard('user')->user()->type==3)
                <div class="nav-item nav-link dropdown country p-1">
                    <a class=" dropdown-toggle " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{env('AWS_URL') .auth()->guard('user')->user()->image}}" style="width: 30px;height: 30px;border-radius: 50%;" alt="">
                        {{auth()->guard('user')->user()->name}}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="nav-item nav-link" title="{{trans('lang.my_ads')}}" href="{{route('agent.my.ads',app()->getLocale())}}">{{trans('lang.my_ads')}}</a>
                        <a class="nav-item nav-link" title="{{trans('lang.messaging')}}" href="{{route('agent.my.inbox',app()->getLocale())}}">{{trans('lang.messaging')}}
                            @if($messages_count>0)
                            <span class="badge badge-danger">{{$messages_count}}</span>
                            @endif
                        </a>
                    </div>
                </div>
                @endif
                <a class="nav-item nav-link btn btn-dark mx-1" title="{{trans('lang.logout')}}" style="text-decoration: none" href="{{route('user.logout')}}">{{trans('lang.logout')}}
                </a>
                @else




                {{-- <a class="nav-item nav-link btn btn-dark mx-1" title="{{trans('lang.login')}}" style="text-decoration: none" href="{{route('user.login.get',app()->getLocale())}}">{{trans('lang.login')}}</a> --}}

                <a class="nav-item nav-link btn btn-dark mx-1" title="{{trans('lang.login')}}" style="text-decoration: none" href="{{ LaravelLocalization::getURLFromRouteNameTranslated( app()->getLocale() , 'routes.user_login') }}">{{trans('lang.login')}}</a>


                {{-- <a class="nav-item nav-link btn btn-outline-dark" title="{{trans('lang.register')}}" style="text-decoration: none" href="{{route('user.register.get',app()->getLocale())}}">{{trans('lang.register')}}</a> --}}
                <a class="nav-item nav-link btn btn-outline-dark" title="{{trans('lang.register')}}" style="text-decoration: none" href="{{ LaravelLocalization::getURLFromRouteNameTranslated( app()->getLocale() , 'routes.user_register') }}">{{trans('lang.register')}}</a>


                @endif


                @if( !auth()->guard('user')->check() )
                <a class="nav-item nav-link btn btn-success" style="text-decoration: none" href="{{ LaravelLocalization::getURLFromRouteNameTranslated( app()->getLocale() , 'routes.user_login') }}">
                    <i class="fas fa-plus-circle"></i> {{trans('lang.Add_ad')}} </a>
                @endif
            </div>
        </div>
        <!--===== Loading Screen =====-->
        <!--===== Loading Screen =====-->

        <div id="preloader">
            <div id="loader"></div>
            <div class="container">
                <h4 class="text-center text-danger mt-5">{{trans('lang.preparing_ad')}}</h4>
            </div>
        </div>

        <div id="added_success">
            <div class="container">
                <div class="alert alert-success text-center" style="margin-top:20%" role="alert">
                    <p>{{trans('lang.ad_added_successfully')}}</p>
                    <button class="btn btn-secondary justify-content-end mx-1 back_btn">{{trans('lang.back')}}</button>
                    <a href="{{route('user.index',app()->getLocale())}}" class="btn btn-success justify-content-end mx-1">{{trans('lang.home')}}</a>
                </div>
            </div>
        </div>

        <div id="edited_success">
            <div class="container">
                <div class="alert alert-success text-center" style="margin-top:20%" role="alert">
                    <p>{{trans('lang.ad_edited_successfully')}}</p>
                    <button class="btn btn-secondary justify-content-end mx-1 back_btn">{{trans('lang.back')}}</button>
                    <a href="{{route('user.index',app()->getLocale())}}" class="btn btn-success justify-content-end mx-1">{{trans('lang.home')}}</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Add-phone-modal -->
    <div class="fade modal" id="assign-phone-modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">{{trans('lang.assign_phone')}}</h4>
                </div>
                <form action="{{route('user.assign.phone')}}" method="POST" class="form-row">
                    <!-- Modal body -->
                    <div class="modal-body row">
                        {{ csrf_field() }}
                        <input type="hidden" name="type" value="assign_phone" />
                        <div style="@if(app()->getLocale()=='ar') text-align:right @endif" class="form-group  col-md-6" data-wow-duration="1s">
                            <!-- <label for="exampleCompanyName">*
                                {{trans('lang.phone')}}</label> -->
                            <input value="{{old('phone')}}" type="text" name="phone" class="form-control {{ $errors->has('phone') && old('type')=='assign_phone' ? 'is-invalid' : ''}}" id="exampleCompanyName" placeholder="{{trans('lang.phone')}}">
                            @if(old('type')=='assign_phone'){!! $errors->first('phone', '<div class="invalid-feedback">:message</div>') !!}@endif
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <input type="submit" title="{{trans('lang.add')}}" class="btn btn-primary px-5" value="{{trans('lang.add')}}">
                    </div>
                </form>
            </div>
        </div>
    </div>

        <!-- Add-phone-modal -->
        <div class="fade modal" id="assign-phone-success">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">{{trans('lang.assign_phone_success')}}</h4>
                </div>
            </div>
        </div>
    </div>
