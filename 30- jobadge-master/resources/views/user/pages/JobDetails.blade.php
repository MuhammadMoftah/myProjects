@extends('master')
@section('styles')
<meta property="og:title" content='{{$job->title}}'>
<meta property="og:image" content="{{$job->confidential==0?$job->company->getCompanyLogo():$job->company->getCompanyDefaultLogo()}}">
<meta propert="og:description" content="{{  preg_replace("/&#?[a-z0-9]{2,8};/i","",strip_tags($job->description))   }}">
<!-- Twitter Cards -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@">
<meta name="twitter:title" content='{{$job->title}}'>
<meta name="twitter:image" content="{{$job->company->getCompanyLogo()}}">
@endsection
@section('body')
<div class="container-job" style="padding-bottom:15px;">
    <div class="job-header">
        <div class="container">
            <div class="row align-items-end no-gutters">
                <div class="col-12 col-md-7 col-lg-8">

                    <h1 class="header-title"> 
                        {{-- <span class="title-job-post" style="display:inline; !important">{{$job->title}} </span>  --}}
                        {{-- <span class="title-company" style="display:inline; !important">  
                            @if($job->confidential==0)
                            - at 
                            <a style="color:#00a8ff;" href="{{route('user.company.get',$job->company->slug)}}">{{$job->company->name}}</a>
                            {{-- @else
                            Confidential --}}
                            {{-- @endif  --}}
                        {{-- <span> --}}  
                           
                        @if($job->confidential==0)<span class="title-company mb-0"><a href="{{route('user.company.get' , ['slug' => $job->company->slug])}}">{{$job->company->name}}</a> is hiring a</span>@endif
                    <h1 class="header-title">
                        <span class="title-job-post" style="display:inline; !important">{{$job->title}} </span>      
                    </h1>

                    <div class="header-detail-info mb-1">
                        <img src="{{ asset('site/images/icon/location.png')}}" class="mx-1" width="15" alt="">
                        @if($job->city && $job->country)
                        <span class="detail-info-title">{{$job->city->name_en}}, {{$job->country->name_en}}</span>
                        @else
                           <span class="detail-info-title">{{$job->company->city->name_en}}, {{$job->company->country->name_en}}</span>
                        @endif
                    </div>

                    <div class="header-detail-info">
                    <img src="{{ asset('site/images/icon/time.png')}}" class="mx-1" width="18" alt="">
                        <span class="detail-info-title">{{$job->jobtype->name_en}}</span>
                    </div>

                    <div class="header-detail-info">
                    <img src="{{ asset('site/images/icon/time.png')}}" class="mx-1" width="18" alt="">
                        <span class="detail-info-title">{{$job->joblevel->name_en}}</span>
                    </div>

                    <div class="header-detail-info">
                        <img src="{{ asset('site/images/icon/gander.png')}}" class="mx-1" width="18" alt="">
                            <span class="detail-info-title">{{$job->gender}}</span>
                        </div>

                    <div class="header-detail-info">
                        <img src="{{ asset('site/images/icon/time.png')}}" class="mx-1" width="18" alt="">
                        <span class="detail-info-title">{{$job->created_at->diffForHumans()}}</span>
                    </div>

                </div>
                @if(!auth()->guard('company')->check())
                @if(auth()->guard('user')->check() && auth()->guard('user')->user()->isActivated())
                @if(auth()->guard('user')->user()->isApplied($job->id))
                <div class="content-margin-top">
                    <a href="javascript:;" title="" class=" btn-secondary disabled job-apply rounded ">APPLIED</a>
                </div>
                @else
                <div class="col-12 col-md-5 col-lg-4 text-md-right">
                    <a href="{{route('user.apply',$job->id)}}" title="" class="button-fill job-apply">APPLY NOW</a>
                </div>
                @endif
                @else
                <div class="col-12 col-md-5 col-lg-4 text-md-right">
                    <a href="{{route('user.apply',$job->id)}}" title="" class="button-fill job-apply">APPLY NOW</a>
                </div>
                @endif
                @endif


            </div>
        </div>
    </div>

    <div class="container">
        @include('layouts.message')
        @include('layouts.errors')
        <div class="row jobdetails-row">
            <div class="col-12 col-md-8">
                <div class="job-content">
                    <h3 class="section-title job-content-title">JOB <span>DESCRIPTION</span></h3>
                    <p>{!! $job->description !!}</p>

                    <h4>Requirements</h4>
                    <p>{!! $job->job_requirement !!}</p>

                    <h4>Benefits</h4>
                    <p>{!! $job->benefits !!}</p>
                     
                   

                    <h4>Skills</h4>
                    <p>{!! $job->skills !!}</p>

                    @if($job->KPI)
                    <h4>KPIS</h4>
                    <p>{!! $job->KPI !!}</p>
                    @endif

                    @if($job->job_location)
                    <h4>Description Job Location</h4>
                    <p>{!! $job->job_location !!}</p>
                    @endif

                    @if(!auth()->guard('company')->check())
                    @if(auth()->guard('user')->check() && auth()->guard('user')->user()->isActivated())
                    @if(auth()->guard('user')->user()->isApplied($job->id))
                    <div class="content-margin-top">
                        <!-- <a href="#" title="" class=" button-outline like-button"><span class="icon icon-dislike hovered"></span></a> -->
                        <a href="javascript:;" title="" class=" btn-secondary disabled job-apply rounded ">APPLIED</a>
                    </div>
                    @else
                    <div class="content-margin-top">
                        <!-- <a href="#" title="" class="button-outline like-button"><span class="icon icon-dislike"></span></a> -->
                        <a href="{{route('user.apply',$job->id)}}" title="" class="button-fill job-apply rounded">APPLY NOW</a>
                    </div>
                    @endif
                    @else
                    <div class="content-margin-top">
                        <!-- <a href="#" title="" class="button-outline like-button"><span class="icon icon-dislike"></span></a> -->
                        <a href="{{route('user.apply',$job->id)}}" title="" class="button-fill job-apply rounded">APPLY NOW</a>
                    </div>
                    @endif
                    @endif


                    <div class="mt-4">         
                        @if($job->confidential==0)
                        
                        <a style="color:#00a8ff;" href="{{route('user.company.get.jobs',$job->company->slug)}}">Show all available Jobs at  {{$job->company->name}}</a>
                        {{-- @else
                        Confidential --}}
                        @endif
                    </div>
 
                </div>

            </div>
            <div class="col-12 col-md-4">
                    
                <div class="job-detail-info">
                    <div class="info-item">
                        <h5 class="item-title">JOB CATEGORY</h5>
                        @if($job->category->slug)
                        <span class="item-desc"><a href="{{route('user.category.get.jobs',$job->category->slug)}}" title="">{{$job->category->name_en}}</a></span>
                        @else
                            ----- 
                        @endif
                    </div>
                    <div class="info-item">
                        <h5 class="item-title">Experience Years</h5>
                        <span class="item-desc">{{$job->experience_years}}</span>
                    </div>
                    <div class="info-item">
                        <h5 class="item-title">Education Level</h5>
                        <span class="item-desc">{{$job->education_level}}</span>
                    </div>
                    <div class="info-item">
                        <h5 class="item-title">Vacancies</h5>
                        <span class="item-desc">{{$job->vacancies}}</span>
                    </div>

                    <div class="info-item">
                        <h5 class="item-title">Gender</h5>
                        <span class="item-desc">{{$job->gender}}</span>
                    </div>

                    <div class="info-item">
                        <h5 class="item-title">POSTED ON</h5>
                        <span class="item-desc">{{$job->created_at}}</span>
                    </div>
                    <div class="info-item">
                        <h5 class="item-title">Applicants</h5>
                        <span class="item-desc">{{$job->job_users->count()}}</span>
                    </div>
                    <div class="info-item">
                        <h5 class="item-title">Salary</h5>
                        <span class="item-desc">
                            @if($job->salary_hidden==1)
                            confidential
                            @else
                            {{$job->salary_from}} - {{$job->salary_to}} {{$job->salary_period}}
                            @endif
                        </span>
                    </div>
                    @if($job->travel_frequency && $job->travel_frequency != "none")
                    <div class="info-item">
                        <h5 class="item-title">Travel Frequency </h5>
                        <span class="item-desc">{{$job->travel_frequency}}</span>
                    </div>
                    @endif
                    <br><br>
                        <h5 class="card-title text-center">Share</h5>
                        <div class=" social-login pb-5" style="text-align:center;">
                            <a class="facebook" href="{{route('user.job.share',['id'=>$job->id,'provider'=>'facebook'])}}">
                                <fa name="facebook"><i aria-hidden="true" class="fab fa-facebook-f"></i></fa>
                            </a>
                            <a class="twitter" href="{{route('user.job.share',['id'=>$job->id,'provider'=>'twitter'])}}">
                                <fa name="twitter"><i aria-hidden="true" class="fab fa-twitter"></i></fa>
                            </a>
                            <a class="linked" href="{{route('user.job.share',['id'=>$job->id,'provider'=>'linkedin'])}}">
                                <fa name="linkedin"><i aria-hidden="true" class="fab fa-linkedin-in"></i></fa>
                            </a>
                            <a class="linked" href="{{route('user.job.share',['id'=>$job->id,'provider'=>'tumblr'])}}">
                                <fa name="tumblr"><i aria-hidden="true" class="fab fa-tumblr"></i></fa>
                            </a>
                        </div>
                </div> 
                <div class="job-company-info"> 
                    <div class="company-info-img">
                        @if($job->confidential==0)
                        <img src="{{$job->company->getCompanyLogo()}}" alt=" Careers at {{$job->company->name}} | Jobadge " class="info-img">
                        @else
                        <img src="{{$job->company->getCompanyDefaultLogo()}}" alt="Careers at {{$job->company->name}} | Jobadge" class="info-img">
                        @endif
                    </div> 
                    <div class="company-info-detail">
                        <h3 class="info-company-name">
                        @if($job->confidential==0)
                        <a style="color: #706e52;" href="{{route('user.company.get.jobs',$job->company->slug)}}">{{$job->company->name}}</a>
                        @else
                        Confidential
                        @endif
                        </h3>
                        <div class="info-company-position">{{$job->company->city->name_en}}, {{$job->company->country->name_en}}</div>
                        @if($job->confidential==0)
                        <div><a href="{{$job->company->getUrlAtrribute()}}" target="_blank" class="info-company-link">Visit Website</a></div>
                        <a href="{{route('user.company.get.jobs',$job->company->slug)}}" title="" class="info-company-button">{{$job->company->getOpenPositions->count()}} open positions</a>
                        @endif
                    </div>  
                </div> 
            </div>
        </div>
    </div>
</div>

<div class="container-post-jobs post-jobs-related py-5">
    <div class="container">
        <h6 class="section-title text-left">RELATED <span>JOBS</span></h6>

        <div class="post-job-list-view">
            @foreach($related_jobs as $one_job)
            <div class="list-view-item">
                <div class="row align-items-center no-gutters">

                    <div class="col-12 col-md-5 col-xl-7">
                        <div class="item-post-job">
                            @if($one_job->confidential==0)
                            <img src="{{$one_job->company->getCompanyLogo()}}" alt="Careers at {{$one_job->company->name}} | Jobadge " class="item-logo">
                            @else
                            <img src="{{$one_job->company->getCompanyDefaultLogo()}}" alt="Careers at {{$one_job->company->name}} | Jobadge" class="item-logo">
                            @endif                            
                            <div class="item-post">
                                <h4 class="post-name"><a href="{{route('user.get.job',$one_job->slug)}}">{{$one_job->title}}</a></h4>
                                @if($one_job->confidential==0)
                                <a style="display: block; color: #706e52;" href="{{route('user.company.get',$one_job->company->slug)}}">{{$one_job->company->name}}</a>
                                @else
                                <span style="display:block; color: #706e52;">Confidential</span>
                                @endif
                                <span class="post-date">{{$one_job->created_at->diffForHumans()}}</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-7 col-xl-5">
                        <div class="row no-gutters">
                            <div class="col-12 col-md-5">
                                <div class="item-position">
                                    <img src="{{ asset('site/images/icon/location.png')}}" class="mx-1" width="15" alt="">
                                    <span class="position-text">{{$one_job->company->city->name_en}}, {{$one_job->company->country->name_en}}</span>
                                </div>
                            </div>

                            <div class="col-12 col-md-4">
                                <div class="item-time-type">
                                    <img src="{{ asset('site/images/icon/time.png')}}" class="mx-1" width="18" alt="">
                                    <span class="type-text">{{$one_job->jobtype->name_en}}</span>
                                </div>
                            </div>

                            <div class="col-12 col-md-3 text-sm-center text-md-right">
                                <a href="{{route('user.get.job',$one_job->slug)}}" class="button-outline"><span>Details</span></a>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
    
@endsection
@section('scripts')
{{-- sweetalert --}}
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
@if (Session::has('success'))
<script>
    Swal.fire({
            position: 'center',
            type: 'success',
            title: 'Complete your profile Now to be one of the first 3000 full profiles and get a premium reach to recruiters',
            timer: 999999,
            confirmButtonText: '<a href="{{ route("user.profile") }}" style="color:white">Complete yours NOW !</a>',
            showLoaderOnConfirm: true,
            confirmButtonColor: '#21d5de'
        });
</script>
@endif

@endsection