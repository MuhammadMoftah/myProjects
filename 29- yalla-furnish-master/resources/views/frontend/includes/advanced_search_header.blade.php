<!--filter row-->
<div class="col-12 mt-4 px-3">
    <h1 class="h3"> {{ $keyword }}</h1>
</div>
<!-- ==== buttons slider in large screens ==== -->
<div class="categories col-12 py-3 px-3 d-md-block d-none">
    <div class="row">
        <div class="col-md">
            <a href="{{route('advanced.search.showrooms',['keyword'=>$keyword])}}" class="btn main-btn3 bs px-2 w-100">Showrooms </a>
        </div>
        <div class="col-md">
            <a href="{{route('advanced.search.products',['keyword'=>$keyword])}}" class="btn main-btn3 bf px-2 w-100">Products</a>
        </div>

        <div class="col-md">
            <a href="{{route('advanced.search.offers',['keyword'=>$keyword])}}" class="btn main-btn3 bo px-2 w-100">Offers
            </a>
        </div>
        <div class="col-md">
            <a href="{{route('advanced.search.ideas',['keyword'=>$keyword])}}" class="btn main-btn3 bi px-2  w-100">News &
                Ideas </a>
        </div>
        {{--
        <div class="col">
            <a href="" class="btn main-btn3 px-2 w-100">Professionals</a> 
        </div>

        <div class="col">
                <a href="" class="btn main-btn3 px-2 w-100">Events </a> 
        </div>
        --}}
    </div>
</div>

<!-- ==== buttons slider in small screens ==== -->
<div class="col-12 d-md-none py-3">
    <div class="search-slide-buttons" data-flickity='{ "wrapAround": true,"prevNextButtons": true,"pageDots": false,"contain": true}'>
        <a href="{{route('advanced.search.showrooms',['keyword'=>$keyword])}}" class="btn main-btn3 bs px-2 ml-4">Showrooms </a>

        <a href="{{route('advanced.search.products',['keyword'=>$keyword])}}" class="btn main-btn3 bf px-2 ml-4">Products</a>

        {{-- <a href="" class="btn main-btn3 px-2 ml-4">Professionals</a> --}}

        <a href="{{route('advanced.search.offers',['keyword'=>$keyword])}}" class="btn main-btn3 bo px-2 ml-4">Offers
        </a>

        {{-- <a href="" class="btn main-btn3 px-2 ml-4">Events </a> --}}

        <a href="{{route('advanced.search.ideas',['keyword'=>$keyword])}}" class="btn main-btn3 bi px-2 ml-4">News & Ideas </a>
    </div>
</div>