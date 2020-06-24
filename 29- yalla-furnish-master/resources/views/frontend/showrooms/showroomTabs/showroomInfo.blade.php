{{-- @extends('frontend.showrooms.showroom_details')
@section('main-details') --}}
{{-- info content --}}
<div class="row pb-4" id="info-content">
    @if($showroom->about)
    <div class="col-md-12 border-bottom py-3">
        <h5>About</h5>
        <p class="py-2 text-secondary">
            {{ $showroom->about }}
        </p>
    </div>
    @endif

    <div class="col-md-12 border-bottom py-3">
        <h5 class='mb-4'>Branches</h5>
        <div class="row">
            @if(count($showroom->branches) > 0)
            @foreach ($showroom->branches as $branch)
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="maps" id="map-{{$branch->id}}"></div>
                    <div class="card-footer">
                        <p class="text-secondary">
                            <i class="fas fa-map-marked-alt"></i>
                            {{-- {{ $branch->title ? $branch->title : $branch->address_en }} --}}
                            {{$branch->address_en}}
                        </p>
                        <p class="text-secondary">
                            <i class="fas fa-mobile-alt"></i>
                            @if($branch->mob1) {{$branch->mob1}} @else N/A @endif
                        </p>
                        <p class="text-secondary">
                            <i class="fas fa-mobile-alt"></i>
                            @if($branch->mob2) {{$branch->mob2}} @else N/A @endif
                        </p>
                        @foreach($branch->info as $info)
                        <p class="text-secondary">
                            <i class="far fa-clock"></i>
                            {{ $info->day }} {{$info->from}} - {{ $info->to }}
                        </p>
                        @endforeach
                    </div>
                </div>

                <script>
                    var lat = JSON.parse({{$branch->lat}});
                    var lng = JSON.parse({{$branch->lang}});
                    var map = new google.maps.Map(document.getElementById('map-{{$branch->id}}'), {
                        center: {
                            lat: lat,
                            lng: lng
                        },
                        zoom: 15
                    });
                    var marker = new google.maps.Marker({
                        position: {
                            lat: lat,
                            lng: lng
                        },
                        map: map,
                    });

                </script>
            </div>
            @endforeach
            @endif

        </div>
    </div>
    @if($showroom->getOriginal('website') || $showroom->getOriginal('instgram') || $showroom->getOriginal('yt') 
    || $showroom->getOriginal('fb') || $showroom->getOriginal('tw'))
    <div class="col-md-12 border-bottom py-3">
        <h5 class='mb-4'>{{$showroom->name_en}} on Social Network</h5>
        <div class="social-network">
            @if($showroom->getOriginal('website'))
            <a href="{{ $showroom->website }}" target="_blank" el="noopener noreferrer" class='main-link my-2'>
                <i class="fas fa-globe"></i> website
            </a>
            @endif
            @if($showroom->getOriginal('instgram'))
            <a target="_blank" el="noopener noreferrer" href="{{ $showroom->instgram }}" class='main-link my-2'>
                <i class="fab fa-instagram"></i> instagram
            </a>
            @endif
            @if($showroom->getOriginal('yt'))
            <a target="_blank" el="noopener noreferrer" href="{{ $showroom->yt }}" class='main-link my-2'>
                <i class="fab fa-youtube-square"></i> Youtube
            </a>
            @endif
            @if($showroom->getOriginal('fb'))
            <a target="_blank" el="noopener noreferrer" href="{{ $showroom->fb }}" class='main-link my-2'>
                <i class="fab fa-facebook-square"></i> Facebook
            </a>
            @endif
            @if($showroom->getOriginal('tw'))
            <a target="_blank" el="noopener noreferrer" href="{{ $showroom->tw }}" class='main-link my-2'>
                <i class="fab fa-twitter-square"></i> Twitter
            </a>
            @endif
        </div>

    </div>
    @endif
</div>

{{-- @endsection --}}

<style>
    .social-network {
        display:flex;
        display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    }
    .social-network a i{
        width:auto;
        font-size:20px
    }
</style>