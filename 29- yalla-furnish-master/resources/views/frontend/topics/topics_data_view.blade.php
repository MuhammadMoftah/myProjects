<div class="alert alert-success" role="alert">
</div>
<div class="alert bg-red errors">
</div>
<div class="modal fade bd-example-modal-lg show comment-image-modal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center" id="dynamic-content">
                <img style="width:auto;height:auto;" class="img-fluid comment-image" alt="" />
            </div>
        </div>
    </div>
</div>

<div class="card my-2 p-2 lunched-post bg-white">
    <div class="card-header px-1 pt-2 bg-white border-0">
        @if($topic->user_id!= null)<a href="{{ route('user.view.profile', $topic->user->id ) }}">@endif<img src="{{ $topic->user_image }}" width="48px" height="48" alt="" class="d-inline-block mr-2"></a>
        <p class="font-weight-bold d-inline-block user-name">@if($topic->user_id!= null) <a href="{{ route('user.view.profile', $topic->user->id ) }}">{{ $topic->user_name }}</a> @else
            Yalla-Furnish @endif</p>
        @if (auth()->guard('user')->check())
        @if (auth()->guard('user')->user()->id != $topic->user_id)
        @if ($topic->user?$topic->user->check_following($topic->user->id , auth()->guard('user')->user()->id):'')
        | <a class="" style="color: var(--clr1);">Following</a>
        @elseif($topic->user)
        | <a class="foll" style="color: var(--clr1);" data-count="" data-id="{{ $topic->user->id }}" data-follow="follow">Follow</a>
        @endif
        @endif
        @endif
        @if(auth()->guard('user')->check() && $topic->user && $topic->user_id === auth()->guard('user')->user()->id)
        <div class="dropdown text-muted float-right m-2">
            <button class="btn btn-outline-secondary py-0 px-1" type="button" data-toggle="dropdown">
                <i class="fas fa-ellipsis-h"></i>
            </button>
            <div class="dropdown-menu" >
                <a class="dropdown-item" href="{{route('user.topic.edit', $topic->id)}}">
                    <i class="fas fa-edit"></i> Edit
                </a>
                <a class="dropdown-item deleteTopic" data-delete-id="{{$topic->id}}">
                    <i class="fas fa-trash-alt"></i> Delete
                </a>
                <form method="POST" action="{{route('user.topic.delete',['id' => $topic->id])}}" class="delete-form-{{$topic->id}}">
                    @csrf
                </form>
                {{--<a class="dropdown-item" data-toggle="modal" data-target="#reportModal">
                    <i class="fas fa-flag"></i> Report
                </a>--}}
            </div>
        </div>
        @endif
        <a class="float-right main-link" style="font-size:14px;margin-top: 11px;" href="{{ route('user.get.topic',$topic->id) }}">{{$topic->created_at->format('j F Y')}}</a>

    </div>
    <div class="card-body pt-0 pb-3">
        <p class="topic-body card-text pb-3">
            {!! $topic->body !!}
        </p>
        @if($topic->link)<a class="d-block small pb-3" href="{{$topic->link}}">{{$topic->link}}</a>@endif
        @foreach($topic->categories as $category)
        <a data-id="{{$category->id}}" class="px-2 text-white d-inline-block rounded category-link" style="background-color: #939393;"># {{$category->name_en}}</a>
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
                    })
                    $('#{{$topic->id}} a').fancybox();
                </script>
                @endforeach
            </div>
        </div>
    </div>

    @if(auth()->guard('user')->check())
    <div class="card-footer text-muted p-2 bg-white">
        <button class="btn p-1 mr-2 item-like" style="color: #939393;" data-href="{{route('item.like',['id'=>$topic->id,'type'=>'topic'])}}"><i class="fas fa-thumbs-up"></i>
            @if($topic->userLike)
            Liked
            @else
            Like
            @endif
        </button>
        <button class="btn p-1 mr-2" style="color: #939393;" data-topic_id="{{ $topic->id }}" data-toggle="modal" data-target="#SaveModal{{ $topic->id }}"><i class="fas fa-heart"></i> Save</button>
        <button class="btn p-1 mr-2" data-toggle="modal" data-target="#ShareModal-{{ $topic->id }}" style="color: #939393;"><i class="fas fa-share-square"></i> Share</button>
        <p class="text-info float-right p-2"><span id="topic-likes-count-{{$topic->id}}">{{$topic->likes->count()}} Likes</span> | <span>{{$topic->saves->count()}} Saves</span> | <span id="topic-comments-count-{{$topic->id}}">{{ $topic->comments->count() }} Comments</span></p>
    </div>
    @endif

    <div class="card-footer p-0 bg-white">
        <div id="topic-{{$topic->id}}">
            @foreach($topic->comments->chunk(10) as $chunkKey => $chunk)
            @foreach($chunk as $comment_key => $comment)
            <div class="card comment my-3 comment-display-{{$topic->id}}-{{$chunkKey}}" style="@if($chunkKey!=0) display:none; @endif">
                <div class="card-header p-1 border-0 bg-transparent">
                    <figure style="background-image:url('{{$comment->user->image}}')" class="img d-inline-block mr-2"></figure>
                    <p class="font-weight-bold d-inline-block user-name">{{ substr($comment->user->fullname,0,30)}} </p>
                    <a href="" style="color: var(--clr1);">
                        @if (auth()->guard('user')->check())
                        @if (auth()->guard('user')->user()->id != $comment->user->id)
                        @if ($comment->user?$comment->user->check_following($comment->user->id , auth()->guard('user')->user()->id):'')
                        | <a class="" style="color: var(--clr1);">Following</a>
                        @else
                        | <a class="foll" style="color: var(--clr1);" data-count="" data-id="{{ $comment->user->id }}" data-follow="follow">Follow</a>
                        @endif
                        @endif
                        @endif
                    </a>
                </div>
                <div class="card-header border-0 pl-5 py-3 bg-transparent">
                    <p class="card-text">
                        {!! $comment->comment !!}
                    </p>
                    @if($comment->getOriginal('image'))
                    <a href="#" data-image="{{$comment->image}}" role="button" class="d-block show-comment-image" data-toggle="modal">
                        <img src="{{$comment->image}}" style="width:auto;height:auto;max-width:70%;max-height:400px" class="mt-3 rounded" alt="" />
                    </a>
                    @endif
                </div>
                <div id="comment-replies-{{$comment->id}}">
                    @foreach($comment->replies->chunk(5) as $replyChunkKey => $replyChunk)
                    @foreach($replyChunk as $reply_key => $reply)
                    <div class="card reply my-2 reply-display-{{$topic->id}}-{{$replyChunkKey}}" style="@if($replyChunkKey!=0)display:none;@endif">
                        <div class="card-header p-2 border-bottom border-secondary">
                            <figure style="background-image:url('{{$reply->user->image}}')" class="img d-inline-block mr-2"></figure>
                            <p class="font-weight-bold d-inline-block user-name">{{ substr($reply->user->fullname,0,30)}} </p>
                            <a href="" style="color: var(--clr1);">
                                @if (auth()->guard('user')->check())
                                @if (auth()->guard('user')->user()->id != $reply->user->id)
                                @if ($reply->user?$reply->user->check_following($reply->user->id , auth()->guard('user')->user()->id):'')
                                | <a class="" style="color: var(--clr1);">Following</a>
                                @else
                                | <a class="foll" style="color: var(--clr1);" data-count="" data-id="{{ $reply->user->id }}" data-follow="follow">Follow</a>
                                @endif
                                @endif
                                @endif
                            </a>
                            <p class="text-muted float-right m-2">{{$reply->created_at->format('j F Y')}} <a class="fas fa-flag text-secondary" data-toggle="modal" data-target="#reportModal"></a>
                            </p>
                        </div>
                        <div class="card-header border-0 pl-5 py-3">
                            <p class="card-text">{!! $reply->reply !!}</p>
                        </div>

                        <div class="card-footer pl-5 border-0 text-muted p-2">
                            @if(auth()->guard('user')->check())
                            <button class="btn p-1 mr-2 reply-like-button" style="@if($reply->checkLike()) color: var(--clr1); @else color: #939393; @endif" data-href="{{route('user.topic.reply.like',$reply->id)}}"><i class="fas fa-thumbs-up"></i>
                                @if($reply->checkLike()) Liked @else Like
                                @endif</button>
                            @endif
                            <p class="text-muted float-right p-2" id="reply-likes-count-{{$reply->id}}">
                                {{$reply->likes->count()}} Likes</p>
                        </div>
                    </div> <!-- end Reply -->
                    @endforeach
                    @if($loop->remaining > 0)
                    <aside style="@if($replyChunkKey!=0) display:none; @endif" data-show="reply-display-{{$topic->id}}-{{$replyChunkKey+1}}" key-show="load-more-{{$topic->id}}-{{$replyChunkKey+1}}" id="load-more-{{$topic->id}}-{{$replyChunkKey}}" class="pl-5 pb-2 main-link2 more_reply reply-display-{{$replyChunkKey}}">Load More Replies...</aside>
                    @endif
                    @endforeach
                </div>
                @if(auth()->guard('user')->check())
                <div class="card-footer pl-5 border-0 text-muted p-2">
                    <form class="myreply" action="{{route('user.topic.reply.store',$comment->id)}}" method="POST" id="comment-reply-{{$comment->id}}">
                        <input id="reply-{{$comment->id}}" tabindex="-1" maxlength="180" type="text" class="form-control my-2" placeholder="Add Reply ...">
                    </form>
                    <button class="btn p-1 mr-2 comment-like-button" style="@if($comment->checkLike()) color: var(--clr1); @else color: #939393; @endif" data-href="{{route('user.topic.comment.like',$comment->id)}}"><i class="fas fa-thumbs-up"></i>
                        @if($comment->checkLike()) Liked @else Like @endif</button>
                    <button class="btn p-1 mr-2 reply-btn" style="color: #939393;"><i class="fas fa-reply"></i>
                        Reply</button>
                    <p class="text-info float-right p-2 comment-replies-likes-{{$comment->id}}">
                        {{$comment->likes->count()}} Likes | {{$comment->replies->count()}} Replies</p>
                </div>
                @endif
            </div> <!-- end Comment -->
            @endforeach
            @if($loop->remaining > 0)
            <aside style="@if($chunkKey!=0) display:none; @endif" key-show="comment-more-{{$topic->id}}-{{$chunkKey+1}}" id="comment-more-{{$topic->id}}-{{$chunkKey}}" data-show="comment-display-{{$topic->id}}-{{$chunkKey+1}}" class="main-link2 pt-1 more_comment">Load
                More
                Comments...</aside>
            @endif
            @endforeach
        </div>

        {{--<a href="" class="main-link2">Load More Comments</a>--}}
        @if(auth()->guard('user')->check())
        <form class="mycomment mt-3" method="POST" action="{{route('user.topic.comment.store',$topic->id)}}" enctype="multipart/form-data" id="comment-topic-{{$topic->id}}">
            <img class="userimage" alt="" src="{{auth()->guard('user')->user()->image}}">
            <input name="comment" maxlength="180" id="comment-{{$topic->id}}" tabindex="-1" class="btn-block form-control" type="text" placeholder="Write Comment ...">

            <div class="choosefile">
                <label for="uploadimg"><i class="far fa-images"></i></label>
                <input class="d-none image-{{$topic->id}}" name="image" type="file" id="uploadimg">
            </div>
        </form>
        @endif
        <!--End My Comment-->

    </div>
</div>
{{-- SavedModal --}}
<div class="modal fade savemodal" id="SaveModal{{ $topic->id }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Save Item</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="row product-content trending">
                    <div class="col-md-5 px-2">
                        <div class="part card" style="height: 287.325px;">
                            @foreach($topic->images as $topic_image)
                            <div class="img" style="background-image: url({{$topic_image->image}});">
                                @endforeach
                            </div>
                            <div class="card-body  d-flex flex-column justify-content-between">

                                <p class="card-text text-info m-0">
                                    {{ substr($topic->name_en,0,20) }}
                                </p>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-7 p-2">
                        <div class="form-group">
                            <h4>Choose board</h4>

                            <select name="board_id" data-topic_id="{{ $topic->id }}" data-style="btn-white" class="selectpicker form-control board_id ">
                                <option value="">select board</option>

                                @foreach ($boards as $board)
                                <option value="{{ $board->id }}">{{ $board->name }}</option>
                                @endforeach
                                <option value="create" data-content="
                                                        <div class='d-flex justify-content-between border-top py-1' id='create_new'>
                                                            <span>Creat New Board</span>
                                                            <span class='btn btn-info py-0'> Create</span>
                                                        </div>">
                                </option>
                            </select><br>
                            <div id="append" style="margin-top:15px; ">

                            </div>
                        </div>
                    </div>


                    <div class="modal-footer">
                        <input class="btn main-btn save" value="Save">
                        <button type="button" class="btn main-btn2" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->


        </div>
    </div>
</div>
{{-- End SavedModla --}}

{{-- SavedModel --}}

<div class="modal fade sharemodal" id="ShareModal-{{$topic->id}}">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Share With</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body ">
                <div class="row product-content trending">
                    <div class="col-12 d-flex shareicons justify-content-between text-center border-bottom pb-3">
                        <a target="_blank" href="{{ route('user.topic.share',[$topic->id,'facebook']) }}"><i style="background-color:#3b5998;" class="fab fa-facebook-f"></i></a>
                        <a target="_blank" href="{{ route('user.topic.share',[$topic->id,'twitter']) }}"><i style="background-color:#00acee;" class="fab fa-twitter"></i></a>
                        <a target="_blank" href="{{ route('user.topic.share',[$topic->id,'linkedin']) }}"><i style="background-color:#0077b5;" class="fab fa-linkedin-in"></i></a>
                        <a target="_blank" href="{{ route('user.topic.shareViaEmail',[$topic->id]) }}"><i style="background-color:#0077b5;" class="fas fa-envelope"></i></a>
                        {{-- <a href=""><i style="background-color:#CD2228;"
                    class="fab fa-pinterest-p"></i></a> --}}
                        {{-- <a href=""><i style="background-color:#128c7e;" class="fab fa-whatsapp"></i></a> --}}
                    </div>
                    {{-- <div class="privateshare w-100 py-2 px-3 border-bottom">
            <h4>Share in Private Message</h4>
            <div class="form-group has-search">
                <span class="fa fa-search form-control-feedback"></span>
                <input type="text" class="form-control" placeholder="Search">
            </div>
        </div> --}facebook}
    
        {{-- <div class="sharemail w-100 py-2 px-3">
            <h4>Send in mail</h4>
            <form action="" class="border p-3">
                <div class="form-group">
                    <label for="email">To:</label>
                    <input type="email" class="form-control" id="email"
                        placeholder="Enter Receipt Email here">
                </div>
    
                <div class="form-group">
                    <label for="subject">Subject:</label>
                    <input type="text" class="form-control" id="subject"
                        placeholder="Product Name">
                </div>
    
                <div class="form-group">
                    <label for="message">Message:</label>
                    <textarea style="resize:none" rows="6" class="form-control"
                        id="messsage" placeholder="Your Message"></textarea>
                </div>
                <div class="form-group text-right">
                    <button type="button" class="btn main-btn2"
                        data-dismiss="modal">Cancel</button>
                    <input class="btn main-btn" type="submit" value="Send">
                </div>
            </form>
        </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
<!--End ShareModal-->