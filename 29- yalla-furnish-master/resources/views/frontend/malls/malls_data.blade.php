<div class="row vendors bg-transparent">
    @if(count($malls))
    @foreach ($malls as $key => $mall)
    <div class="col-6 col-lg-3 col-md-4 px-2">
        <div class="part card" id="mall-{{ $mall->id }}" style="min-height: 220px;">
            <a class="img mb-0" href="{{route('user.get.mall',['id' => $mall->id ])}}" class="img" style="background-image: url('{{  $mall->image }}');"></a>
            <div class="card-footer bg-white">
                <h6 class="card-title mb-0">
                    <a href="{{route('user.get.mall',['id' => $mall->id ])}}" class="main-color" id="showroomDetailsLink">{{ substr($mall->name, 0,22) }}</a>
                </h6>
            </div>
        </div>
    </div>
    <script>
        $('.vendors #mall-{{ $mall->id }}').css({
            'height': $('.vendors #mall-{{ $mall->id }}').width() + 'px'
        });
        $(window).on('resize', function() {
            $('.vendors #mall-{{ $mall->id }} ').css({
                'height': $('.vendors #mall-{{ $mall->id }} ').width() + 'px'
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
            @include('frontend.paginators.malls_paginator', ['malls' => $malls])
        </nav>
    </div>
</div>
@else
<h5 class="w-100 text-center text-danger mt-5">
    No Malls Found
</h5>
@endif