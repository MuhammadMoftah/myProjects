<div class="col-lg-12 px-2">
    @if(count($updates)>0)
    @foreach($updates as $update)
    @if($update->topic_id != null)
    <section class="update-section border-bottom py-3">
        <a href="{{ route('user.view.profile',$update->user->id) }}">{{ $update->user->first_name }}</a>
        Posted in Community
        <div class=" rounded p-1 mt-2 offer-link">
            <a class="rounded main-btn d-flex flex-column p-2 justify-content-around text-center" href="{{ route('user.get.topic',$update->topic->id) }}">
                <p>{{ date('m-Y-d', strtotime($update->topic->created_at)) }}</p>
            </a>
        </div>
    </section>
    @elseif ($update->idea_id != null)
    <section class="update-section border-bottom py-3">
        <a href="{{ route('user.view.profile',$update->user->id) }}">{{ $update->user->first_name }}</a>
        Posted in New Idea
        <div class=" rounded p-1 mt-2 offer-link">
            <a class="rounded main-btn d-flex flex-column p-2 justify-content-around text-center" href="{{ route('user.get.idea',['id'=>$update->idea['id']]) }}">
                <p>{{ date('m-Y-d', strtotime($update->idea['created_at'])) }}</p>
            </a>
        </div>
    </section>
    @endif
    @endforeach
    @else
    <div class="col-12 text-danger py-4">
        <h4 class=" text-center "> No Updates</h4>
    </div>
    @endif
</div>
<div class="col-lg-12 px-2">
    @if ($showroom_updates)
    @foreach ($showroom_updates as $showroom_update)
    @if($showroom_update->product_id)
    <section class="update-section border-bottom py-3">
        <a href="{{ route('user.get.singleShowroom',['slug' => $showroom_update->showroom->slug  ]) }}">{{ $showroom_update->showroom->name_en }}</a>
        Posted in New Product
        <div class=" rounded p-1 mt-2 offer-link">
            <a style="background-image:url('{{$showroom_update->product->featured_image}}');" class="rounded main-btn d-flex flex-column p-2 justify-content-around text-center" href="{{ route('user.product.get',$showroom_update->product->id) }}" style="background-image: url('{{ $showroom_update->product->featured_image }}');background-size: cover;
                background-repeat: no-repeat;
                background-position: center">
            </a>
        </div>
    </section>
    @elseif($showroom_update->offer_id && $showroom_update->offer)
    <section class="update-section border-bottom py-3">
        <a href="{{ route('user.get.singleShowroom',['slug' => $showroom_update->showroom->slug  ]) }}">{{ $showroom_update->showroom->name_en }}</a>
        Posted in New Offer
        <div class=" rounded p-1 mt-2 offer-link">
            <a style="background-image:url('{{$showroom_update->offer->featured_image}}');" class="rounded main-btn d-flex flex-column p-2 justify-content-around text-center" href="{{ route('user.offer.get',$showroom_update->offer_id) }}">
            </a>
        </div>
    </section>
    @endif
    @endforeach
    @endif
</div>