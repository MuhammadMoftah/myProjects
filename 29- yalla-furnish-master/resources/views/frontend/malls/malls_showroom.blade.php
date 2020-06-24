<div class="row vendors bg-transparent col-12">
    @if(count($mall->showrooms))
    @foreach ($mall->showrooms as $key => $showroom)
    <div class="col-6 col-lg-3 col-md-4 px-2">
        <div class="part card" id="showroom-{{ $showroom->id }}" style="min-height: 220px;">
            <a class="img mb-0" href="{{route('user.get.singleShowroom',['slug' => $showroom->slug ])}}" class="img" style="background-image: url('{{  $showroom->showroom_image }}');"></a>

            <div class="card-footer bg-white">
                <h6 class="card-title mb-0">
                    <a href="{{route('user.get.singleShowroom',['slug' => $showroom->slug ])}}" class="main-color" id="showroomDetailsLink">{{ substr($showroom->name_en, 0,22) }}</a>
                </h6>
                <div class="stars d-inline-block">
                    @for ($i = 0; $i < $showroom->rate; $i++)
                        <i class="fas fa-star text-warning"></i>
                        @endfor
                        @for ($i = 5; $i > $showroom->rate; $i--)
                        <i class="far fa-star text-warning"></i>
                        @endfor
                </div>
                <div class="social">

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
    @endforeach
    @else
    <h5 class="w-100 text-center text-danger mt-5">
        No Showrooms Found
    </h5>
    @endif
</div>