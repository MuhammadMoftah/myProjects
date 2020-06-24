@extends('frontend.master')
@section('styles')
<script type="text/javascript" src='https://maps.google.com/maps/api/js?sensor=false&libraries=places&key=AIzaSyCiSj64wEyRti_DeuBJQRkOVSO7M3cJtRY'></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
<!-- <style>
    .showrooms h5{
        width: inherit;
    }
</style> -->
@endsection
@section('search')
@include('frontend.search_layouts.search')
@endsection
@section('body')
<div class="showrooms">
    <div class="container head">
        <div class="row p-0 bg-white border-bottom">
            <div class="col-md-12 p-0">
                <section class="cover" style="background-image:url({{ $showroom->showroom_coverImage }});">
                </section>
            </div>
            <div class="col-lg-2 text-center">
                <div class="img" style="background-image:url('{{$showroom->showroom_image}}')"></div>
            </div>
            <div class="col-lg-10 col-12 comp-contact " style=" padding: 0px 31px 0 24px; ">
                <h1 class="mb-2 d-inline-block mt-1  font-weight-bold">{{ substr($showroom->name_en,0,400) }}
                    <div class="stars mt-1 d-inline-block mx-3">
                        @for ($i = 0; $i < (int)$showroom->showroom_rate; $i++)
                            <i class="fas fa-star text-warning"></i>
                            @endfor
                            @for ($i = 5; $i > (int)$showroom->showroom_rate; $i--)
                            <i class="far fa-star text-warning"></i>
                            @endfor
                    </div>
                </h1>

                @if(auth()->guard('user')->check())
                @if(auth()->guard('user')->user()->id != $showroom->user_id)
                <div class="d-inline-block float-lg-right">
                    <p class="text-muted d-inline-block new_count">{{ $showroom->followers->count() }} Followers</p>
                    @if(auth()->guard('user')->check())
                    @if ($showroom->check_following($showroom->id , auth()->guard('user')->user()->id))
                    <button class=" btn btn-info follow" data-count="{{ $showroom->followers->count() }}" data-id="{{ $showroom->id }}" data-follow="unfollow">Following</button>
                    @else
                    <button class="btn btn-info follow" data-count="{{ $showroom->followers->count() }}" data-id="{{ $showroom->id }}" data-follow="follow">Follow</button>
                    @endif
                    @if(CurrentUser() && CurrentUser() === auth('user')->user() && CurrentUser()->nonBlocked($showroom->id))
                    <button class="btn btn-info messageButton" data-showroom="{{$showroom->id}}" data-toggle="modal" data-target="#msgModal">Message</button>
                    @endif
                    @endif
                </div>
                @endif
                @endif
            </div>
        </div>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul style="text-align: center" class="list-unstyled">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <section class="trending">
        <div class="container">
            <div class="row bg-white mb-3  px-4">
                <div class="col-md-2">
                    {{-- showroom nav tabs --}}
                    <div class="showroom-nav">
                        <select class="form-control p-0 my-2" id="product">
                            <option @if(!request('cat_id')) selected @endif disabled value="readonly">Product Category</option>
                            <option value="">All Products</option>
                            @foreach($categories as $category)
                            <option @if(request('cat_id')==$category->id) selected @endif value="{{$category->id}}">{{$category->name_en}}</option>
                            @endforeach
                        </select>
                        {{-- don't change this tabs id --}}
                        <button class="btn btn-block main-btn2 my-2 showroom-tabs" id="offers">
                            Yalla Offers
                            <img src="{{asset('assets/site/images/offers.png')}}" alt="">
                        </button>
                        <button class="btn  btn-block main-btn2 my-2 showroom-tabs" id="reviews">Reviews</button>
                        <button class="btn  btn-block main-btn2 my-2 showroom-tabs" id="info">Info</button>
                        {{--<button class="btn  btn-block main-btn2 my-2" id="events">Events</button>--}}
                    </div>
                </div>
                {{-- showroom content --}}
                <div class="col-md-10" id="main-content">
                    @if(request('tab') === 'products' || !request()->has('tab') ) {{-- product content --}}
                    <div class="row products" id="product-content">
                        @include('frontend.products.products_data')
                    </div>
                    @elseif(request('tab') === 'offers') {{-- offers content --}}
                    @include('frontend.showrooms.showroomTabs.showroomOffer')
                    @elseif(request('tab') === 'reviews') {{-- reviews content --}}
                    @include('frontend.showrooms.showroomTabs.showroomReview')
                    @elseif(request('tab') === 'info') {{-- info content --}}
                    @include('frontend.showrooms.showroomTabs.showroomInfo')
                    @endif
                </div>
            </div>
    </section>

    <!-- The Wards Modal -->
    <div class="modal fade" id="wardsModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">All Wards</h4>
                </div>

                <!-- Modal body -->
                <div class="modal-body p-0 pb-3">
                    <div class="awards" style="box-shadow:none">
                        <div class="part text-center">
                            <img src="{{asset('site/images/badge1.png')}}" alt="">
                            <small class="d-block">Recommended 2018</small>
                        </div>
                        <div class="part text-center my-1">
                            <img src="{{asset('site/images/badge2.png')}}" alt="">
                            <small class="d-block">Top Products 2018</small>
                        </div>
                        <div class="part text-center my-1">
                            <img src="{{asset('site/images/badge3.png')}}" alt="">
                            <small class="d-block">Best Services 2018</small>
                        </div>
                        <div class="part text-center my-1">
                            <img src="{{asset('site/images/badge1.png')}}" alt="">
                            <small class="d-block">Recommented 2018</small>
                        </div>
                        <div class="part text-center my-1">
                            <img src="{{asset('site/images/badge2.png')}}" alt="">
                            <small class="d-block">Top Products 2018</small>
                        </div>
                        <div class="part text-center my-1">
                            <img src="{{asset('site/images/badge3.png')}}" alt="">
                            <small class="d-block">Best Services 2018</small>
                        </div>
                        <div class="part text-center my-1">
                            <img src="{{asset('site/images/badge1.png')}}" alt="">
                            <small class="d-block">Top Products 2018</small>
                        </div>
                        <div class="part text-center my-1">
                            <img src="{{asset('site/images/badge1.png')}}" alt="">
                            <small class="d-block">Best Services 2018</small>
                        </div>
                        <div class="part text-center my-1">
                            <img src="{{asset('site/images/badge3.png')}}" alt="">
                            <small class="d-block">Recommented 2018</small>
                        </div>
                        <div class="part text-center my-1">
                            <img src="{{asset('site/images/badge3.png')}}" alt="">
                            <small class="d-block">Top Products 2018</small>
                        </div>
                        <div class="part text-center my-1">
                            <img src="{{asset('site/images/badge1.png')}}" alt="">
                            <small class="d-block">Best Services 2018</small>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End Modal-->
</div>
</div>
</div>
<!--End Modal-->
@endsection
@push('scripts_stack')

<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
<script src="{{asset('assets/site/js/likeItem.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var category = '';
        $(document).on('change', '#product', function(e) {
            if ($.trim($(this).val()) !== 'readonly') {
                category = $.trim($(this).val())
                fetch_data(1);
            }
        });

        $(document).on('click', '#product-content .pagination a', function(e) {
            e.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            fetch_data(page);
        });

        function fetch_data(page) {
            var showroom = "{{$showroom->slug}}";
            var actionUrl = "{{route('user.get.singleShowroom',':slug')}}".replace(":slug", showroom);
            actionUrl = actionUrl + '?page=' + page;
            var reqData = {
                tab: "products"
            }
            if (category !== '') {
                Object.assign(reqData, {
                    category: category
                })
            }
            $.ajax({
                type: "GET",
                url: actionUrl,
                data: reqData,
                success: function(data) {
                    $('#main-content').html(`
                                            <div class="row products" id="product-content">
                                                ${data}
                                            </div>
                                        `);
                    $('.trending #product-content .part').outerHeight($('.trending #product-content .part').outerWidth());
                    window.history.pushState("Details", "Title", );
                    $(window).on('resize', function() {
                        $('.trending #product-content .part').outerHeight($('.trending #product-content .part').outerWidth());
                    })
                    let convertUrl = "?tab=" + reqData.tab
                    if (reqData.cat_id) {
                        convertUrl += "&cat_id=" + reqData.cat_id
                    }
                    window.history.pushState("", "", convertUrl);
                },
                cache: false
            });
        }
        //    === Make div square ===
        $('.trending #product-content .part').outerHeight($('.trending #product-content .part').outerWidth());
        $(window).on('resize', function() {
            $('.trending #product-content .part').outerHeight($('.trending #product-content .part').outerWidth());
        })

        // reviews pagination
        $(document).on('click', '#reviews-content .pagination a', function(e) {
            e.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            fetch_reviews(page);
        });

        function fetch_reviews(page) {
            var showroom = "{{$showroom->slug}}";
            var actionUrl = "{{route('user.get.singleShowroom',':slug')}}".replace(":slug", showroom);
            actionUrl = actionUrl + '?page=' + page;
            var reqData = {
                tab: "reviews"
            }
            $.ajax({
                type: "GET",
                url: actionUrl,
                data: reqData,
                success: function(data) {
                    $('#main-content').html(`${data}`);
                    let convertUrl = "?tab=" + reqData.tab
                    window.history.pushState("", "", convertUrl);
                },
                cache: false
            });
        }
    });

    // make ajax request to get the showroom content
    $(document).on('click', '.showroom-tabs', function(e) {
        e.preventDefault();
        var showroom = "{{$showroom->slug}}";
        var actionUrl = "{{route('user.get.singleShowroom',':slug')}}".replace(":slug", showroom);
        let pageRequested = '';
        let id = $(this).attr('id');
        let reqData = '';
        if (id === 'offers') {
            reqData = {
                tab: "offers"
            }
        } else if (id === 'info') {
            reqData = {
                tab: "info"
            }
        } else if (id === 'reviews') {
            reqData = {
                tab: "reviews"
            }
        }
        $.ajax({
            type: "GET",
            url: actionUrl,
            data: reqData,
            success: function(data) {
                $('#main-content').html(data);
                $('.trending #product-content .part').outerHeight($('.trending #product-content .part').outerWidth());
                $(window).on('resize', function() {
                    $('.trending #product-content .part').outerHeight($('.trending #product-content .part').outerWidth());
                })
                let convertUrl = "?tab=" + reqData.tab
                window.history.pushState("", "", convertUrl);
                document.getElementById('product').getElementsByTagName('option')[0].selected = 'selected';
            },
            cache: false
        });
    });
</script>
<script>
    $(document).ready(function() {
        $(".foll").on('click', function(e) {
            var count = $(this).attr('data-count');
            var new_count;
            var user_id = $(this).attr('data-id');
            if ($(this).html() == 'Follow') {
                $(this).html("Following");
            }
            $('.loader').show();
            $.ajax({
                type: 'GET', //THIS NEEDS TO BE GET
                url: "{{ route('user.follow.user') }}",
                datatype: 'html',
                data: {
                    user_id: user_id
                }
            });
            $('.loader').hide();
        });
    });
</script>
<script>
    $(document).ready(function() {
        $(".follow").on('click', function() {
            var count = $(this).attr('data-count');
            var new_count;

            var showroom_id = $(this).attr('data-id');
            if ($(this).html() == 'Follow') {
                $(this).html("Following");
            } else if ($(this).html() == 'Following') {
                $(this).html("Follow");
            }
            $.ajax({
                type: 'GET', //THIS NEEDS TO BE GET
                url: "{{ route('user.follow.showroom') }}",
                datatype: 'html',
                data: {
                    showroom_id: showroom_id,
                },
                success: function(data) {
                    $(".new_count").html(data + " Followers");
                }
            });
        });
        $("#profileImg").on('change', function() {
            if (this.files && this.files[0]) {
                if (this.files.length > 5) {
                    swal.fire("Oops!", "you can upload maximum 5 images", "error");
                    // alert("you can upload maximum 5 images"); 
                }
                $('#profileImage').remove();

                for (var i = 0; i < this.files.length; i++) {

                    let image = '<label style="margin:5px;" for="profileImg" class="uploadimg"><div class="close-overlay"><span class="btn btn-danger fas fa-trash-alt"></span></div><img src="' + URL.createObjectURL(event.target.files[i]) + '" style="width:100px; height: 100px; border-radius:5%;" alt=""></label>';

                    $('#image_preview').html(image);
                }
            }
        });
        $("#form").on('submit', function(e) {
            if ($("#profileImg")[0].files.length > 5) {
                swal.fire("Oops!", "you can upload maximum 5 images", "error");
                e.preventDefault();
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        var rate = '';
        $(document).on('click', "#review-submit", function(e) {
            // e.preventDefault();
            // alert('ss')
            var services = [];
            var review = '';
            $.each($("input[name='services[]']:checked"), function() {
                services.push($(this).val());
            });
            review = $("textarea[name='review']").val();
            if (rate == '' || services.length == 0) {
                Swal.fire({
                    position: 'center',
                    type: 'error',
                    title: 'you should select stars rate and select at least one category',
                    showConfirmButton: true,
                    confirmButtonText: 'done',
                    showLoaderOnConfirm: true,
                    confirmButtonColor: '#21d5de'
                });
            } else {
                $("input[name='rate']").val(rate);
                $("#review-form").submit();
            }
        });
        $(document).on('click', '#one-star', function(e) {
            $("#two-star , #three-star , #four-star , #five-star").removeClass('fas');
            $("#two-star , #three-star , #four-star , #five-star").addClass('far');
            $("#one-star").addClass('fas');
            rate = 1;
        });
        $(document).on('click', '#two-star', function(e) {
            $("#three-star , #four-star , #five-star").removeClass('fas');
            $("#three-star , #four-star , #five-star").addClass('far');
            $("#one-star,#two-star").addClass('fas');
            rate = 2;
        });
        $(document).on('click', '#three-star', function(e) {
            $("#four-star , #five-star").removeClass('fas');
            $("#four-star , #five-star").addClass('far');
            $("#one-star,#three-star,#two-star").addClass('fas');
            rate = 3;
        });
        $(document).on('click', '#four-star', function(e) {
            $("#five-star").removeClass('fas');
            $("#five-star").addClass('far');
            $("#one-star,#three-star,#two-star,#four-star").addClass('fas');
            rate = 4;
        });
        $(document).on('click', '#five-star', function(e) {
            $("#one-star,#three-star,#two-star,#four-star,#five-star").addClass('fas');
            rate = 5;
        });
    });
</script>

@if(Session::has('review'))
<script>
    Swal.fire({
        position: 'center',
        type: 'success',
        title: 'review has been added',
        showConfirmButton: false,
        timer: 1500,
        showConfirmButton: false,
        confirmButtonText: 'done',
        showLoaderOnConfirm: true,
        confirmButtonColor: '#21d5de'
    });
</script>
@endif
@include('frontend.includes.product_action_scripts')
@endpush