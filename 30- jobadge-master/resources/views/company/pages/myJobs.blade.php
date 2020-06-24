@extends('master')
@section('body')
<section class="container-search-job">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-10 offset-md-1">
                <div class="search-job">
                    <h2 class="search-job-title">MY <span style="color:#828128">JOBS</span></h2>

                    <div class="search-job-form">
                        <form action="{{route('company.myjobs.get')}}" method="get">
                            <div class="row no-gutters">
                                <div class="col-12 col-md-10">
                                    <div class="search-job-form-field first">
                                        <label for="searchJob" class="search-job-form-field-label"><span
                                                class="icon icon-search"></span></label>
                                        <input type="text" name="keyword" id="searchJob" value="{{request('keyword')}}"
                                            class="search-job-form-field" placeholder="Search in my Jobs">
                                    </div>
                                </div>
                                <div class="col-12 col-md-2">
                                    <button type="submit" class="search-job-form-button">SEARCH</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container-post-jobs" style="padding:50px 0px;">
    <div class="container">
        @include('layouts.message')
        <div class="post-job-list-view">
            @if(count($jobs)>0)
            @foreach($jobs as $job)
            <div class="list-view-item">
                <div class="row align-items-center no-gutters">

                    <div class="col-12 col-md-5 col-xl-4">
                        <div class="item-post-job" style="float: left;">
                            <div class="item-post">
                                <h4 class="post-name"><a href="{{route('user.get.job',$job->slug)}}">{{$job->title}}</a>
                                </h4>
                                <span class="post-date">{{$job->created_at->diffForHumans()}}</span>
                            </div>
                        </div>
                        @if(auth()->guard('company')->check())
                        <div class="item-post-job" style="margin-left: 250px;">
                            <div class="item-post">
                                <span class="post-date">{{$job->user_views->count()}} Viewd</span>
                            </div>
                        </div>
                        @endif
                    </div>


                    <div class="col-12 col-md-7 col-xl-8">
                        <div class="row no-gutters">

                            <div class="col-12 col-md-3">
                                <div class="item-time-type">
                                    <img src="{{ asset('site/images/icon/time.png')}}" class="mx-1" width="18" alt="">
                                    <span class="type-text">{{$job->jobtype->name_en}}</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="item-time-type">
                                    <img src="{{ asset('site/images/icon/time.png')}}" class="mx-1" width="18" alt="">
                                    <span class="type-text">{{$job->category->name_en}}</span>
                                </div>
                            </div>

                            <div class="col-12 col-md-2 text-sm-center text-md-right">
                                <a href="{{route('user.get.job',$job->slug)}}"
                                    class="button-outline"><span>View</span></a>
                            </div>
                            <div class="col-12 col-md-2 text-sm-center text-md-right" style="position: relative;right: 20px">
                                <a href="{{route('company.job.switch',$job->id)}}" class="button-outline"><span>
                                        @if($job->close==1)
                                        Open
                                        @else
                                        Close
                                        @endif
                                    </span></a>
                            </div>
                            <div class="col-12 col-md-2 text-sm-center text-md-right" >
                                <a href="{{route('get.job.applications',$job->id)}}" class="button-outline"><span>
                                     Applications
                                    </span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-12 col-md-6 offset-md-3 col-xl-4 offset-xl-4 text-center">
                {{ $jobs->appends(getRequestBetweenPages())->render() }}
            </div>
        </div>
        @else
        <div class="col-12 col-md-6 offset-md-3 col-xl-6 offset-xl-4 text-center">
            No JOBS Found
        </div>
        @endif
    </div>
</div>
@endsection