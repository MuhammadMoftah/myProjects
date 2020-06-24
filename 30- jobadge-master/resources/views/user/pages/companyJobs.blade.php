@extends('master')
@section('body')
<div class="container-blog-posts">
    <div class="blog-posts-header">
        <div class="container">
            <h2 class="section-title">Careers in <a style="color:#828128;" href="{{route('user.company.get',$company->slug)}}"><span>{{$company->name}}</span></a></h2>
        </div>
    </div>

    <div class="container-post-jobs">
        <div class="container">
            @include('layouts.message')
            <div class="post-job-list-view">
                @if(count($company_jobs)>0)
                @foreach($company_jobs as $job)
                <div class="list-view-item">
                    <div class="row align-items-center no-gutters">

                        <div class="col-12 col-md-5 col-xl-7">
                            <div class="item-post-job">
                                <img src="{{$job->company->getCompanyLogo()}}" alt="" class="item-logo">
                                <div class="item-post">
                                    <h4 class="post-name"><a href="{{route('user.get.job',$job->slug)}}">{{$job->title}}</a></h4>
                                    <span class="post-date">{{$job->created_at->diffForHumans()}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-7 col-xl-5">
                            <div class="row no-gutters">
                                <div class="col-12 col-md-5">
                                    <div class="item-position">
                                        <img src="{{ asset('site/images/icon/location.png')}}" class="mx-1" width="15" alt="">
                                        <span class="position-text">
                                            @if($job->city && $job->country)
                                            {{$job->city->name_en}},
                                            {{$job->country->name_en}}
                                            @else
                                            {{$job->company->city->name_en}},
                                            {{$job->company->country->name_en}}
                                            @endif
                                        </span>
                                    </div>
                                </div>

                                <div class="col-12 col-md-4">
                                    <div class="item-time-type">
                                        <img src="{{ asset('site/images/icon/time.png')}}" class="mx-1" width="18" alt="">
                                        <span class="type-text">{{$job->jobtype->name_en}}</span>
                                    </div>
                                </div>

                                <div class="col-12 col-md-3 text-sm-center text-md-right">
                                    <a href="{{route('user.get.job',$job->slug)}}" class="button-outline"><span>APPLY</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-12 col-md-6 offset-md-3 col-xl-4 offset-xl-4 text-center">
                    {{ $company_jobs->appends(getRequestBetweenPages())->render() }}
                </div>
            </div>
            @else
            <div class="col-12 col-md-6 offset-md-3 col-xl-6 offset-xl-4 text-center">
                No Open Vacancies at {{$company->name}}.
            </div>
            @endif
        </div>
    </div>

</div>
@endsection