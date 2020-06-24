@extends('master')
@section('body')
<!--===== Search =====-->
<!--===== Search =====-->
<section class="container-search-job">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-10 offset-md-1">
                <div class="search-job">
                    <h2 class="search-job-title">FIND <span style="color:#828128">Job Seekers</span></h2>

                    <div class="search-job-form">
                        <form action="{{route('company.jobseekers.search')}}" method="get">
                            <div class="row no-gutters">
                                <div class="col-12 col-md-10">
                                    <div class="search-job-form-field first">
                                        <label for="searchUser" class="search-job-form-field-label"><span class="icon icon-search"></span></label>
                                        <input value="{{request('title')}}" type="text" name="title" id="searchUser" class="search-job-form-field" placeholder="Search for Job seekers">
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
<div class="container-post-jobs">
    <div class="container">
        @if(count($users)>0)
        <div class="post-job-grid-view" style="display:inline;">
            <div class="row">
                @foreach($users as $user)
                <div class="col-12 col-md-6 col-xl-4">
                    <div class="grid-view-item">
                        <img src="{{$user->getUserImage()}}" alt="{{$user->full_name}}" class="item-img">
                        <h4 class="item-post-title"><a href="{{route('user.get',$user->id)}}">{{$user->full_name}}</a></h4>
                        <h5 class=" item-company-name">{{$user->title}}</h5>
                        <a href="{{route('company.jobseeker.view',$user->id)}}" title="" class="button-outline"><span>View</span></a>
                        <div class="row no-gutters">
                            <div class="col-12 col-md-12 text-center">
                                @if($user->country_id && $user->city_id)
                                <span class="icon icon-pin"></span>
                                <span class="item-position">{{$user->city->name_en}}, {{$user->country->name_en}}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-12 col-md-6 offset-md-3 col-xl-4 offset-xl-4 text-center">
                    {{ $users->appends(getRequestBetweenPages())->render() }}
                </div>
            </div>
        </div>
        @endif

        @if(count($users)==0 && !request('title'))
        <div class="row">
            <div class="col-12 col-md-6 offset-md-3 col-xl-4 offset-xl-4 text-center">
                type title to search for job seekers 
            </div>
        </div>
        @elseif(count($users)==0 && request('title'))
        <div class="row">
            <div class="col-12 col-md-6 offset-md-3 col-xl-4 offset-xl-4 text-center">
                no users for this title {{request('title')}} 
            </div>
        </div>
        @endif
    </div>
</div>
@endsection