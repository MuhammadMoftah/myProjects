@extends('master')
@section('styles')
<style>
    body {
        background-color: white
    }
    .main-blogs img {
        width: inherit;
    }
    .pagination {
        justify-content: center;
    }
    .media img {
         width: 250px !important;
         height: 146px !important;
    }
</style>
@endsection


@section('customeHeader')p
<section class="blog-header1" style="background-image:url({{asset('site/images/logo/blog-background.jpg')}})">
    <div class="container">
       <a href="{{route('web.blog.user.home')}}"> <img src="{{asset('site/images/logo/blog-logo1.png')}}" alt=""> </a>
    </div>
</section>
@endsection

@section('body')
<section class="main-blogs pb-5">
    <div class="container p-4">
        <div class="mb-5">
            <form  action="{{route('web.blog.user.home')}}" method="GET">
                <div class="form-row">
                  <div class="col-sm-10">
                  <input class="form-control form-control-lg " name="search" value="{{request()->get('search')}}" type="search" placeholder="Search" aria-label="Search">
                  </div>
                  <div class="col-sm-2">
                    <button class="btn btn-outline-success btn-lg my-2 my-sm-0" type="submit">Search</button>
                  </div>
                </div>
              </form>
        </div>
       
        @forelse ($blogs as $blog)
            
        <a class="btn" style="cursor: pointer" href="{{route("web.blog.user.details",$blog->slug)}}">
            <div class="media mb-4">
                <img class="mr-3" src="{{$blog->image}}" width="150" alt="image article">
                <div class="media-body">
                <h5 class="mt-0"> {{  str_limit($blog->title, 150, "...") }} </h5>
                <div>
                    <span class='text-muted d-block"'>{{$blog->created_at->diffForhumans()}}</span>

                    <ul class="social-results list-unstyled  mb-2 p-0">
                    <li><span>{{$blog->shares}}</span> Shares</li>
                    <li><span>{{$blog->views}}</span> Views</li>
                    </ul>

                    <div class="tags">
                        @foreach ($blog->tags as $tag)
                            <a class="main-link2 d-inline-block mr-3" href="">#{{$tag->name}}</a>
                        @endforeach
                    
                    </div>

                </div>  
                </div>
            </div>
         </a>
        @empty
            
        @endforelse 
        

    </div>

    <div class=" text-center mt-4 mx-auto">
        {{ $blogs->appends(request()->query())->links() }}
    </div>

</section>

<section id="subscription-section" class="blog-subscribe bg-dark2 py-5">
    <div class="container text-center" data-aos="zoom-in-up">
        <div class="title">
            <p class="h1 text-capitalize font-weight-bolder">never miss an article!</p>
        </div>
        <p class="text-white">Subscribe to get the latest articles in your Email directly</p>
        <form class="mt-3" action="{{route('user.subscribe.post')}}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" value="subscription" name="type" />
            <input type="email" name="email" class="form-control" placeholder="Enter your email here ...">
            <input type="submit" value="subscribe" class="btn submit-btn main-btn1">
        </form>
        @if(isset($errors) && old('type')=='subscription')
        @if (count($errors) > 0)
        @foreach ($errors->all() as $error)
        <p class="text-danger mt-1 feedback">{!! $error !!}</p><br>
        @endforeach
        @endif
        @endif
        @if(Session::has('subscribe'))
        <p class="text-success mt-1 feedback">{{Session::get('message')}}</p>
        @endif
    </div>
</section>
@endsection


@section('scripts')
@if(Session::has('subscribe') || (isset($errors) && old('type')=='subscription'))
<script>
    $('html, body').animate({
        scrollTop: $("#subscription-section").offset().top
    }, 500);
</script>
@endif
<script>
    $(function() {
        
    })
</script>
@endsection