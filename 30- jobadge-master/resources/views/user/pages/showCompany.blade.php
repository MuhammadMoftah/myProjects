@extends('master')
@section('styles')
<!-- Facebook Cards -->
<meta property="og:title" content='{{$company->name}}'>
<meta property="og:image" content="{{$company->getCompanyLogo()}}">
<meta propert="og:description" content="{{$company->description}}">
<!-- Twitter Cards -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@">
<meta name="twitter:title" content='{{$company->name}}'>
<meta name="twitter:image" content="{{$company->getCompanyLogo()}}">
@endsection
@section('body')
<section class="user-profile company-profile p-5">
    <div class="container">
        <div class="user-info bg-white rounded">
            <div class="row mx-0">
                <div class="col-md-6 text-center add-border">
                    <img src="{{$company->getCompanyLogo()}}" class="rounded-circle" alt="Careers at {{$company->name}} | Jobadge">
                    <div>
                        <h1 class="font-weight-bold" style="font-size:20px;">Jobs and Careers at <span class="text-primary" style="font-size:20px">{{$company->name}}</span></h1>
                        <h6>{{$company->industry->name_en}}</h6>
                        <p class="text-muted">{{$company->city->name_en}}, {{$company->country->name_en}}</p>
                        @if($company->address)<p class="text-muted">{{$company->address}}</p>@endif
                    </div>
                </div>

                <div class="col-md-6 text-center">
                    <h5 class="card-title pt-3">Company Info</h5>
                    <ul class="list-unstyled">
                        <li class="text-muted"><i class="bg-danger text-white rounded p-1 my-1  fas fa-globe-americas"></i> <a target="_blank" href="{{$company->getUrlAtrribute()}}" rel="nofollow">{{$company->URL}}</a></li>
                        <li class="text-muted"><i class="bg-info text-white rounded p-1 my-1  fas fa-users"></i> {{$company->size->from}}-{{$company->size->to}} employees</li>
                    </ul>

                    <h5 class="card-title">Share Company</h5>
                    <div class=" social-login pb-5">
                        <a class="facebook" href="{{route('user.company.share',['id'=>$company->id,'provider'=>'facebook'])}}">
                            <fa name="facebook"><i aria-hidden="true" class="fab fa-facebook-f"></i></fa>
                        </a>
                        <a class="twitter" href="{{route('user.company.share',['id'=>$company->id,'provider'=>'twitter'])}}">
                            <fa name="twitter"><i aria-hidden="true" class="fab fa-twitter"></i></fa>
                        </a>
                        <a class="linked" href="{{route('user.company.share',['id'=>$company->id,'provider'=>'linkedin'])}}">
                            <fa name="linkedin"><i aria-hidden="true" class="fab fa-linkedin-in"></i></fa>
                        </a>
                        <a class="linked" href="{{route('user.company.share',['id'=>$company->id,'provider'=>'tumblr'])}}">
                            <fa name="tumblr"><i aria-hidden="true" class="fab fa-tumblr"></i></fa>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="part bg-white rounded my-3">
                    <div class="part-title py-3">
                        <h5 class="font-weight-bold"><i class="fas fa-info-circle"></i> Company info</h5>
                    </div>
                    <div class="row">
                        <div class="col-md-12 part-body rounded my-2">
                            {{$company->description}}
                        </div>
                    </div>
                </div>
            </div>
            @if($company->video)
            <div class="col-md-12">
                <div class="part bg-white rounded my-3">
                    <div class="part-title py-3">
                        <h5 class="font-weight-bold"><i class="fas fa-video"></i> video</h5>
                    </div>
                    <div>
                        <video width="100%" height="300" controls>
                            <source src="{{$company->getCompanyVideo()}}" type="video/mp4">
                        </video>
                    </div>
                </div>
            </div>
            @endif
            @if(count($company->partners)>0)
                <!-- Partners' Logos -->
                <div class="container-our-partner">
                    <div class="container">
                        <h3 class="section-title">OUR <span>PARTNERS</span></h3>
                        <div class="row justify-content-center align-items-center">
                            @foreach($company->partners as $partner)
                            <div class="col-4 col-md-2 text-center">
                                <a href="#" title="" class="our-partner-logo">
                                    <img src="{{$partner->getPartnerLogo()}}" alt="Careers at {{$company->name}} | Jobadge">
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            <div class="col-md-12">
                <div class="part bg-white rounded my-3">
                    <div class="part-title py-3">
                        <h5 class="font-weight-bold"><i class="fas fa-briefcase"></i> Open Vacancies at {{$company->name}}</h5>
                    </div>
                    <div class="row">
                        <div class="col-md-12 part-body rounded my-2">
                            <div class="container-post-jobs p-0 bg-white">
                                <div class="post-job-list-view">
                                    @if(count($latest_jobs)>0)
                                    @foreach($latest_jobs as $job)
                                    <div class="list-view-item">
                                        <div class="row align-items-center no-gutters">
                                            <div class="col-md-6">
                                                <div class="item-post-job">
                                                    <img src="{{$job->company->getCompanyLogo()}}" alt="Careers at {{$company->name}} | Jobadge" class="item-logo">
                                                    <div class="item-post">
                                                        <h4 class="post-name"><a href="{{route('user.company.get.jobs',$company->slug)}}">{{$job->title}}</a></h4>
                                                        <span class="post-date">{{$job->created_at->diffForHumans()}}</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="row no-gutters">
                                                    <div class="col-12 col-md-5">
                                                        <div class="item-position">
                                                            <img src="{{ asset('site/images/icon/location.png')}}" class="mx-1" width="15" alt="">
                                                            <span class="position-text">{{$job->company->city->name_en}}</span>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-4">
                                                        <div class="item-time-type">
                                                            <img src="{{ asset('site/images/icon/time.png')}}" class="mx-1" width="18" alt="">
                                                            <span class="type-text">{{$job->jobtype->name_en}}</span>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-3 text-sm-center text-md-right">
                                                        <a href="{{route('user.company.get.jobs',$company->slug)}}" class="button-outline"><span>Apply</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    <div class="row">
                                        <div class="col-12 col-md-6 col-xl-12 text-center">
                                            <a href="{{route('user.company.get.jobs',$company->slug)}}" class="button-fill awesome-company-more">View All Open Vacancies</a>
                                        </div>
                                    </div>
                                    @else
                                    <div class="row py-2">
                                        <div class="col-12 col-md-6 col-xl-12 text-center">
                                            <p>No Open Vacancies</p>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</section>
@endsection