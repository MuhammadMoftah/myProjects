@if(count($showrooms))
    @foreach ($showrooms as $key => $showroom)
    <div class="col-6 col-lg-3 col-md-4 px-2">
        <div class="part card">
            <img src="{{  $showroom->showroom_image }}" class="card-img-top" alt="">
            <div class="card-footer">
                <h6 class="card-title mb-0"><a href="{{route('user.get.singleShowroom',['slug' => $showroom->slug])}}">{{ substr($showroom->name_en, 0,22) }}</a></h6>
                <div class="stars d-inline-block">
                    @for ($i = 0; $i < $showroom->rate; $i++)
                        <i class="fas fa-star text-warning"></i>
                        @endfor
                        @for ($i = 5; $i > $showroom->rate; $i--)
                        <i class="far fa-star text-warning"></i>
                        @endfor
                </div>
                <div class="social">
                    @if(auth()->guard('user')->check())
                    @if ($showroom->check_following($showroom->id , auth()->guard('user')->user()->id))
                    <button class="btn" title='follow' data-count="{{ $showroom->followers->count() }}" data-id="{{ $showroom->id }}" data-follow="unfollow"> <i class="fas fa-check"></i></button>
                    @else
                    <button class="btn follow" data-count="{{ $showroom->followers->count() }}" data-id="{{ $showroom->id }}" data-follow="follow"> <i class="fas fa-check fa-plus"></i></button>
                    @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
    @if ($key == 15 )
    <div class="col-md-12 px-2">
        <div class="col-md-12 p-0">
            <section class="cover" style="background-image:url('{{ asset('assets/site/images/featured_products.jpg') }}');"></section>
        </div>
    </div>
    @endif
    @if ($key == 31 )
    <div class="col-md-12 px-2">
        <div class="col-md-12 p-0">
            <section class="cover" style="background-image:url('{{ asset('assets/site/images/featured_products.jpg') }}');"></section>
        </div>
    </div>
    @endif
    @endforeach
    <div class="col-md-12 text-center my-4">
        <nav aria-label="Page navigation example">
            @include('frontend.paginators.showrooms_paginator', ['showrooms' => $showrooms])
        </nav>
    </div>
</div>
</div>

@else
<center>
    <h3>no data found</h3>
</center>
@endif
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
<script>
    $(document).ready(function() {
        $(".follow").on('click', function() {
            if ($(this).attr('data-follow') == 'follow') {
                $(this).attr('data-follow', 'unfollow');
                $(this).find('i').removeClass('fa-plus');
                var count = $(this).attr('data-count');

                var new_count;
                var showroom_id = $(this).attr('data-id');
                $.ajax({
                    type: 'GET', //THIS NEEDS TO BE GET
                    url: "{{ route('user.follow.showroom') }}",
                    datatype: 'html',
                    data: {
                        showroom_id: showroom_id,
                    },
                    success: function(data) {
                        console.log(data);
                        $(".new_count").html(data + " Followers");
                    }
                });
            }

        });

    });
</script>@if(count($showrooms))
<div class="row vendors">
    <div class="col-md-12">
        <div class="col-md-12  p-0">
            <section class="cover" style="background-image:url({{ asset('storage/showrooms_images').'/big-proj6.jpg' }});"></section>
        </div>
    </div>
    @foreach ($showrooms as $key => $showroom)
    <div class="col-6 col-lg-3 col-md-4 px-2">
        <div class="part card">
            <img src="{{  $showroom->showroom_image }}" class="card-img-top" alt="">
            <div class="card-footer">
                <h6 class="card-title mb-0"><a href="{{route('user.get.singleShowroom',['slug' => $showroom->slug ])}}">{{ substr($showroom->name_en, 0,22) }}</a></h6>
                <div class="stars d-inline-block">
                    @for ($i = 0; $i < $showroom->rate; $i++)
                        <i class="fas fa-star text-warning"></i>
                        @endfor
                        @for ($i = 5; $i > $showroom->rate; $i--)
                        <i class="far fa-star text-warning"></i>
                        @endfor
                </div>
                <div class="social">
                    @if(auth()->guard('user')->check())
                    @if ($showroom->check_following($showroom->id , auth()->guard('user')->user()->id))
                    <button class="btn" title='follow' data-count="{{ $showroom->followers->count() }}" data-id="{{ $showroom->id }}" data-follow="unfollow"> <i class="fas fa-check"></i></button>
                    @else
                    <button class="btn follow" data-count="{{ $showroom->followers->count() }}" data-id="{{ $showroom->id }}" data-follow="follow"> <i class="fas fa-check fa-plus"></i></button>
                    @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
    @if ($key == 15 )
    <div class="col-md-12">
        <div class="feat-products text-center py-3">
            <h6 class=" text-muted pb-2">Featured Products</h6>
            <a href=""> <img src="{{ asset('storage/showrooms_images').'/9ZuMu8jGtOdbzWK52VnnTtZyiARvLbHaN4jiWbdH.jpeg' }}" alt=""></a>
            <a href=""> <img src="{{ asset('storage/showrooms_images').'/9ZuMu8jGtOdbzWK52VnnTtZyiARvLbHaN4jiWbdH.jpeg' }}" alt=""></a>
            <a href=""> <img src="{{ asset('storage/showrooms_images').'/9ZuMu8jGtOdbzWK52VnnTtZyiARvLbHaN4jiWbdH.jpeg' }}" alt=""></a>
            <a href=""> <img src="{{ asset('storage/showrooms_images').'/9ZuMu8jGtOdbzWK52VnnTtZyiARvLbHaN4jiWbdH.jpeg' }}" alt=""></a>
            <a href=""> <img src="{{ asset('storage/showrooms_images').'/9ZuMu8jGtOdbzWK52VnnTtZyiARvLbHaN4jiWbdH.jpeg' }}" alt=""></a>
            <a href=""> <img src="{{ asset('storage/showrooms_images').'/9ZuMu8jGtOdbzWK52VnnTtZyiARvLbHaN4jiWbdH.jpeg' }}" alt=""></a>

        </div>
    </div>
    @endif
    @if ($key == 31 )
    <div class="col-md-12">
        <div class="feat-products text-center py-3">
            <h6 class=" text-muted pb-2">Featured Products</h6>
            <a href=""> <img src="{{ asset('storage/showrooms_images').'/9ZuMu8jGtOdbzWK52VnnTtZyiARvLbHaN4jiWbdH.jpeg' }}" alt=""></a>
            <a href=""> <img src="{{ asset('storage/showrooms_images').'/9ZuMu8jGtOdbzWK52VnnTtZyiARvLbHaN4jiWbdH.jpeg' }}" alt=""></a>
            <a href=""> <img src="{{ asset('storage/showrooms_images').'/9ZuMu8jGtOdbzWK52VnnTtZyiARvLbHaN4jiWbdH.jpeg' }}" alt=""></a>
            <a href=""> <img src="{{ asset('storage/showrooms_images').'/9ZuMu8jGtOdbzWK52VnnTtZyiARvLbHaN4jiWbdH.jpeg' }}" alt=""></a>
            <a href=""> <img src="{{ asset('storage/showrooms_images').'/9ZuMu8jGtOdbzWK52VnnTtZyiARvLbHaN4jiWbdH.jpeg' }}" alt=""></a>
            <a href=""> <img src="{{ asset('storage/showrooms_images').'/9ZuMu8jGtOdbzWK52VnnTtZyiARvLbHaN4jiWbdH.jpeg' }}" alt=""></a>

        </div>
    </div>
    @endif
    @endforeach
    <div class="col-md-12 text-center my-4">
        <nav aria-label="Page navigation example">
            @include('frontend.paginators.showrooms_paginator', ['showrooms' => $showrooms])
        </nav>
    </div>
</div>
</div>

@else
<center>
    <h3>no data found</h3>
</center>
@endif
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
<script>
    $(document).ready(function() {
        $(".follow").on('click', function() {
            if ($(this).attr('data-follow') == 'follow') {
                $(this).attr('data-follow', 'unfollow');
                $(this).find('i').removeClass('fa-plus');
                var count = $(this).attr('data-count');

                var new_count;
                var showroom_id = $(this).attr('data-id');
                $.ajax({
                    type: 'GET', //THIS NEEDS TO BE GET
                    url: "{{ route('user.follow.showroom') }}",
                    datatype: 'html',
                    data: {
                        showroom_id: showroom_id,
                    },
                    success: function(data) {
                        console.log(data);
                        $(".new_count").html(data + " Followers");
                    }
                });
            }

        });

    });
</script>