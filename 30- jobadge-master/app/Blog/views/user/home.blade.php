@extends('master')
@section('styles')
<style>
    body {
        background-color: white
    }
</style>
@endsection


@section('customeHeader')
<section class="blog-header1" style="background-image:url({{asset('site/images/logo/blog-background.jpg')}})">
    <div class="container">
       <a href="{{route('web.blog.user.home')}}"> <img src="{{asset('site/images/logo/blog-logo1.png')}}" alt=""> </a>
    </div>
</section>
@endsection

@section('body')
<section class="main-blogs pb-5">
    <div class="container p-5">

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

        <div class="blog-main-title py-4">
            <p class="h2">Latest Articles</p>
        </div>
        @if($blogs->count() == 0 )
            <div class="alert alert-warning" role="alert">
                No Articles Available !
            </div>
        @endif
        @if($blogs->first())
        <div class="top-blog part my-2 m-1">
            <a href="{{route("web.blog.user.details",$blogs->first()->slug)}}">
                <img src="{{$blogs->first()->image}}" alt="">
                <p class="h4 mt-2 blog-title"> {{  str_limit($blogs->first()->title, 150, "...") }}  </p>
                <div class="mt-1 pb-3">
                    <span class='text-muted d-inline-block"'> {{ $blogs->first()->created_at->diffForhumans() }} </span>
                   -  <span class='text-muted d-inline-block"'> {{ $blogs->first()->views }} views </span>
                </div>
            </a>
        </div>
        @endif


        <div class="blogs">
            @if($blogs->get(1) )
            <div class="part my-1" style="flex:3">
                <a href="{{route("web.blog.user.details",$blogs->get(1)->slug)}}">
                  <img src="{{$blogs->get(1)->image}}" alt="" style="height: 500px;">
                    <p class="h5 mt-2 blog-title"> {{  str_limit($blogs->get(1)->title, 150, "...") }} </p>
                    <div class="mt-1 pb-3">

                        <span class='text-muted d-inline-block"'>{{ $blogs->get(1)->created_at->diffForhumans() }}</span>
                       - <span class='text-muted d-inline-block"'> {{ $blogs->get(1)->views }} views </span>
                    </div>
                </a>
            </div>
            @endif

            <div class="flex-column" style="flex:2">
                @if($blogs->get(2) )
                <div class="part my-1">
                    <a href="{{route("web.blog.user.details",$blogs->get(2)->slug)}}">
                        <img src="{{$blogs->get(2)->image}}" alt="" style="height:200px">
                        <p class="h6 mt-2 blog-title"> {{  str_limit($blogs->get(2)->title, 150, "...") }} </p>
                        <div class="mt-1 pb-3">
                            {{-- <p class="font-weight-bold m-0 d-inline-block pr-3">Muhammad Moftah</p> --}}
                            <span class='text-muted d-inline-block"'>{{ $blogs->get(2)->created_at->diffForhumans() }}</span>
                           - <span class='text-muted d-inline-block"'> {{ $blogs->get(2)->views }} views</span>
                        </div>
                    </a>
                </div>
                @endif

                @if($blogs->get(3))
                <div class="part my-1">
                    <a href="{{route("web.blog.user.details",$blogs->get(3)->slug)}}">
                        <img src="{{$blogs->get(3)->image}}" alt="" style="height:200px">
                        <p class="h6 mt-2 blog-title"> {{  str_limit($blogs->get(3)->title, 150, "...") }} </p>
                        <div class="mt-1 pb-3">

                            <span class='text-muted d-inline-block"'>{{ $blogs->get(3)->created_at->diffForhumans() }}</span>
                            - <span class='text-muted d-inline-block"'> {{ $blogs->get(3)->views }} views</span>
                        </div>
                    </a>
                </div>
                @endif
            </div>

        </div>

        <div class="append-article">

        </div>
        <div class="laoding_article_image text-center" style="display: none">
            <img style="width: 200px; height: 200px" src="https://thumbs.gfycat.com/DeliriousSeveralAsianelephant-max-1mb.gif" width="10" height="10" class="img-fluid">
        </div>
    </div>

    <div class="d-block text-center mt-4">
        @if($blogs->nextPageUrl())
        <a class="btn btn-main px-5 mx-auto  load_more" data-first="{{$blogs->first()->id}}" data-page="{{ converPagantionToURL($blogs->appends(request()->query())->nextPageUrl() ) }}" href="javascript:void(0)">See More</a>
        @endif
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
        var append = $(".append-article")
        var loading = $(".laoding_article_image")
        $("body").on("click", ".load_more", function() {
            var _elm = $(this);
            loading.show();
            if (_elm.data("page")) {
                $.ajax({
                    url: _elm.data("page"),
                    data:{first:_elm.data('first')},    
                    success: function(result) {
                        append.append(result.html)
                        if (result.nex_url) {
                            _elm.data("page", result.nex_url)
                            _elm.prop("disabled", false);
                        } else {
                            _elm.prop("disabled", true);
                            _elm.hide()
                        }
                        loading.hide();
                        _elm.data("page", result.nex_url)


                    },
                    error: function(error) {
                        console.log(error);
                        loading.hide();
                    },
                    cache: false
                });
            }
        })
    })
</script>
@endsection