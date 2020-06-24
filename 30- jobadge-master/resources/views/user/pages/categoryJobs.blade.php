@extends('master')
@section('body')
<div class="container-blog-posts">
    <div class="blog-posts-header">
        <div class="container">
            <h2 class="section-title">Careers in <span>{{$category->name_en}}</span></h2>
        </div>
    </div>

    <div class="blog-posts-wrapper">
        <div class="container">
            <div class="row">
                @if(count($category_jobs)>0)
                    @foreach($category_jobs as $job)
                    <div class="col-12 col-md-6 col-xl-4">
                        <div class="blog-posts">
                            <div class="blog-posts-img">
                                <img src="{{$job->company->getCompanyLogo()}}" alt="">
                            </div>

                            <div class="blog-posts-content-wrapper">
                                <div class="blog-posts-date">{{$job->created_at->diffForHumans()}}</div>
                                <div class="blog-posts-content">
                                    <h3 class="blog-posts-title"><a href="{{route('user.get.job',$job->slug)}}">{{$job->title}}</a></h3>
                                    <p class="blog-posts-desc">
                                        {{$job->description}}
                                    </p>
                                </div>
                                <div class="row no-gutters">
                                    <div class="col-8">
                                        <a href="{{route('user.get.job',$job->slug)}}" class="button-fill-gray">Details</a>
                                    </div>
                                    <div class="col-4 text-right">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    @endforeach
                @else
                    <div class="row justify-content-center">
                        <div class="col-12 text-center">
                            No Jobs Found for {{$category->name_en}}
                        </div>
                    </div>
                @endif
            </div>

            <div class="row justify-content-center">
                <div class="col-12 col-md-4 col-xl-2 text-center">
                    {{ $category_jobs->appends(getRequestBetweenPages())->render() }}
                </div>
            </div>

        </div>
    </div>

</div>
@endsection