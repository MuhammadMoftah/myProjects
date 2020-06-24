@extends('master')
@section('styles')
<!-- Flickity Slider CSS -->
<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">

@endsection
@section('body')
<!--===== Search =====-->
<!--===== Search =====-->
<section class="container-search-job home-header">
    <div class="container">
        <div class="row">

            <div class="col-12 col-md-10 offset-md-1">
                <div class="search-job">
                    <h1 class="search-job-title">FIND YOUR <span style="color:#828128">DREAM</span> JOB</h1>
                    <h2 class="text-center search-job-title" style="font-weight: 500; color: #474747;font-size: 22px;letter-spacing: 1.9px;"> Looking for a job ? Find the best career opportunities in Egypt and apply
                        now</h2>
                    <div class="search-job-form">
                        <form action="{{route('user.search')}}" method="get">
                            <div class="row no-gutters">
                                <div class="col-12 col-md-10">
                                    <div class="search-job-form-field first">
                                        <label for="searchJob" class="search-job-form-field-label"><span class="icon icon-search"></span></label>
                                        <input type="text" value="{{request('keyword')}}" name="keyword" id="searchJob" class="search-job-form-field" placeholder="Search for Jobs...">
                                    </div>
                                </div>
                                <div class="col-12 col-md-2">
                                    <button type="submit" class="search-job-form-button w-100">SEARCH</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <h3 class="search-job-title-new-job">
                        <span>{{$latest_jobs_count}}</span> new jobs in the last
                        <span>7</span> days
                    </h3>

                    <p class="section-title" style="margin-bottom: 30px;letter-spacing: 1px;color: black;text-transform: unset;"> Browse available vacancies by <span>Job Type</span> </p>
                    <div class="row">

                        @foreach($job_types as $jobtype)

                        <div class="col-6 col-md-3" style="cursor:pointer;">
                            <a href="{{route('user.search', ['jobtype' => $jobtype->slug]) }}">
                                <div class="search-job-statistics" style="cursor:pointer;">
                                    <div class="text" style="cursor:pointer;">{{$jobtype->name_en}}</div>
                                    <div class="num counter" style="cursor:pointer;">{{$jobtype->jobs->count()}}</div>
                                </div>
                            </a>
                        </div>

                        @endforeach
                    </div>


                </div>
            </div>
        </div>
    </div>
</section>

<!-- Jobs Listing -->
<div class="container-post-jobs">
    <div class="container">
        <h3 id="recent-jobs" class="section-title mb-4">RECENTLY POSTED <span>JOBS</span></h3>
        <p class="text-center mb-4 text-muted"> Here you can find the most recent jobs, posted by employers, on our website. <br> You can filter by job types and/or job categories. </p>

        <div class="post-jobs-filter">
            <div class="row no-gutters align-items-center">
                <div class="col-8 col-md-6 col-xl-10">
                    <div class="row no-gutters">
                        <div class="col-12 col-md-6">
                            <div class="post-jobs-filter-select first">
                                <span class="icon icon-down"></span>
                                <div class="select-title">JOB TYPES</div>
                                <div class="select-value">
                                    <select name="jobtype_id" class="select-field" id="jobtype">
                                        <option value="">Show All</option>
                                        @foreach($job_types as $jobtype)
                                        <option value="{{$jobtype->id}}">{{$jobtype->name_en}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="post-jobs-filter-select">
                                <span class="icon icon-down"></span>
                                <div class="select-title">Categories</div>
                                <div class="select-value">
                                    <select name="category_id" class="select-field" id="category">
                                        <option value="">Show All</option>
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name_en}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4 col-md-6 col-xl-2 text-center">
                    <div class="post-jobs-filter-view-list">
                        <a href="#" class="view-list-type active" data-list-type="list"><span class="icon icon-view-list"></span></a>
                        <a href="#" class="view-list-type" data-list-type="grid"><span class="icon icon-nine-squares"></span></a>
                    </div>
                </div>
            </div>
        </div>



        <div class="post-job-list-view" id="jobs-list">
            @foreach($latest_jobs as $job)
            <div class="list-view-item">
                <div class="row align-items-center no-gutters">

                    <div class="col-12 col-md-5 col-xl-7">
                        <div class="item-post-job">
                            @if($job->confidential==0)
                            <a href="{{route('user.company.get' , ['slug' => $job->company->slug])}}"><img src="{{$job->company->getCompanyLogo()}}" alt="Careers at {{$job->company->name}} | Jobadge" class="item-logo"></a>
                            @else
                            <img src="{{$job->company->getCompanyDefaultLogo()}}" alt="Careers at {{$job->company->name}} | Jobadge" class="item-logo">
                            @endif
                            <div class="item-post">
                                <h4 class="post-name"><a href="{{route('user.get.job',$job->slug)}}">{{$job->title}}</a>
                                </h4>
                                <a @if($job->confidential==0) href="{{route('user.company.get' , ['slug' => $job->company->slug])}} @else href="#" @endif" style="display:block; color: #706e52;">
                                    @if($job->confidential==0)
                                    {{$job->company->name}}
                                    @else
                                    Confidential
                                    @endif
                                </a>
                                <span class="post-date">{{$job->created_at->diffForHumans()}}</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-7 col-xl-5">
                        <div class="row no-gutters">
                            <div class="col-12 col-md-5">
                                <div class="item-position">
                                    <!-- <span class="icon icon-pin"></span> -->
                                    <img src="{{ asset('site/images/icon/location.png')}}" class="mx-1" width="15" alt="">
                                    <span class="item-position">
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
                                    <!-- <span class="icon icon-tag-black-shape"></span> -->
                                    <img src="{{ asset('site/images/icon/time.png')}}" class="mx-1" width="18" alt="">
                                    <span class="type-text">{{$job->jobtype->name_en}}</span>
                                </div>
                            </div>

                            <div class="col-12 col-md-3 text-sm-center text-md-right">
                                <a href="{{route('user.get.job',$job->slug)}}" class="button-outline"><span>Apply</span></a>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            @endforeach
        </div>

        <div class="post-job-grid-view">
            <div class="row" id="jobs-grid">
                @foreach($latest_jobs as $job)
                <div class="col-12 col-md-6 col-xl-4">
                    <div class="grid-view-item">

                        @if($job->confidential==0)
                        <a href="{{route('user.company.get' , ['slug' => $job->company->slug])}}"><img src="{{$job->company->getCompanyLogo()}}" alt='Careers at{{$job->company->name}} | Jobadge' class="item-logo"></a>
                        @else
                        <img src="{{$job->company->getCompanyDefaultLogo()}}" alt='Careers at{{$job->company->name}} | Jobadge' class="item-logo">
                        @endif
                        <div class="item-date">{{$job->created_at->diffForHumans()}}</div>
                        <h4 class="item-post-title"><a href="{{route('user.get.job',$job->slug)}}">{{$job->title}}</a>
                        </h4>
                        <a @if($job->confidential==0) href="{{route('user.company.get' , ['slug' => $job->company->slug])}} @else href="#" @endif" style="display:block; color: #706e52; margin:10px 0px;">
                            @if($job->confidential==0)
                            {{$job->company->name}}
                            @else
                            Confidential
                            @endif
                        </a>
                        <a href="{{route('user.get.job',$job->slug)}}" title="" class="button-outline"><span>DETAILS</span></a>
                        <div class="row no-gutters">
                            <div class="col-12 col-md-7 text-left">
                                <img src="{{ asset('site/images/icon/location.png')}}" class="mx-1" width="15" alt="">
                                <span class="item-position">
                                    @if($job->city && $job->country)
                                    {{$job->city->name_en}},
                                    {{$job->country->name_en}}
                                    @else
                                    {{$job->company->city->name_en}},
                                    {{$job->company->country->name_en}}
                                    @endif
                                </span>
                            </div>
                            <div class="col-12 col-md-5 text-left text-md-right">
                                <img src="{{ asset('site/images/icon/time.png')}}" class="mx-1" width="18" alt="">
                                <span class="item-time-type">{{$job->jobtype->name_en}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6 offset-md-3 col-xl-4 offset-xl-4 text-center">
                <a href="{{route('user.browse')}}" class="button-fill post-job-more">VIEW ALL OPEN JOBS</a>
            </div>
        </div>

    </div>
</div>

<!-- Companies -->
{{--<div class="container-awesome-company">
    <div class="container">
        <h3 class="section-title">AWESOME <span>COMPANIES</span> TO WORK FOR</h3>
        <div class="row">
            @foreach($latest_companies as $company)
            <div class="col-12 col-lg-6">
                <div class="awesome-company">
                    <div class="row no-gutters">
                        <div class="col-12 col-md-7">
                            <div class="awesome-company-img" data-image="{{$company->getCompanyLogo()}}"
style="background-position: center;">
<img src="{{$company->getCompanyLogo()}}" alt="">
</div>
</div>
<div class="col-12 col-md-5">
    <div class="awesome-company-detail">
        <!-- <img src="{{asset('site/images\logo\logo1.png')}}" alt="" class="detail-img"> -->
        <h4 class="detail-job-title"><a href="{{route('user.company.get',$company->id)}}">{{$company->name}}</a></h4>
        <div class="detail-position">{{$company->city->name_en}}, {{$company->country->name_en}}</div>
        <a href="{{route('user.company.get.jobs',$company->id)}}" title="" class="button-outline"><span>{{$company->getOpenPositions->count()}} open positions</span></a>
    </div>
</div>
</div>
</div>
</div>
@endforeach
</div>
<div class="row">
    <div class="col-12 col-md-6 offset-md-3 col-xl-4 offset-xl-4 text-center">
        <a href="{{route('user.company.all')}}" class="button-fill awesome-company-more">VIEW ALL COMPANIES</a>
    </div>
</div>
</div>
</div>--}}

<!-- Partners New Logos -->
<div class="container-new-partner">
    <div class="container">
        <h3 class="section-title mb-4">AWESOME <span>COMPANIES</span> TO WORK FOR</h3>
        <p class="text-center text-muted" style="margin-bottom: 60px;">Here are some of the best companies to work for in Egypt, select any company to see all its available jobs.</p>

        <!-- Flickity HTML init -->
        <div class="carousel" data-flickity='{ "wrapAround": true, "pageDots": false, "cellAlign": "left", "contain": true}'>
            @foreach($latest_companies as $company)
            <a class="carousel-cell" href="{{route('user.company.get',$company->slug)}}" style="background-image: url('{{$company->getCompanyLogo()}}');display:block;" role="img" title="{{$company->name}}"> </a>
            @endforeach
        </div>
        <div class="row my-5">
            <div class="col-12 text-center">
                <a href="{{route('user.company.all')}}" class="button-fill awesome-company-more">VIEW ALL COMPANIES</a>
            </div>
        </div>
    </div>
</div>

<!-- Services -->
{{--<div class="container-our-service">
    <div class="container">
        <div class="section-header">
            <h3 class="section-title">OUR <span>SERVICES</span></h3>
            <p class="section-desc">Here is the list of services our expertiese offer to you to keep you at the top of your industry.</p>
        </div>

        <div class="our-service-carousel owl-carousel">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="item">
                        <div class="item-icon">
                            <span class="icofont-binoculars"></span>
                        </div>
                        <div class="item-content">
                            <h5 class="content-title">INSTALLATION</h5>
                            <p class="content-desc">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                Ut enim ad minim veniam, quismagnam aliquam quaerat voluptatem.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="item">
                        <div class="item-icon">
                            <span class="icofont-earth"></span>
                        </div>
                        <div class="item-content">
                            <h5 class="content-title">RENT PRODUCTS</h5>
                            <p class="content-desc">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                Ut enim ad minim veniam, quismagnam aliquam quaerat voluptatem.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="item">
                        <div class="item-icon">
                            <span class="icofont-fire-burn"></span>
                        </div>
                        <div class="item-content">
                            <h5 class="content-title">CLEANING</h5>
                            <p class="content-desc">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                Ut enim ad minim veniam, quismagnam aliquam quaerat voluptatem.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="item">
                        <div class="item-icon">
                            <span class="icofont-learn"></span>
                        </div>
                        <div class="item-content">
                            <h5 class="content-title">CONCEPT AND DESIGN</h5>
                            <p class="content-desc">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                Ut enim ad minim veniam, quismagnam aliquam quaerat voluptatem.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="item">
                        <div class="item-icon">
                            <span class="icofont-binoculars"></span>
                        </div>
                        <div class="item-content">
                            <h5 class="content-title">INSTALLATION</h5>
                            <p class="content-desc">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                Ut enim ad minim veniam, quismagnam aliquam quaerat voluptatem.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="item">
                        <div class="item-icon">
                            <span class="icofont-earth"></span>
                        </div>
                        <div class="item-content">
                            <h5 class="content-title">RENT PRODUCTS</h5>
                            <p class="content-desc">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                Ut enim ad minim veniam, quismagnam aliquam quaerat voluptatem.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="item">
                        <div class="item-icon">
                            <span class="icofont-fire-burn"></span>
                        </div>
                        <div class="item-content">
                            <h5 class="content-title">CLEANING</h5>
                            <p class="content-desc">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                Ut enim ad minim veniam, quismagnam aliquam quaerat voluptatem.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="item">
                        <div class="item-icon">
                            <span class="icofont-learn"></span>
                        </div>
                        <div class="item-content">
                            <h5 class="content-title">CONCEPT AND DESIGN</h5>
                            <p class="content-desc">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                Ut enim ad minim veniam, quismagnam aliquam quaerat voluptatem.
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>--}}

<!-- Testimonials -->
{{-- <div class="container-our-testimonials">
    <div class="container">
        <div class="section-header">
            <h3 class="section-title">OUR <span>TESTIMONIALS</span></h3>
            <p class="section-desc">Check out what our clients have said about us. Don’t take our word for it!</p>
        </div>
        <div class="our-testimonials-carousel owl-carousel">
            @foreach($latest_feedbacks as $feedback)
            <div class="item">
                <p class="item-desc">
                    {{$feedback->body}}
</p>
<div class="item-avatar">
    <img src="{{$feedback->user->getUserImage()}}" alt="">
</div>
<div class="item-name">
    <span class="name">{{$feedback->user->first_name}}</span>
    <span class="post"> {{$feedback->user->last_name}}</span>
</div>
</div>
@endforeach
</div>
</div>
</div> --}}
@endsection
@section('scripts')
<!-- flickity Slider JS -->
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
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

<script type="text/javascript">
    function getLatestJobs() {
        var url = "{{route('user.get.latest_jobs')}}";
        var category_id = $('#category').val();
        var jobtype_id = $('#jobtype').val();
        var url = url + '?category_id=' + category_id + '&jobtype_id=' + jobtype_id;
        $.ajax({
            url: url,
        }).done(function(response) {
            console.log(response);
            var jobs = response;
            var jobs_list = '';
            var jobs_grid = '';
            $.each(jobs, function(index, job) {
                var job_url = "{{route('user.get.job',':slug')}}".replace(":slug", job.slug);
                jobs_grid = jobs_grid + '<div class="col-12 col-md-6 col-xl-4">' +
                    '<div class="grid-view-item">' +
                    '<img src="' + job.image + '" alt="' + job.title + '" class="item-img">' +
                    '<div class="item-date">' + job.date + '</div>' +
                    '<h4 class="item-post-title"><a href="' + job_url + '">' + job.title + '</a></h4>' +
                    '<span style="display: block; color: #706e52; margin:10px 0px;">' + job
                    .company_name + '</span>' +
                    '<a href="' + job_url +
                    '" title="" class="button-outline"><span>DETAILS</span></a>' +
                    '<div class="row no-gutters">' +
                    '<div class="col-12 col-md-7 text-left">' +
                    '<img src=' + "{{ asset('site/images/icon/location.png') }}" + ' class="mx-1" width="15" alt="">' +
                    '<span class="item-position">' + job.city_name + ',' + job.country_name +
                    '</span>' +
                    '</div>' +
                    '<div class="col-12 col-md-5 text-left text-md-right">' +
                    '<img src=' + "{{ asset('site/images/icon/time.png')}}" + ' class="mx-1" width="18" alt="">' +
                    '<span class="item-time-type">' + job.jobtype_name + '</span>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>';

                jobs_list = jobs_list + '<div class="list-view-item">' +
                    '<div class="row align-items-center no-gutters">' +
                    '<div class="col-12 col-md-5 col-xl-7">' +
                    '<div class="item-post-job">' +
                    '<img src="' + job.image + '" alt="' + job.title + '" class="item-logo">' +
                    '<div class="item-post">' +
                    '<h4 class="post-name"><a href="' + job_url + '">' + job.title + '</a></h4>' +
                    '<span style="display: block; color: #706e52;">' + job.company_name + '</span>' +
                    '<span class="post-date">' + job.date + '</span>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-12 col-md-7 col-xl-5">' +
                    '<div class="row no-gutters">' +
                    '<div class="col-12 col-md-5">' +
                    '<div class="item-position">' +
                    '<img src=' + "{{ asset('site/images/icon/location.png')}}" + ' class="mx-1" width="15" alt="">' +
                    '<span class="position-text">' + job.city_name + ',' + job.country_name +
                    '</span>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-12 col-md-4">' +
                    '<div class="item-time-type">' +
                    '<img src=' + "{{ asset('site/images/icon/time.png')}}" + ' class="mx-1" width="18" alt="">' +
                    '<span class="type-text">' + job.jobtype_name + '</span>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-12 col-md-3 text-sm-center text-md-right">' +
                    '<a href="' + job_url + '" class="button-outline"><span>APPLY</span></a>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>';
            });

            $('#jobs-grid').html(jobs_grid);
            $('#jobs-list').html(jobs_list);
        });
    }

    $('#jobtype').change(function() {
        getLatestJobs();
    });

    $('#category').change(function() {
        getLatestJobs();
    });
</script>

@endsection