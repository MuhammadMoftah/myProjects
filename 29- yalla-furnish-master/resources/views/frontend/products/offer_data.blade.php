@if (count($offers)>0)
@foreach ($offers as $key => $offer)
@if(isset($featured_stores) && ($key==9 || $key==18 || ($key==27)))
<div class="col-md-12 px-2">
    <div class="col-md-12 p-0">
        <section class="cover" style="background-image:url('{{ asset('assets/site/images/featured_products.jpg') }}');"></section>
    </div>
</div>
@endif
<div class="col-xl-4 col-md-6 px-2">
    <div class="part card">
        <img src="{{$offer->product->featured_image}}" class="card-img-top" alt="">
        <aside class="overlay text-center">
            <a href="{{ route('user.offer.get',$offer->product->id) }}" style="height:100%;color:white;display: flex;flex-direction: column;justify-content: center;">
                <h2 class="h1 m-0 text-white">{{$offer->discount}}% OFF</h2>
                <p class=" text-white">{{$offer->product->name_en}}</p>
                <date>Valid Until {{$offer->expire_date->format('j F Y')}}</date>
            </a>
        </aside>
        <div class="card-footer" style="background-color:white;">
            <h6 class="card-title mb-0">Price: {{$offer->offer_price}} EGP</h6>
            <h6 class="card-title mb-0">Was {{$offer->product->price}} EGP</h6>
            
            <h6 class="card-title mb-0" style="color:var(--clr1)">You Will Save
                {{ ($offer->product->price * $offer->discount )/100 }} EGP</h6>
            <div class="social">
                <p class="card-title mb-0"> {{$offer->discount}}%</p>
                <a href="{{route('user.offer.get',$offer->product->id)}}" class="small main-link2">See Details</a>
            </div>
        </div>
    </div>
</div>
@endforeach
<div class="col-md-12 text-center my-4">
    <nav aria-label="Page navigation example">
        @include('frontend.paginators.offers_paginator', ['offers' => $offers])
    </nav>
</div>
@else
<h5 class="w-100 text-center text-danger mt-5">
    No Offers Found
</h5>
@endif