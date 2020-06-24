@extends('frontend.master')
@section('styles')
<link rel="stylesheet" href="{{asset('assets/site/css/addProduct.css?rand=1234')}}">
<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
@endsection
@section('search')
@include('frontend.search_layouts.search')
@endsection
@section('body')
<div class="showrooms select-design">
    <div class="container head">
        <div class="row p-0 bg-white border-bottom">
            <div class="col-md-12  p-0">
                <section class="cover" style="background-image:url({{ $user->cover }});"></section>
            </div>
            <div class="col-lg-2 col-12 text-center">
                <div class="img" style="background-image:url({{$user->image}});"></div>
            </div>

            <div class="col-lg-10 col-12 comp-contact" style="padding: 0px 31px 0 24px;">
                <h5 class="mb-1 d-inline-block mt-2 font-weight-bold">{{$user->fullname}}</h5>

                <div class="d-inline-block float-lg-right">
                    <div class="stars d-inline-block mx-3 mt-1">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="trending ">
        <div class="container product-content ">
            <div class="row bg-white mb-3 px-4">
                <div class="col-lg-12 d-flex justify-content-between mt-3 px-3">
                    <div class="d-flex flex-column">
                        <h4 class="block my-4">Start A New Design</h4>
                        <div class="alert bg-red errors">
                        </div>
                        <input type="file" id="uploadImgs" upload-href="{{route('user.upload.background')}}" class="btn main-btn2" value="Upload A Photo">
                        <p class="my-4">Or Choose From Any of the Following Options:</p>
                    </div>
                </div>

                <div class="col-12 my-4">
                    <h6>Design Room From Scratch</h6>
                    <div class="main-carousel">
                        @foreach($backgrounds[0] as $background)
                        <a href="{{route('user.design',['background'=>$background->getOriginal('image'),'type'=>'yalla'])}}" class="carousel-cell">
                            <img src="{{$background->image}}" alt="">
                            <span class="text-muted"></span>
                        </a>
                        @endforeach
                    </div>
                </div>

                <div class="col-12 my-4">
                    <h6>Design a Mood</h6>
                    <div class="main-carousel ">
                        @foreach($backgrounds[1] as $background)
                        <a href="{{route('user.design',['background'=>$background->getOriginal('image'),'type'=>'yalla'])}}" class="carousel-cell">
                            <img src="{{$background->image}}" alt="">
                            <span class="text-muted"></span>
                        </a>
                        @endforeach
                    </div>
                </div>

                <div class="col-12 my-4">
                    <h6>Design a Plan</h6>
                    <div class="main-carousel">
                        @foreach($backgrounds[2] as $background)
                        <a href="{{route('user.design',['background'=>$background->getOriginal('image'),'type'=>'yalla'])}}" class="carousel-cell">
                            <img src="{{$background->image}}" alt="">
                            <span class="text-muted"></span>
                        </a>
                        @endforeach
                    </div>
                </div>


            </div>
        </div>
    </section>
</div>
<!--End Showrooms-->
@endsection
@section('scripts')
<script src="{{asset('assets/site/js/setBackground.js')}}"></script>
<script>
    //    === Make div square ===
    $('.trending .product-content .part').outerHeight($('.trending .product-content .part').outerWidth());
    $(window).on('resize', function() {
        $('.trending .product-content .part').outerHeight($('.trending .product-content .part').outerWidth());
    })
</script>

<!-- JavaScript -->
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
<script>
    $('.main-carousel').flickity({
        pageDots: false,
        wrapAround: true
    });
</script>
@endsection