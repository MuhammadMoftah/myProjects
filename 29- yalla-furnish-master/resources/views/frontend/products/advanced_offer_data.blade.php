<div class="col-md-10 product-content">
    <div class="row vendors offers bg-transparent px-2">
        <div class="col-md-12 mt-4 mt-md-0 d-flex justify-content-between px-2">
            <h3>Offers</h3>
        </div>
        @if (count($offers)>0)
        @foreach ($offers as $offer )
        <div class="col-xl-4 col-md-6 px-2">
            <div class="part card">
                <img src="{{$offer->product->featured_image}}" class="card-img-top" alt="">
                <aside class="overlay text-center">
                    <h2 class="h1">{{ $offer->discount }}% OFF</h2>
                    <p>{{ $offer->product->name_en }}</p>
                    <date>Valid Until {{$offer->expire_date->format('j F Y')}}</date>
                </aside>
                <div class="card-footer">
                    <h6 class="card-title mb-1">{{ $offer->product->name_en }}</h6>
                    <h6 class="card-title">{{ $offer->product->showroom->name_en }}</h6>
                    <div class="social mt-2">
                        <a href="{{ route('user.offer.get',$offer->product->id) }}" class="small main-link2">See Details</a>
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
    </div>
</div>