@extends('frontend.master')
@section('styles')
<style>
    footer {
        display: none;
    }

    body {
        background-color: white;
    }

</style>

<meta property="og:title" content='{{$product->name_en}}'>
<meta property="og:image" content="{{$product->featured_image}}">
<meta propert="og:description" content="{{$product->description_en}}">
<!-- Twitter Cards -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@">
<meta name="twitter:title" content='{{$product->name_en}}'>
<meta name="twitter:image" content="{{$product->featured_image}}">
<link rel="stylesheet" href="{{asset('assets/site/css/addProduct.css?rand=1234')}}">
@endsection
@section('search')
@include('frontend.search_layouts.search')
@endsection
@section('body')
<section class="one-product showrooms">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 p-0 fullheigh">

                {{-- product images slider --}}
                <div id="product-slider" class="carousel slide" data-ride="carousel" data-interval="false">
                    {{-- <a href="{{url()->previous()}}" class="back-btn main-btn3">
                        <i class="fas fa-chevron-left"></i> Back
                    </a> --}}

                    @if(session()->has("previous_page"))
                    <a href='{{session()->get("previous_page")}}' class="text-white close-btn">
                        <i class="fas fa-times"></i>
                    </a>
                    @endif

                    <ol class="carousel-indicators">
                        @foreach($product->images as $key => $product_image)
                        <li style="background-image: url('{{$product_image->image}}');" data-target="#product-slider"
                            data-slide-to="{{$key}}" class="@if($key==0) active @endif">
                        </li>
                        @endforeach
                    </ol>
                    <div class="carousel-inner">
                        @foreach($product->images as $key => $product_image)
                        <div class="carousel-item @if($key==0) active @endif">
                            <img src="{{$product_image->image}}" class="d-block" alt="{{$product->name_en}}">
                        </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#product-slider" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#product-slider" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                {{-- end product images silder --}}

                {{-- Action below the product image --}}
                @if (auth()->guard('user')->check())
                <div class="orders text-center p-1 bg-white">
                    <button class="btn btn-outline-info my-1" data-toggle="modal" data-target="#ShareModal">
                        <i class="fas fa-share-square"></i> Share
                    </button>



                    <button class="btn btn-outline-info my-1 product" data-product_id="{{ $product->id }}"
                        data-toggle="modal" data-target="#SaveModal">
                        <i class="fas fa-heart"></i> Save
                    </button>

                    <a href="{{ route('user.product.compare',$product->id) }}" class="btn btn-outline-info my-1">
                        <i class="fas fa-sync-alt"></i> Compare
                    </a>
                    <a href="{{ route('user.background.set') }}" class="btn btn-outline-info my-1"><i
                            class="fas fa-play"></i> Start Design </a>
                </div>
                @endif
                {{-- End action under the product image --}}


                {{-- SaveModal --}}
                <div class="modal fade savemodal" id="SaveModal">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Save Item</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <div class="row product-content trending">
                                    <div class="col-md-5 px-2">
                                        <div class="part card" style="height: 287.325px;">
                                            <div class="img" style="background-image: url({{ 
                                            count($product->images) !== 0 && $product->images[0] ? $product->featured_image : asset('assets/images/animation-bg.jpg')
                                                 }});">
                                            </div>
                                            <div class="card-body  d-flex flex-column justify-content-between">
                                                @if(count($product->categories) !== 0)
                                                <h5 class="card-title">{{ $product->categories[0]->name_en }}</h5>
                                                @endif
                                                <p class="card-text text-info m-0">
                                                    {{ $product->name_en }}
                                                </p>
                                                <p class="small text-muted">
                                                    @if(!$product->hidden_price )
                                                        {{$product->price}} EGP
                                                    @endif
                                                </p>
                                                <div class="social">
                                                    <div class="stars d-block">
                                                        @for ($i = 0; $i < (int)$product->rate; $i++)
                                                            <i class="fas fa-star text-warning"></i>
                                                            @endfor
                                                            @for ($i = 5; $i > (int)$product->rate; $i--)
                                                            <i class="far fa-star text-warning"></i>
                                                            @endfor
                                                    </div>
                                                    <div>
                                                        <div class="likes d-inline-block">
                                                            <i class="fas fa-heart"></i>
                                                            <span class="small">{{$product->saves->count()}}</span>
                                                        </div>
                                                        <div class="comments d-inline-block">
                                                            <i class="fas fa-comment-dots"></i>
                                                            <span class="small">{{$product->comments->count()}}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-7 p-2">
                                        <div class="form-group">
                                            <h4>Choose board</h4>

                                            <select name="board_id" id="board_id" data-style="btn-white"
                                                class="selectpicker form-control ">
                                                <option value="select" id=>select board</option>

                                                @foreach ($boards as $board)
                                                <option value="{{ $board->id }}">{{ $board->name }}</option>
                                                @endforeach
                                                <option value="create" data-content="
                                                        <div class='d-flex justify-content-between border-top py-1' id='create_new'>
                                                            <span>Creat New Board</span>
                                                            <span class='btn btn-info py-0'> Create</span>
                                                        </div>">
                                                </option>
                                            </select>
                                            <div id="append" class="mt-3">

                                            </div>
                                        </div>
                                    </div>



                                </div>
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <input class="btn main-btn save" type="button" value="Save" id="save-button">
                                <button type="button" class="btn main-btn2" data-dismiss="modal">Close</button>
                            </div>

                        </div>
                    </div>
                </div>
                {{-- End SaveModal --}}

                <!-- The Share Modal -->
                <div class="modal fade sharemodal" id="ShareModal">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Share With</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body ">
                                <div class="row product-content trending">
                                    <div
                                        class="col-12 d-flex shareicons justify-content-between text-center border-bottom pb-3">
                                        <a target="_blank"
                                            href="{{ route('user.product.share',[$product->id,'facebook']) }}"><i
                                                style="background-color:#3b5998;" class="fab fa-facebook-f"></i></a>
                                        <a target="_blank"
                                            href="{{ route('user.product.share',[$product->id,'twitter']) }}"><i
                                                style="background-color:#00acee;" class="fab fa-twitter"></i></a>
                                        <a target="_blank"
                                            href="{{ route('user.product.share',[$product->id,'linkedin']) }}"><i
                                                style="background-color:#0077b5;" class="fab fa-linkedin-in"></i></a>
                                        <a target="_blank"
                                            href="{{ route('user.product.shareViaEmail',[$product->id]) }}"><i
                                                style="background-color:#0077b5;" class="fas fa-envelope"></i></a>
                                        {{-- <a href=""><i style="background-color:#CD2228;"
                                                class="fab fa-pinterest-p"></i></a> --}}
                                        {{-- <a href=""><i style="background-color:#128c7e;" class="fab fa-whatsapp"></i></a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End ShareModal-->
            </div>
            <div class="col-lg-4 px-4 fullheight product-side-bar" style="overflow-y:scroll">
                {{-- company info --}}
                <div class="company-info px-0">
                    <div class="d-inline-block">
                        <a href="{{ route('user.get.singleShowroom',$product->showroom->slug) }}" class="img"
                            style="background-image: url('{{$product->showroom->showroom_image}}');"></a>
                    </div>
                    <div class="d-inline-block">
                        {{-- <h4 class="mb-1"> 
                            <span>
                                <a style="color:#007bffa6;" class="main-color font-weight-bold" style="font-size:30px!important;" href="{{ route('user.get.singleShowroom',['slug' => $product->showroom->slug  ]) }}">{{ $product->showroom->name_en}}</a>
                        </span>
                        </h4> --}}
                        <a class="main-link2 font-weight-bold mb-1 h6"
                            href="{{ route('user.get.singleShowroom',$product->showroom->slug) }}">{{ $product->showroom->name_en}}</a>
                           
                            <div class="stars">
                            @for ($i = 0; $i < $product->showroom->rate; $i++)
                                <i class="fas fa-star text-warning"></i>
                                @endfor
                                @for ($i = 5; $i > $product->showroom->rate; $i--)
                                <i class="far fa-star text-warning"></i>
                                @endfor
                        </div>
                        <small class="new_count">{{ count($product->showroom->followers) }} Followers</small>
                    </div>

                    <div class="d-inline-block float-right">
                        @if(auth()->guard('user')->check())
                        @if(auth('user')->user()->id != $product->showroom->user_id)
                        @if($product->showroom->check_following($product->showroom->id ,
                        auth()->guard('user')->user()->id))
                        <button class=" btn btn-info" data-count="{{ $product->showroom->followers->count() }}"
                            data-id="{{ $product->showroom->id }}" data-follow="unfollow">Following</button>
                        @else
                        <button class="btn btn-info follow" data-count="{{ $product->showroom->followers->count() }}"
                            data-id="{{ $product->showroom->id }}" data-follow="follow">Follow</button>
                        @endif
                        @if(CurrentUser() && CurrentUser() === auth('user')->user() && CurrentUser()->nonBlocked($product->showroom->id))
                            <button class="btn btn-info d-block" data-toggle="modal" data-target="#msgModal">Message</button>
                        @endif
                        @endif
                        @endif
                    </div>
                </div>
                {{-- product details --}}
                <div class="product-details p-2">
                    <p class="font-weight-bold">{{$product->name_en}} </p>
                    <span>
                        @foreach($product->categories as $category)
                        <a
                            href="{{ route('advanced.search.products',['category'=>$category->id]) }}">{{$category->name_en}}</a>
                        @if(!$loop->last)|@endif
                    </span>
                    @endforeach
                    <p class="font-weight-bold mt-4">Available in</p>

                    <span>
                        @foreach ($product->branches as $key => $branch)
                        <a href="{{ route('user.get.singleShowroom',['slug'=>$product->showroom->slug,'tab'=>'info']) }}">
                            @if($branch->title !== null)
                            {{$branch->title}}
                            @else
                            {{$branch->address_en}}
                            @endif
                        </a> @if(!$loop->last)|@endif
                        @endforeach
                    </span>
                    @if(Route::currentRouteName()=='user.offer.get' && $product->offer)
                    <aside class="row mt-4 offer-details">
                        <hgroup class="col-lg-5">
                            <span class="font-weight-bold mt-4 h6">Price</span>

                            <h6 class="mb-0">
                                @if(!$product->hidden_price && $product->price !="N/A")
                                {{ $product->offer->offer_price }} EGP
                                @else
                                    @if(auth('user')->check() && auth("user")->id() == $product->showroom->user_id)  
                                        <span style="font-size:25px">{{$product->price}} EGP
                                    @else
                                        <button class="btn btn-info ask-price" data-id="{{$product->id}}" data-toggle="modal" data-target="#request_price">Request Price</button>        
                                    @endif 
                               @endif
                            </h6>
                            <span class="font-weight-bold">Was {{ $product->price }} EGP</span>
                        </hgroup>
                        <hgroup class="col-lg-7">
                            <span class="font-weight-bold mt-4 h6">Discount</span>
                            <h6 style="margin-left: -5px;" class="mb-0"> {{ $product->offer->discount }} % OFF</h6>
                            <span class="font-weight-bold" style="margin-left: -5px;">You will save:
                                {{ ($product->price * $product->offer->discount )/100 }} EGP</span>
                        </hgroup>
                    </aside>

                    <aside class="offer-timer my-4">
                        <hgroup>
                            <h6 class="m-0 font-weight-bold">Offer Expires in</h6>
                            <div class="d-flex justify-content-between">
                                <div>
                                    <span id="days"></span>
                                    <p>Days</p>
                                </div>

                                <span>:</span>

                                <div>
                                    <span id="hours"></span>
                                    <br>Hours
                                </div>

                                <span>:</span>

                                <div>

                                    <span id="minutes"></span>
                                    <br>Minutes
                                </div>

                                <span>:</span>

                                <div>
                                    <span id="seconds"></span>
                                    <br>Seconds
                                </div>
                            </div>
                        </hgroup>
                        <h6 class="main-link2 mt-2 font-weight-bold text-center">Valid Until:
                            {{ $product->offer->expire_date->format('j F Y') }}</h6>
                    </aside>
                    @endif
                    @if(Route::currentRouteName()=='user.product.get' && !$product->hidden_price)
                    <p class="mt-4">Price:
                        
                        </span>
                        @if(!$product->hidden_price && $product->price !="N/A")
                                <span style="font-size:25px">{{$product->price}} EGP
                          @else
                                @if(auth('user')->check() && auth("user")->id() == $product->showroom->user_id)  
                                    <span style="font-size:25px">{{$product->price}} EGP
                                @else
                                     <button class="btn btn-info ask-price" data-id="{{$product->id}}" data-toggle="modal" data-target="#request_price">Request Price</button>        
                                @endif 
                                
                        @endif
                    </p>
                    @endif
                    <p class=" mt-3"><span class="font-weight-bold">Product Specification:</span></p>
                    <p class=" mt-1"><span class="font-weight-bold">Size:</span> W {{$product->width}} / H
                        {{$product->height}} / D {{$product->depth}} Cm</p>
                    <p class=" mt-1"><span class="font-weight-bold">Upholstery material:</span>
                        {{$product->upholstery->name_en}}</p>
                    <p class=" mt-1"><span class="font-weight-bold">Frame material:
                        </span>{{$product->material->name_en}}</p>
                    <p class=" mt-1"><span class="font-weight-bold">Made in:</span> {{$product->country->name_en}}
                    </p>
                    <p class=" mt-1"><span class="font-weight-bold">Style: </span>{{$product->style->name_en}}</p>
                    <p class=" mt-1"><span class="font-weight-bold">Color: </span>{{$product->color->name_en}}</p>
                    <p class=" mt-1"><span class="font-weight-bold">Guarantee: </span>{{$product->guarantee}} Months
                    </p>

                    @if($product->others)
                    <p class="mt-1"><span class="font-weight-bold">Other: </span> {!! $product->others!!}</p>
                    @endif
                </div>
                <div class="product-details p-2">
                    <p class=" mt-1"><span class="font-weight-bold">Description:</span> {!! $product->description_en !!}
                    </p>
                </div>

                {{-- product review --}}
                @if(auth()->guard('user')->check())
                @if(!$product->hasReview())
                <div id="product_review" class="d-flex justify-content-between align-items-center py-4">
                    <div data-href="{{route('product.rate',$product['id'])}}" class="stars d-block"
                        style="font-size:25px;">
                        <i style="cursor:pointer;" class="far fa-star text-warning" id="one-star"></i>
                        <i style="cursor:pointer;" class="far fa-star text-warning" id="two-star"></i>
                        <i style="cursor:pointer;" class="far fa-star text-warning" id="three-star"></i>
                        <i style="cursor:pointer;" class="far fa-star text-warning" id="four-star"></i>
                        <i style="cursor:pointer;" class="far fa-star text-warning" id="five-star"></i>
                    </div>
                    <b>Product Review?</b>
                </div>
                @endif
                @endif
                {{-- get the related products --}}
                @if(count($product->getRelatedProducts()))
                <div class="related-products p-2">
                    <p class=" mb-2">Related {{Route::currentRouteName()=='user.offer.get'?'Offers':'Products'}} </p>
                    <div class="row px-2">
                        @foreach($product->getRelatedProducts() as $key => $single_product)
                        @if($key < 4) <div class="col-3 px-1">
                            <a class="img" style="background-image:url('{{$single_product->featured_image}}')"
                                href="{{ Route::currentRouteName()=='user.offer.get' ? route('user.offer.get',$single_product->id) : route('user.product.get',$single_product->id) }}"></a>
                    </div>
                    @endif
                    @endforeach
                </div>

                <div class="row px-2">
                    @foreach($product->getRelatedProducts() as $key => $single_product)
                    @if($key > 3)
                    <div class="col-3 px-1">
                        <a class="img" style="background-image:url('{{$single_product->featured_image}}')"
                            href="{{ Route::currentRouteName()=='user.offer.get' ? route('user.offer.get',$single_product->id) : route('user.product.get',$single_product->id) }}">
                        </a>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
            @endif

            <div class="product-feeds py-2">
                {{-- feed back statistics --}}
                <p class="py-2"><span id="product-likes-count-{{$product->id}}">{{$product->likes->count()}}
                        Likes</span> . {{$product->saves->count()}} Saves . <span
                        class="product_comments_count">{{$product->comments->count()}} Comments</span>
                </p>
                @if(auth()->guard('user')->check())
                <div class="like-comment d-flex justify-content-between">
                    <button class="btn btn-info item-like"
                        data-href="{{route('item.like',['id'=>$product->id,'type'=>'product'])}}">
                        <i class="fas fa-thumbs-up"></i>
                        @if($product->userLike)
                        Liked
                        @else
                        Like
                        @endif
                    </button>
                    <button class="btn btn-info" id="product-comment">Comment</button>
                </div>
                @else
                <p style="text-align:center; display:inline-block; width: 100%;">
                    PLease <a href="{{route('user.login.get')}}">Login</a> Or <a
                        href="{{route('user.register.get')}}">SignUp</a> to continue
                </p>
                @endif
                <div class="alert alert-success" role="alert">
                </div>
                <div class="alert bg-red errors">
                </div>
                {{-- comments bar --}}
                <div class="modal fade bd-example-modal-lg show comment-image-modal" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body text-center" id="dynamic-content">
                                <img style="width:auto;height:auto;" class="img-fluid comment-image" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="comments">

                    @foreach($product->comments->chunk(10) as $chunkKey => $chunk)

                    @foreach($chunk as $commentKey => $comment)
                    <div class="card my-2 comment-display-{{$chunkKey}}" style="@if($chunkKey!=0) display:none; @endif">
                        {{-- Main Comment --}}
                        <div class="card-header p-1">
                            <img src="{{$comment->user->image}}" alt="" class="d-inline-block">
                            <p class="font-weight-bold d-inline-block">{{$comment->user->fullname}}
                                @if (auth()->guard('user')->check())
                                @if (auth()->guard('user')->user()->id != $comment->user->id)
                                @if ($comment->user?$comment->user->check_following($comment->user->id ,
                                auth()->guard('user')->user()->id):'')
                                | <a class="" style="color: var(--clr1);">Following</a>
                                @else
                                | <a class="foll" style="color: var(--clr1);" data-count=""
                                    data-id="{{ $comment->user->id }}" data-follow="follow">Follow</a>
                                @endif
                                @endif
                                @endif
                            </p>
                            <p class="text-muted float-right m-2 pt-1">{{$comment->created_at->format('j F Y')}}</p>
                        </div>

                        {{-- Comment Body --}}
                        <div class="card-body p-2 py-3">
                            <p class="card-text">{{$comment->comment}}</p>

                            {{-- Images in Comment active it after add backend code --}}
                            @if($comment->getOriginal('image'))
                            <a href="#" data-image="{{$comment->image}}" role="button"
                                class="d-block show-comment-image" data-toggle="modal">
                                <img src="{{$comment->image}}"
                                    style="width:auto;height:auto;max-width:70%;max-height:400px" class="mt-3 rounded"
                                    alt="" />
                            </a>
                            @endif
                        </div>
                        {{-- Comment Replies --}}
                        <div id="comment-replies-{{$comment->id}}">
                            @foreach($comment->replies->chunk(10) as $replyChunkKey => $replyChuck)
                            @foreach($replyChuck as $replyKey => $reply)
                            <div class="card reply my-2 reply-display-{{$replyChunkKey}} ml-5"
                                style="@if($replyChunkKey!=0)display:none;@endif">
                                <div class="card-header p-1">
                                    <img src="{{$reply->user->image}}" alt="" class="d-inline-block mr-2">
                                    <p class="font-weight-bold d-inline-block">{{ substr($reply->user->fullname,0,30)}}
                                        @if (auth()->guard('user')->check())
                                        @if (auth()->guard('user')->user()->id != $reply->user->id)
                                        @if ($reply->user?$reply->user->check_following($reply->user->id ,
                                        auth()->guard('user')->user()->id):'')
                                        | <a class="" style="color: var(--clr1);">Following</a>
                                        @else
                                        | <a class="foll" style="color: var(--clr1);" data-count=""
                                            data-id="{{ $reply->user->id }}" data-follow="follow">Follow</a>
                                        @endif
                                        @endif
                                        @endif</p>
                                    <p class="text-muted float-right m-2 pt-1">{{$reply->created_at->format('j F Y')}}
                                        <a class="fas fa-flag text-secondary" data-toggle="modal"
                                            data-target="#reportModal"></a></p>
                                </div>
                                <div class="card-header border-0 pl-5 py-3">
                                    <p class="card-text">{{$reply->reply}}</p>

                                    {{-- Images in Replay active it after add backend code --}}
                                    {{--   
                                    <a href="#ReplyImageModal" role="button" class="d-block " data-toggle="modal">
                                        <img src="//placehold.it/1000x800" style="width:auto;height:auto;max-width:70%;max-height:400px"
                                            class="mt-3 rounded" alt="" />
                                    </a>
                                    <div class="modal fade bd-example-modal-lg show" id="ReplyImageModal" role="dialog">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body" id="dynamic-content">
                                                    <img src="//placehold.it/1000x800" style="width:auto;height:auto;" class="img-fluid" alt="" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    --}}
                                </div>
                                <div class="card-footer pl-5 border-0 text-muted p-2 ">
                                    @if(auth()->guard('user')->check())
                                    <button class="btn p-1 mr-2 text-muted reply-like-button"
                                        data-href="{{route('user.topic.reply.like',$reply->id)}}"><i
                                            class="fas fa-thumbs-up"></i> @if($reply->checkLike()) Liked @else Like
                                        @endif</button>
                                    @endif
                                    <p class="text-muted float-right p-2" id="reply-likes-count-{{$reply->id}}">
                                        {{$reply->likes->count()}} Likes</p>
                                </div>
                            </div> <!-- end Reply -->
                            @endforeach
                            @if($loop->remaining > 0)
                            <aside  style="@if($replyChunkKey!=0) display:none; @endif"
                                    data-show="reply-display-{{$replyChunkKey+1}}"
                                    key-show="load-more-{{$replyChunkKey+1}}"
                                    id="load-more-{{$replyChunkKey}}"
                                class="pl-5 pb-2 main-link2 more_reply reply-display-{{$replyChunkKey}}">Load More Replies...</aside>
                            @endif
                            @endforeach
                        </div>


                        {{-- store replies --}}
                        <div class="card-footer border-0 text-muted p-2">
                            @if(auth()->guard('user')->check())
                            <form class="myreply" action="{{route('user.product.reply.store',$comment->id)}}"
                                method="POST" id="comment-reply-{{$comment->id}}" data-commentId="{{$comment->id}}">
                                <input id="reply-{{$comment->id}}" tabindex="-1" maxlength="180" type="text"
                                    class="form-control my-2 reply-input" placeholder="Add Reply ...">
                            </form>
                            <button data-href="{{route('user.product.comment.like',$comment->id)}}"
                                class="btn p-0 mt-2 mr-2 text-muted comment-like-button"><i
                                    class="fas fa-thumbs-up"></i> @if($comment->checkLike()) Liked @else Like
                                @endif</button>
                            <button class="btn p-0 mt-2 mr-2 reply-btn text-muted"><i class="fas fa-reply"></i>
                                Reply</button>
                            @endif
                            <p class="text-muted float-right p-2 comment-replies-likes-{{$comment->id}}">
                                {{$comment->likes->count()}} Likes | {{$comment->replies->count()}} Replies
                            </p>
                        </div>
                        {{-- show more comments  --}}
                    </div>
                    @endforeach
                    @if($loop->remaining > 0)
                    <aside 
                    style="@if($chunkKey!=0) display:none; @endif"
                    key-show="comment-more-{{$chunkKey+1}}"
                    id="comment-more-{{$chunkKey}}"
                    data-show="comment-display-{{$chunkKey+1}}" class="main-link2 pt-1 more_comment">Load
                        More
                        Comments...</aside>
                    @endif
                    @endforeach
                </div>
                @if(auth()->guard('user')->check())
                <div class="alert alert-success" role="alert">
                </div>
                <div class="alert bg-red errors">
                </div>
                {{-- store comment --}}
                <form class="mycomment mt-3" action="{{route('user.product.comment.store',$product->id)}}" method="POST"
                    enctype="multipart/form-data">

                    <img src="{{auth()->guard('user')->user()->image}}"
                        alt="{{auth()->guard('user')->user()->fullname}}">
                    <input id="comment" tabindex="-1" class="btn-block form-control" type="text"
                        placeholder="Write Comment ...">

                    <div class="choosefile">
                        <label for="uploadimg"><i class="far fa-images"></i></label>
                        <input class="d-none" type="file" id="uploadimg"
                            onchange="document.getElementById('profileImage').src = window.URL.createObjectURL(this.files[0])">
                    </div>
                    <div class="imagetoshow border p-2 mt-1 rounded" style="display:none">
                        <img src="" id="profileImage" alt="">
                        <span class="btn btn-danger" style="">X</span>
                    </div>
                    <div class="choosefile">
                        <label for="uploadimg"><i class="far fa-images"></i></label>
                        <input class="d-none" type="file" id="uploadimg">
                    </div>
                </form>

                @endif
            </div>
        </div>
    </div>
    </div>
    @if(CurrentUser() && CurrentUser() === auth('user')->user() && auth('user')->user()->id != $product->showroom->user_id  && CurrentUser()->nonBlocked($product->showroom->id))
    <!-- The Message Modal -->
    <div class="modal fade" id="msgModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Send Message</h4> 
                </div>
                <!-- Modal body -->
                <div class="modal-body p-3 pb-3">
                    <form action="{{ route('user.store.message') }}" method="POST" id="form" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="showroom_id" value="{{ $product->showroom->id }}">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Message</label>
                            <textarea class="form-control mt-1" name="body" id="exampleFormControlTextarea1" rows="4" placeholder="Your Message ...."></textarea>
                            <div class="form-group mt-2">
                                <div class="form-group mt-2">
                                    <p>Upload Image</p>
                                    <div class="col-md-12 mt-1">
                                        <label for="profileImg" style="cursor:pointer">
                                            <div class="close-overlay">
                                                <span class="btn btn-danger fas fa-trash-alt"></span>
                                            </div>
                                            <img src="{{ asset('assets/site/images/add-image.png') }}" style="width:100px; height: 100px; border-radius:5%;margin-bottom: 10px;" id="MessageImage" alt="">
                                        </label>
                                        <input type="file" style="display:none" id="profileImg" name="image[]">
                                    </div>
                                    <div id="image_preview"></div>
                                </div>
                            <button type="submit" class="btn main-btn mt-3">Send Message</button>
                            </div>
                        </div>
                    </form >
                </div>
            </div>
        </div>
    </div>
    <!--End Modal-->
    @endif

     {{--  model for send request price --}}
      <!-- The Message Modal -->
      <div class="modal fade" id="request_price">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Send Request Price</h4> 
                </div>
                <!-- Modal body -->
                <div class="modal-body p-3 pb-3">
                    <form action="{{ route('user.product.request_price.post') }}" method="POST" id="form" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <p class="text-center mb-2">
                            You will send the Request  ? 
                        </p>
                        <div class="text-center mt-2">
                            <button class="btn btn-success"> Send</button>
                            <button type="button" class="btn main-btn2" data-dismiss="modal">Close</button>
                        </div>
                    </form >
                </div>
            </div>
        </div>
    </div>
    <!--End Modal-->
    {{-- =============================== --}}
</section>
@endsection
@section('scripts')
<script src="{{asset('assets/site/js/productComment.js')}}"></script>
<script src="{{asset('assets/site/js/productReview.js')}}"></script>
<script src="{{asset('assets/site/js/likeItem.js')}}"></script>
<script>
    let windowH = $(window).height();
    $(window).scroll(function () {});
    $('.fullheight').height($(window).height());
    $(window).resize(function () {
        $('.fullheight').height($(window).height());
    })

</script>
<script>
    $(document).on(
        'keyup',
        function (event) {
            if (event.key == "Escape") {
                window.history.go();
            }
        });
    $(document).ready(function () {
        $(".foll").on('click', function (e) {
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
    $(document).ready(function () {

        var board_id = $('#board_id :selected').val();

        $("body").on('change',"#board_id",function () {
            board_id = $('#board_id :selected').val();
            if (board_id === "create") {
                $("#append").html('<form action="" id="create_save" style="text-align='+'"center">' +
                    'Board Name <br> <input name="name" id="name" class="form-control " type="text"><br>' +
                    'Board type <br><select name="board_type" id="board_type"' +
                    'data-style="btn-white" class="form-control ">' +
                    '<option value="1">private</option>' +
                    '<option value="0">public</option>' +
                    '</select><br>' +
                    '<input type="submit" value="create and save"' +
                    'class="btn btn-lg btn-success" style="background-color:#3ab1b7;border: thick;margin-left:120px">' +
                    `<img style="background-color:#3ab1b7;border: thick;margin-left:120px;display:none" src='{{asset("images/loading.gif")}}' id="loading-create"   width='50px' height='50px'>`+
                    '</form>');
                    $("#save-button").hide()
            } else {
                $("#append").html("");
                $("#save-button").show()
            }

            $("body").on("submit","#create_save", function (e) {
                e.preventDefault();
                let  _elm = $(this).find("input[type=submit]");
                let name  = $(this).find("input[name=name]");
                if(name.val().length == 0 )
                {
                    Swal.fire({
                                position: 'center',
                                type: 'error',
                                title: 'name is required ',
                                timer: 1500,
                                confirmButtonText: 'done',
                                showLoaderOnConfirm: true,
                                confirmButtonColor: '#21d5de'
                            });

                       return ;     
                }
                _elm.hide();
                let load  = $("#loading-create")
                load.show()
                e.preventDefault();
                $.ajax({
                    type: 'GET', //THIS NEEDS TO BE GET
                    url: "{{ route('create.save.board') }}",
                    data: {
                        board_type: $('#board_type :selected').val(),
                        board_name: $('#name').val(),
                        type: 'product',
                        product_id: parseInt({{$product->id}}),
                    },
                    success: function (data) {
                        $('#SaveModal').modal('toggle');
                    
                        if (data == "ok") {
                            Swal.fire({
                                position: 'center',
                                type: 'success',
                                title: 'Your product saved ',
                                timer: 1500,
                                confirmButtonText: 'done',
                                showLoaderOnConfirm: true,
                                confirmButtonColor: '#21d5de'
                            });
                            load.hide()
                            _elm.show();
                            // $("#board_id option[value=create]").prop('selected', false);
                            // setTimeout(location.reload.bind(location), 2000)
                        } else {
                            Swal.fire({
                                position: 'center',
                                type: 'error',
                                title: 'The product already exist ',
                                timer: 1500,
                                confirmButtonText: 'done',
                                showLoaderOnConfirm: true,
                                confirmButtonColor: '#21d5de'
                            });
                            load.hide()
                            _elm.show();
                            // setTimeout(location.reload.bind(location), 2000)
                        }

                    },
                    error:function(err){
                        load.hide()
                        _elm.show();
                    }
                });
            });
        });

        $("#SaveModal").on("hidden.bs.modal", function () {
            $("input[type=text]").val("");
            $("#board_id").val('select')
            $("#board_id").change()
            $("#append").html("");
            $("#save-button").show()
        }); 

        $(".follow").on('click', function () {
            var count = $(this).attr('data-count');
            var new_count;

            var showroom_id = $(this).attr('data-id');
            if ($(this).html() == 'Follow') {
                $(this).html("Following");
                $.ajax({
                    type: 'GET', //THIS NEEDS TO BE GET
                    url: "{{ route('user.follow.showroom') }}",
                    datatype: 'html',
                    data: {
                        showroom_id: showroom_id,
                    },
                    success: function (data) {
                        $(".new_count").html(data + " Followers");
                    }
                });
            }
        });


        $("#profileImg").on('change', function() {
            if (this.files && this.files[0]) {
                if (this.files.length > 5) {
                    swal.fire("Oops!", "you can upload maximum 5 images", "error");
                    // alert("you can upload maximum 5 images"); 
                }
                $('#MessageImage').remove();

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
        $(".save").on('click', function () {
            let flag = "{!! $product->offer && Route::currentRouteName()=='user.offer.get' !!}"
            let data = {
                board_id: parseInt(board_id),
                product_id: parseInt({{$product->id}}),
                type: flag != "" ? 'offer' : 'product'
            };
            if (!data.board_id) {
                Swal.fire({
                    position: 'center',
                    type: 'error',
                    title: 'Must Select Board ',
                    timer: 1500,
                    confirmButtonText: 'done',
                    showLoaderOnConfirm: true,
                    confirmButtonColor: '#21d5de'
                });
            }
            @if($product->offer && Route::currentRouteName() == 'user.offer.get')
            delete data.product_id
            data['offer_id'] = parseInt({{$product->offer->id}})
            @endif

            $.ajax({
                type: 'GET', //THIS NEEDS TO BE GET
                url: "{{ route('save.product') }}",
                data,
                success: function (data) {
                    $('#SaveModal').modal('toggle');
                    if (data == "ok") {
                        Swal.fire({
                            position: 'center',
                            type: 'success',
                            title: 'Your product saved ',
                            timer: 1500,
                            confirmButtonText: 'done',
                            showLoaderOnConfirm: true,
                            confirmButtonColor: '#21d5de'
                        });
                        // setTimeout(location.reload.bind(location), 2000)
                    } else {
                        Swal.fire({
                            position: 'center',
                            type: 'error',
                            title: 'The product already exist ',
                            timer: 1500,
                            confirmButtonText: 'done',
                            showLoaderOnConfirm: true,
                            confirmButtonColor: '#21d5de'
                        });
                        // setTimeout(location.reload.bind(location), 2000)
                    }
                }
            });

        }); 
    });

</script>
@if(Session::has('success'))
<script>
    Swal.fire({
        type: 'success',
        title: 'Your message has been sent',
        timer: 1500,
        confirmButtonText: 'done',
        showLoaderOnConfirm: true,
        confirmButtonColor: '#21d5de'
    });
    // setTimeout(location.reload.bind(location), 2000)

</script>
@endif
@if(Session::has('Compare'))
<script>
    Swal.fire({
        type: 'info',
        showConfirmButton: true,
        title: "{{Session::get('Compare')}}",
        showConfirmButton: false,
        timer: 3000,
        showConfirmButton: false,
        confirmButtonText: 'done',
        showLoaderOnConfirm: true,
        confirmButtonColor: '#21d5de'
    });
</script>
@endif
@if(Session::has('save'))
<script>
    Swal.fire({
        type: 'success',
        showConfirmButton: true,
        title: 'The Product saved successfully',
        showConfirmButton: false,
        timer: 3000,
        showConfirmButton: false,
        confirmButtonText: 'done',
        showLoaderOnConfirm: true,
        confirmButtonColor: '#21d5de'
    });
    // setTimeout(location.reload.bind(location), 2000)

</script>
@endif
@if(Session::has('saved'))
<script>
    Swal.fire({
        type: 'error',
        showConfirmButton: true,
        title: 'The Product Already saved ',
        showConfirmButton: false,
        timer: 3000,
        showConfirmButton: false,
        confirmButtonText: 'done',
        showLoaderOnConfirm: true,
        confirmButtonColor: '#21d5de'
    });
    setTimeout(location.reload.bind(location), 2000)

</script>
@endif
<script>
    //    === Make div square ===
    $('.one-product .related-products .img').outerHeight($('.one-product .related-products .img').outerWidth());
    $(window).on('resize', function () {
        $('.one-product .related-products .img').outerHeight($('.one-product .related-products .img')
            .outerWidth());
    })
</script>
@if($product->offer && Route::currentRouteName()=='user.offer.get')
<script>
    //=== Countdown Timer ===
    //=== Countdown Timer ===
    const second = 1000,
        minute = second * 60,
        hour = minute * 60,
        day = hour * 24;

    let countDown = new Date("{{ $product->offer->expire_date }}").getTime(),
        x = setInterval(function () {

            let now = new Date().getTime(),
                distance = countDown - now;
            document.getElementById('days').innerText = Math.floor(distance / (day)),
                document.getElementById('hours').innerText = Math.floor((distance % (day)) / (hour)),
                document.getElementById('minutes').innerText = Math.floor((distance % (hour)) / (minute)),
                document.getElementById('seconds').innerText = Math.floor((distance % (minute)) / second);
        }, second)

</script>
@endif
<script>
     @if(Session::has('successSafwat'))
            Swal.fire({
                type: 'success',
                title: "{{session()->get('successSafwat')}}",
                timer: 1500,
                confirmButtonText: 'done',
                showLoaderOnConfirm: true,
                confirmButtonColor: '#21d5de'
            });
            // setTimeout(location.reload.bind(location), 2000)

    
       @endif
</script>


@endsection
