@extends('master')
@section('body')
<!--===== Application Status =====-->
<!--===== Application Status =====-->
<div class="container-blog-posts">
    <div class="blog-posts-header">
        <div class="container">
            <h2 class="section-title"><span>{{count($applications)}} Submitted Jobs</span></h2>
        </div>
    </div>

    <div class="application">
        <div class="container-post-jobs">
            <div class="container">

                <div class="post-job-grid-view" style="display: block;">
                    <div class="row">
                        @if(count($applications)>0)
                        <div class="row">
                        @foreach($applications as $application)
                        <div class="col-12 col-md-6 col-xl-4">
                            <div class="grid-view-item">
                                <img src="{{$application->job->confidential == 0 ? $application->job->company->getCompanyLogo() : $application->job->company->getCompanyDefaultLogo() }}" alt="{{$application->job->company->name}}" class="item-img">
                                <div class="item-date">{{$application->created_at->diffForHumans()}}</div>
                                <h4 class="item-post-title"><a href="{{route('user.get.job',$application->job->slug)}}">{{$application->job->title}}</a></h4>
                                <h5 class="item-company-name">{{$application->job->confidential == 0 ? $application->job->company->name : 'confidential'}}</h5>
                                <div class="row">
                                    <div class="col-md-8 offset-md-3">
                                        <ul class="timeline">
                                            @if($application->view_state && !$application->qualified_state && !$application->reject_state && !$application->shortlist_state)
                                            <li>
                                                <p class="text-primary">Viewed</p>
                                                <small class="text-muted">{{\Carbon\Carbon::parse($application->view_state)->diffForHumans()}}</small>
                                            </li>
                                            @elseif($application->shortlist_state)
                                            <li>
                                                <p class="text-primary">Shortlisted</p>
                                                <small class="text-muted">{{\Carbon\Carbon::parse($application->shortlist_state)->diffForHumans()}}</small>
                                            </li>
                                            @elseif($application->reject_state)
                                            <li>
                                                <p class="text-danger">Rejected - {{$application->reason}}</p>
                                                <small class="text-muted">{{\Carbon\Carbon::parse($application->reject_state)->diffForHumans()}}</small>
                                            </li>
                                            @elseif($application->qualified_state)
                                            <li>
                                                <p class="text-success">Qualified</p>
                                                <small class="text-muted">{{\Carbon\Carbon::parse($application->qualified_state)->diffForHumans()}}</small>
                                            </li>
                                            @else
                                            <li>
                                                <p class="text-success">not viewed yet</p>
                                                <small class="text-muted"></small>
                                            </li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                                <div class="row no-gutters">
                                    <div class="col-12 col-md-7 text-left">
                                        <img src="{{ asset('site/images/icon/location.png')}}" class="mx-1" width="15" alt="">
                                        @if($application->job->city && $application->job->country)    
                                           <span class="item-position">{{$application->job->city->name_en}}, {{$application->job->country->name_en}}</span>
                                        @else
                                         <span class="item-position">{{$application->job->company->city->name_en}}, {{$application->job->company->country->name_en}}</span>
                                        @endif
                                    </div>
                                    <div class="col-12 col-md-5 text-left text-md-right">
                                        <img src="{{ asset('site/images/icon/time.png')}}" class="mx-1" width="18" alt="">
                                        <span class="item-time-type">{{$application->job->jobtype->name_en}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6 offset-md-3 col-xl-4 offset-xl-3 text-center">
                                {{ $applications->appends(getRequestBetweenPages())->render() }}
                            </div>
                        </div>
                        @else
                        <div class="row">
                            <div class="col-12 col-md-6 col-xl-12 text-center">
                                <p>no jobs found</p>
                            </div>
                        </div>
                        @endif

                    </div>
                </div>

            </div>
        </div>
    </div>


</div>
@endsection