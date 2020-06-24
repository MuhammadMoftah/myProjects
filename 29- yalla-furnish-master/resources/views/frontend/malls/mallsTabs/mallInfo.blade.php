{{-- info content --}}
<div class="row pb-4 mb-5" style="display:none;" id="info-content">
    <div class="col-md-12 border-bottom py-3">
        <h5>Name</h5>
        <p class="py-2 text-secondary">
            {{ $mall->name }}
        </p>
        <h5>About</h5>
        <p class="py-2 text-secondary">
            {{ $mall->about }}
        </p>
        @if($mall->facebook || $mall->twitter || $mall->instagram)
        <h5>Social Media</h5>
        <div class="social-network">
            @if($mall->instagram)
            <a href="{{ $mall->instagram }}" class='main-link my-2'>
                <i class="fab fa-instagram"></i> instagram
            </a>
            @endif
            @if($mall->facebook)
            <a href="{{ $mall->facebook }}" class='main-link my-2'>
                <i class="fab fa-facebook-square"></i> Facebook
            </a>
            @endif
            @if($mall->twitter)
            <a href="{{ $mall->twitter }}" class='main-link my-2'>
                <i class="fab fa-twitter-square"></i> Twitter
            </a>
            @endif
        </div>
        @endif
        @if($mall->location)
        <h5>Location</h5>
        <p class="py-2 text-secondary">
            {{ $mall->location }}
        </p>
        @endif
        @if($mall->location)
        <h5>Opening Hours</h5>
        <p class="py-2 text-secondary">
            {!! $mall->opening_hours !!}
        </p>
        @endif
        @if($mall->location)
        <h5>Location</h5>
        <p class="py-2 text-secondary">
            {{ $mall->location }}
        </p>
        @endif
        <div class="maps" id="map" style="height:500px; width:700px;"></div>
    </div>
</div>