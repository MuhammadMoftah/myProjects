<div class="row vendors bg-transparent">
    @if(count($showrooms))
    @foreach ($showrooms as $key => $showroom)

    <div class="col-6 col-lg-3 col-md-4 px-2">
        {{-- cursor:pointer; --}}
        {{-- data-url="{{route('user.get.showroom_detailes',$showroom->id)}}" id="showroomImageFigure" --}}
        <div class="part card" id="showroom-{{ $showroom->id }}" style="min-height: 220px;">
            {{-- <figure  class="img mb-0" style="background-image:url('{{  $showroom->showroom_image }}');">
            </figure> --}}
            <a class="img mb-0" href="{{route('user.get.singleShowroom',['slug' => $showroom->slug ])}}" class="img" style="background-image: url('{{  $showroom->showroom_image }}');"></a>

            <div class="card-footer bg-white">
                <h6 class="card-title mb-0">
                    <a href="{{route('user.get.singleShowroom',['slug' => $showroom->slug ])}}" class="main-color" id="showroomDetailsLink">{{ substr($showroom->name_en, 0,22) }}</a>
                </h6>
                <div class="stars d-inline-block">
                    @for ($i = 0; $i < $showroom->showroom_rate; $i++)
                        <i class="fas fa-star text-warning"></i>
                        @endfor
                        @for ($i = 5; $i > $showroom->showroom_rate; $i--)
                        <i class="far fa-star text-warning"></i>
                        @endfor
                </div>
                <div class="social">
                    @if(auth()->guard('user')->check() && auth('user')->user()->id!=$showroom->user_id)
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
    <script>
        $('.vendors #showroom-{{ $showroom->id }}').css({
            'height': $('.vendors #showroom-{{ $showroom->id }}').width() + 'px'
        });
        $(window).on('resize', function() {
            $('.vendors #showroom-{{ $showroom->id }} ').css({
                'height': $('.vendors #showroom-{{ $showroom->id }} ').width() + 'px'
            });
        })
    </script>
    @if ($key == 15 )
    <div class="col-md-12 px-2">
        <div class="col-md-12 p-0">
            <section class="cover" style="background-image:url('{{ asset('assets/site/images/featured_products.jpg') }}');">
            </section>
        </div>
    </div>
    @endif
    @if ($key == 31 )
    <div class="col-md-12 px-2">
        <div class="col-md-12 p-0">
            <section class="cover" style="background-image:url('{{ asset('assets/site/images/featured_products.jpg') }}');">
            </section>
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
@else
<h5 class="w-100 text-center text-danger mt-5">
    No Showrooms Found
</h5>
@endif
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
                        $(".new_count").html(data + " Followers");
                    }
                });
            }

        });

    });
</script>