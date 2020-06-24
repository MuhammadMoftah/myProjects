@if(count($ideas) > 0)
@foreach ($ideas as $key=>$idea )
@if($key == 4 || $key == 8 )
<div class="col-md-12 px-2">
    <div class="col-md-12 p-0">
        <section class="cover" style="background-image:url('{{ asset('assets/site/images/featured_products.jpg') }}');"></section>
    </div>
</div>
@endif
<div class="container p-0">
    <div class="row border-0 rounded article part">
        <a href="{{route('user.get.idea',$idea->id)}}" class="col-lg-6 p-0 article-img" style="background-image:url('{{$idea->idea_image}}');">
        </a>
        <div class="col-lg-6 p-3 d-flex flex-column justify-content-between bg-white">
            <h5>{!! $idea->name_en !!}</h5>
            <p class="text-muted pb-3">{!! $idea->mini_description !!}</p>
            <div class="d-flex align-items-center justify-content-between">
                <a href="{{route('user.get.idea',$idea->id)}}" class="btn main-btn2"> Full Articale</a>
                <ul>
                    <li class="d-inline-block social">
                        <i class="fas fa-thumbs-up"></i>
                        <span class="small">{{$idea->likes->count()}}</span>
                    </li>
                    <li class="d-inline-block social">
                        <i class="fas fa-comment-dots"></i>
                        <span class="small">{{$idea->comments->count()}}</span>
                    </li>
                    <li class="d-inline-block social">
                        <i class="fas fa-heart"></i>
                        <span class="small">{{$idea->saves->count()}}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endforeach
@include('frontend.paginators.ideas_paginator', ['ideas' => $ideas])
@else
<h5 class="w-100 text-center text-danger mt-5">
    No Ideas found
</h5>
@endif