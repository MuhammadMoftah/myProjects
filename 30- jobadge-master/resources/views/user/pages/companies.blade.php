@extends('master')
@section('body')
<div class="container-blog-posts">
    <div class="blog-posts-header" style="padding: 40px 0;">
        <div class="container">
            <h1 class="section-title mb-4" style=" letter-spacing:1px;"><span>Companies hiring now in Egypt</span></h1>

            <div class="text-muted">
                <p class="mb-1">Here you’ll find the best and most popular companies which are hiring right now, check
                    out the list of companies below, find your preferred ones, and apply now to the jobs that meet your
                    qualifications and suites you well.</p>
                <p class="mb-1">if you are looking for a specific position, you can
                    <a href="{{route('user.search')}}" style="color: var(--clr3);"> browse all available jobs </a>,
                    search for a certain job title, and apply filters like job type, job level, country and city to
                    refine your search results.
                </p>
            </div>

            <section class="container-search-job p-0 mt-5" style="border-radius: 20px;">
                <div class="search-job">
                    <div class="search-job-form">
                        <form action="{{route('user.company.all')}}" method="GET">
                            <div class="row no-gutters">
                                <div class="col-12 col-md-10">
                                    <div class="search-job-form-field first">
                                        <label for="searchCompany" class="search-job-form-field-label"><span
                                                class="icon icon-search"></span></label>

                                        <input type="text" name="search" id="searchCompany" class="search-job-form-field"
                                            placeholder="Search Companies by name" value="{{old('search')}}">
                                    </div>
                                </div>
                                <div class="col-12 col-md-2">
                                    <button type="submit" class="search-job-form-button w-100">SEARCH</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
            @include('admin.layouts.errors')

        </div>
    </div>

    <div class="container-awesome-company py-0">
        <div class="container">

            <div class="row mt-4">
                @foreach($companies as $company)
                <div class="col-12 col-lg-6">
                    <div class="awesome-company">
                        <div class="row no-gutters">
                            <div class="col-12 col-md-7 item-logo">
                                <a href="{{route('user.company.get' , ['slug' => $company->slug])}}">
                                    <div role="img" title="{{$company->name}}" class="awesome-company-img"
                                        data-image="{{$company->getCompanyLogo()}}">
                                        {{-- <img src="{{$company->getCompanyLogo()}}" alt="{{$company->name}}"
                                        style="width:100%;height:100%"> --}}
                                    </div>
                                </a>
                            </div>
                            <div class="col-12 col-md-5">
                                <div class="awesome-company-detail">
                                    <h4 class="detail-job-title"><a
                                            href="{{route('user.company.get',$company->slug)}}">{{$company->name}}</a>
                                    </h4>
                                    <div class="detail-position">{{$company->city->name_en}},
                                        {{$company->country->name_en}}</div>
                                    <a href="{{route('user.company.get.jobs',$company->slug)}}" title=""
                                        class="button-outline"><span>{{$company->getOpenPositions->count()}} open
                                            positions</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="row justify-content-center">
                <div class="col-12 col-md-4 col-xl-2 text-center">
                    {{ $companies->appends(getRequestBetweenPages())->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
