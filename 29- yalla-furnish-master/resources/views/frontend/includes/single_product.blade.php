<div class="col-lg-4 col-sm-6 px-2">
    <div class="new-single-product part card part-product">
        <a href="{{route('user.product.get',$product->id)}}" class="img" style="background-image: url('{{$product->featured_image}}');"></a>
        <!-- <span class="sponsored"><i class="fas fa-exclamation-circle"></i> Sponsored </span> -->
        <div class="card-footer bg-white p-1 d-flex flex-column justify-content-around h-25">
            @if(!auth('user')->check())
            <aside class="overlay d-flex justify-content-around">
                <a href="{{route('user.login.get')}}" class="font-weight-bold text-white" style="font-size: 14px;">Save</a>
                <a href="{{route('user.login.get')}}" class="font-weight-bold text-white" style="font-size: 14px;">Compare</a>
                <a href="{{route('user.login.get')}}" class="font-weight-bold text-white" style="font-size: 14px;">Message</a>
                <a href="{{route('user.login.get')}}" class="font-weight-bold text-white" style="font-size: 14px;">Share</a>
            </aside>
            @else
            <aside class="overlay d-flex justify-content-around">
                <a href="#" data-save-count="{{$product->saves->count()}}" data-comment-count="{{$product->saves->count()}}" data-background="{{count($product->images) !== 0 && $product->images[0] ? $product->featured_image : asset('assets/images/animation-bg.jpg')}}" data-rate="{{(int)$product->rate}}" data-price="{{$product->price}}" data-id="{{$product->id}}" data-name="{{$product->name_en}}" class="font-weight-bold text-white saveButton" style="font-size: 14px;">Save</a>
                <a href="{{route('user.product.compare',$product->id)}}" class="font-weight-bold text-white compare_btn" style="font-size: 14px;">Compare</a>
                @if(CurrentUser() && CurrentUser() === auth('user')->user() && auth('user')->user()->id != $product->showroom->user_id && CurrentUser()->nonBlocked($product->showroom->id))
                <a href="#" data-showroom="{{$product->showroom->id}}" class="font-weight-bold text-white messageButton" style="font-size: 14px;">Message</a>
                @endif
                <a href="#" class="font-weight-bold text-white shareButton" style="font-size: 14px;" data-facebook="{{route('user.product.share',[$product->id,'facebook'])}}" data-twitter="{{route('user.product.share',[$product->id,'twitter'])}}" data-linkedin="{{route('user.product.share',[$product->id,'linkedin'])}}" data-email="{{route('user.product.shareViaEmail',$product->id)}}">Share</a>
            </aside>
            @endif
            <div class="price-and-rating border-bottom d-flex justify-content-between align-items-center pb-1">
                <p class="font-weight-bold">
                    @if(!$product->hidden_price && $product->price !="N/A")
                            {{$product->price}} EGP
                    @else
                        @if(auth('user')->check() && auth("user")->id() == $product->showroom->user_id) 
                           {{$product->price}} EGP
                        @else
                         <button class="btn btn-info ask-price" data-id="{{$product->id}}">Request Price</button>        
                        @endif
                    @endif
                </p>
                <div class="stars d-block">
                    @for ($i = 0; $i < (int)$product->rate; $i++)
                        <i class="fas fa-star text-warning"></i>
                        @endfor
                        @for ($i = 5; $i > (int)$product->rate; $i--)
                        <i class="far fa-star text-warning"></i>
                        @endfor
                </div>
            </div>

            <div class="small font-weight-bold" style="font-size:15.5px">
                @if(count($product->categories)>0)
                <a href="{{ route('user.get.products',['categorySlug'=>$product->categories[0]->slug]) }}" class="main-link2 ">{{$product->categories[0]->name_en}}</a> By
                @endif
                <a href="{{route('user.get.singleShowroom',['slug'=>$product->showroom->slug])}}" class="main-link2">{{$product->showroom->name_en}}</a>
            </div>

            <div class="social-and-date d-flex justify-content-between">
                <div class="social-info text-muted " style="font-size:11px">
                    <span>{{$product->saves->count()}} Saves |</span>
                    <span>{{$product->likes->count()}} Likes |</span>
                    <span>{{$product->comments->count()}} Comments</span>
                </div>
                <p class="text-muted d-block d-md-none d-lg-block" style="font-size:11px">{{$product->created_at->format('j F Y')}}</p>
            </div>
        </div>
    </div>
</div>

