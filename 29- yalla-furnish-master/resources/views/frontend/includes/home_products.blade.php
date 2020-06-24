@include('frontend.includes.product_action_modals')
@foreach($products_ideas as $product_idea)
@if($product_idea->type=='product')
@php
$product=$product_idea;
@endphp
@include('frontend.includes.single_product')
@endif

@if($product_idea->type=='idea')
<div class="col-lg-8 col-sm-6 px-2">
    <div class="card new-single-idea part part-product">
        <figure class="img m-0" style="background-image: url('{{$product_idea->idea_image}}');"></figure>
        <a href="{{route('user.get.idea',$product_idea->id)}}" class="overlay"> <button class="btn btn-info" style="font-size: 14px;">Read more</button> </a>
        <div class="card-footer bg-white p-1 d-flex flex-column h-25">
            <div class="showroom-head d-flex justify-content-between pt-1">
                <p class="h6 mb-0 font-weight-bold " style="-webkit-line-clamp: 1">{!!$product_idea->name_en!!}</p>
                <div class="social-info text-muted d-none d-md-block" style="font-size:12px">
                    <span>{{$product_idea->saves->count()}} Saves |</span>
                    <span>{{$product_idea->likes->count()}} Likes |</span>
                    <span>{{$product_idea->comments->count()}} Comments</span>
                </div>
            </div>
            <p class="small text-muted" style="font-size:14px">
                {!! $product_idea->mini_description !!}
            </p>
        </div>
    </div>
</div>
@endif
@endforeach