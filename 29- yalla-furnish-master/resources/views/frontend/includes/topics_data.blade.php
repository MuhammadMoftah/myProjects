@if(count($topics) > 0)
@foreach ($topics as $topic)
<div class="card lunched-post my-2" style="cursor:pointer;max-width:600px;width: 100%;">
    <div class="card-header px-1 pt-2 bg-white border-0">
        <figure style="background-image:url('{{$topic->user_image}}');height:52px !important;" class="img d-inline-block mr-2"></figure>
        <p class="font-weight-bold d-inline-block user-name">
            @if($topic->user_id) {{$topic->user_name}} @else Yalla-Furnish @endif
            @if (auth()->guard('user')->check() && auth()->guard('user')->user()->id != $topic->user->id)
        </p>
        @if ($topic->user->check_following($topic->user->id , auth()->guard('user')->user()->id))
        | <a href="javascript:void(0);" style="color: var(--clr1);">Following</a>
        @else
        | <a href="javascript:void(0);" class="foll" style="color: var(--clr1);" data-id="{{ $topic->user->id }}" data-follow="follow">Follow</a>
        @endif
        @endif
        <a class="fas fa-flag text-secondary" href="{{ route('user.get.topic',$topic->id) }}">
            <p class="text-muted float-right m-3">{{$topic->created_at->format('j F Y')}}
        </a>
        @if(auth()->guard('user')->check() && $topic->user_id === auth()->guard('user')->user()->id)
        <a class="fas fa-trash-alt trash-link deleteTopic" data-delete-id="{{$topic->id}}"></a>
        <a href="{{route('user.topic.edit', $topic->id)}}" class="fas fa-edit mx-2 main-link"></a>
        <form method="POST" action="{{route('user.topic.delete',['id' => $topic->id])}}" class="delete-form-{{$topic->id}}">@csrf</form>
        @endif
        </p>
    </div>

    <div class="card-body pt-0 pb-3">
        <p class="topic-body card-text pb-3">{!! $topic->body !!}</p>
        @foreach($topic->categories as $category)
        <a href="#" class="px-2 text-white d-inline-block rounded" style="background-color: #939393;"># {{$category->name_en}}</a>
        @endforeach
    </div>
    <div class="topic-imgs py-2">
        <div class="container">
            <div class="row" id="{{$topic->id}}">
                @foreach($topic->images as $topic_image)
                <a class="col p-0 img" id="topic-image-{{$topic_image->id}}" data-fancybox="gallery" href="{{$topic_image->image}}" style="background-image: url('{{ $topic_image->image }}')">
                </a>
                <script>
                    //To MAke Images Square
                    $(window).on('load', function() {
                        $('#topic-image-{{$topic_image->id}}').css({
                            'height': $('#topic-image-{{$topic_image->id}}').width() + 'px'
                        });
                    });

                    $('#topic-image-{{$topic_image->id}}').css({
                        'height': $('#topic-image-{{$topic_image->id}}').width() + 'px'
                    });

                    $(window).on('resize', function() {
                        $('#topic-image-{{$topic_image->id}}').css({
                            'height': $('#topic-image-{{$topic_image->id}}').width() + 'px'
                        });
                    });
                    $('#topic-image-{{$topic_image->id}}').fancybox();

                    $('body').on('click', '.main-link', function() {
                        //To MAke Images Square
                        $(window).on('load', function() {
                            $('#topic-image-{{$topic_image->id}}').css({
                                'height': $('#topic-image-{{$topic_image->id}}').width() + 'px'
                            });
                        });

                        $('#topic-image-{{$topic_image->id}}').css({
                            'height': $('#topic-image-{{$topic_image->id}}').width() + 'px'
                        });

                        $(window).on('resize', function() {
                            $('#topic-image-{{$topic_image->id}}').css({
                                'height': $('#topic-image-{{$topic_image->id}}').width() + 'px'
                            });
                        });
                        $('#topic-image-{{$topic_image->id}}').fancybox();
                    });
                </script>
                @endforeach
            </div>
        </div>
    </div>
    <div class="card-footer text-muted p-2 bg-white">
        <p class="float-right p-2">
            {{$topic->likes->count()}} Likes | {{$topic->comments->count()}} Comments | {{$topic->shares->count()}} Shares
        </p>
    </div>
</div><!-- End card-->
@endforeach
<div class="col-md-12 text-center my-4">
    <nav aria-label="Page navigation example">
        @include('frontend.paginators.topics_paginator', ['topics' => $topics])
    </nav>
</div>
@else
<h5 class="w-100 text-center text-danger mt-5">
    No Topics found
</h5>
@endif