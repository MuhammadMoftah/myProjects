@if (auth()->guard('user')->check() && auth()->guard('user')->user()->content_creator == 1 && auth()->guard('user')->user()->id == $user->id )

<a href="{{ route('creator.create.get') }}" class="btn main-btn2 m-2"> Create New Idea</a>
@endif
@if (count($ideas) > 0)
@foreach ($ideas as $idea)
<div class="col-md-12 px-2" id="product-content">
    <div class="container p-0">
        <div class="row border-0 rounded article" style="margin: 15px 0;
                                            overflow: hidden;
                                            border: none;
                                            box-shadow: 1px 1px 5px #b4b4b4;
                                            position: relative;">
            <a href="{{ route('user.get.idea',$idea->id) }}" class="col-lg-6 p-0 article-img" style="background-image:url({{ $idea->idea_image }});"></a>
            <div class="col-lg-6 p-3 d-flex flex-column justify-content-between">
                <h5>{!! $idea->name_en !!}</h5>
                <p class="text-muted pb-3">{!! $idea->mini_description !!}</p>
                <div class="d-flex align-ideas-center justify-content-between">
                    <a href="{{ route('user.get.idea',$idea->id) }}" class="btn main-btn2 px-4"> Full Articale</a>
                    @if (auth()->guard('user')->check() && auth()->guard('user')->user()->content_creator == 1 && auth()->guard('user')->user()->id == $user->id )
                    <a Title="Delete" href="{{ route('creator.delete',$idea->id) }}" class="btn btn-danger delete_alert" style="min-width: 50px;"> <i class="far fa-trash-alt"></i></a>
                    <a Title="Edit" href="{{ route('creator.edit',$idea->id) }}" class="btn btn-info" style="min-width: 50px;"><i class="far fa-edit"></i></a>
                    @endif
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
</div>
@endforeach
<div class="col-md-12 text-center my-4">
    <nav aria-label="Page navigation example">
        @include('frontend.paginators.ideas_paginator', ['ideas' => $ideas])
    </nav>
</div>
@else
<h5 class="w-100 text-center text-danger mt-5">
    No Ideas Found
</h5>
@endif