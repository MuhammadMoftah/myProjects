@if(count($topics)>0)
@foreach($topics as $topic)

{{-- SavedModel --}}
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
                            </div>
                            @endforeach
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
                            <div id="append-{{ $topic->id }}" style="margin-top:15px; ">

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input class="btn main-btn save" type="button" value="Save">
                        <button type="button" class="btn main-btn2" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
        </div>
    </div>
</div>
{{-- SavedModel --}}
<div class="modal fade sharemodal" id="ShareModal-{{ $topic->id  }}">
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
                </div>
            </div>
        </div>
    </div>
</div>

<!--End ShareModal-->
<div class="lunched-post bg-white mb-4">
    <div class="card my-2 px-2 pt-1 pb-2">
        <div class="card-header px-1 pt-2 bg-white border-0"> 

            @if($topic->user_id!= null)
                <a href="{{ route('user.view.profile',$topic->user_id ) }}">
                    <img src="{{ $topic->user_image }}" width="48px" height="48" alt="" class="d-inline-block mr-2">
                </a>
            @endif 

            <p class="font-weight-bold d-inline-block user-name">
                @if($topic->user_id!= null) 
                <a href="{{ route('user.view.profile', $topic->user_id ) }}">
                    {{ $topic->user_name }}
                </a> 
                @else
                Yalla-Furnish 
                @endif
            </p> 

            @if($topic->user_id && auth()->guard('user')->check())
            <a href="" style="color: var(--clr1);">
                @if (auth()->guard('user')->check())
                    @if (auth()->guard('user')->user()->id != $topic->user_id)
                        @if ($topic->user?$topic->user->check_following($topic->user->id , auth()->guard('user')->user()->id):'')
                            <a class="" style="color: var(--clr1);">| Following</a>
                        @else
                            <a class="foll" style="color: var(--clr1);" data-count="" data-id="{{ $topic->user->id }}" data-follow="follow">| Follow</a>
                        @endif
                    @endif
                @endif
            </a>
            @endif

            @if(auth()->guard('user')->check() && $topic->user_id === auth()->guard('user')->user()->id)
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


            <!-- <p class="text-muted float-right m-2">
                <a href="{{ route('user.get.topic',$topic->id) }}">{{$topic->created_at->format('j F Y')}}</a>
                <a class="fas fa-flag text-secondary" data-toggle="modal" data-target="#reportModal"></a>
                @if(auth()->guard('user')->check() && $topic->user_id === auth()->guard('user')->user()->id)
                <a class="fas fa-trash-alt trash-link deleteTopic" data-delete-id="{{$topic->id}}"></a>
                <a href="{{route('user.topic.edit', $topic->id)}}" class="fas fa-edit mx-2 main-link"></a>
                <form method="POST" action="{{route('user.topic.delete',['id' => $topic->id])}}" class="delete-form-{{$topic->id}}">@csrf</form>
                @endif
            </p> -->
        </div>
        <div class="card-body pt-0 pb-3">
            <p class="topic-body card-text pb-3">{!! $topic->body !!}</p>
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
                        });
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
            <p class="text-info float-right p-2"><span id="topic-likes-count-{{$topic->id}}">{{$topic->likes->count()}} Likes </span> | <span>{{$topic->saves->count()}} Saves </span>| <span id="topic-comments-count-{{$topic->id}}">{{ $topic->comments->count() }} Comments</span></p>
        </div>
        @endif

        {{-- comments and replies --}}
        <div class="card-footer p-0 bg-white" style="@if($topic->comments->count()==0) border:none; @endif">
            <div id="topic-{{$topic->id}}">
                @foreach($topic->comments->chunk(4) as $chunkKey => $chunk)
                   
                @foreach($chunk as $comment_key => $comment)
             
            <div class="card comment my-3 comment-display-{{$topic->id}}-{{$chunkKey}}" style="@if($chunkKey!=0) display:none; @endif" id="comment-container-{{$comment->id}}">
                    <div class="card-header p-1 border-0 bg-transparent">
                        <figure style="background-image:url('{{$comment->user->image}}')" class="img d-inline-block mr-2"></figure>
                        <p class="font-weight-bold d-inline-block user-name">{{ substr($comment->user->fullname,0,30)}} </p>
                        
                        <div class="text-muted float-right  ">
                            {{$comment->created_at->format('j F Y')}}
                            @if(auth()->guard('user')->check() && $comment->user_id === CurrentUser()->id)
                                <div class="dropdown text-muted  m-2">
                                    <button class="btn btn-outline-secondary py-0 px-1" type="button" data-toggle="dropdown">
                                        <i class="fas fa-ellipsis-h"></i>
                                    </button>
                                    <div class="dropdown-menu" >

                                        <a class="dropdown-item edit-comment-button" 
                                            data-href="{{route('user.topic.comment.edit')}}"
                                            data-id="{{ $comment->id }}"
                                            data-comment="{{ $comment->comment }}"
                                            >
                                            <i class="fas fa-edit"></i> Edit
                                        </a>

                                        <a class="dropdown-item delete-comment-button" 
                                            data-href="{{route('user.topic.comment.delete')}}"
                                            
                                            data-id="{{ $comment->id }}" 
                                            >
                                            <i class="fas fa-trash"></i> Delete
                                        </a>
    
                                    </div>  
                                </div>
                            @endif
                        </div>
                       
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

                    <div class="card-header border-0 pl-5 py-3 bg-transparent topic-comment-container-{{$comment->id}}">
                        <div class="card-text" id="topic-comment-body-{{$comment->id}}">
                            {!! $comment->comment !!}
                        </div>
                        @if($comment->getOriginal('image'))
                        <a href="#" data-image="{{$comment->image}}" role="button" class="d-block show-comment-image" data-toggle="modal">
                            <img src="{{$comment->image}}" style="width:auto;height:auto;max-width:70%;max-height:400px" class="mt-3 rounded" alt="" />
                        </a>
                        @endif
                    </div>

                    <div id="comment-replies-{{$comment->id}}">
                        @foreach($comment->replies->chunk(4) as $replyChunkKey => $replyChunk)
                            @foreach($replyChunk as $reply_key => $reply)
                    <div class="card reply my-2 reply-display-{{$topic->id}}-{{$replyChunkKey}}" style="@if($replyChunkKey!=0)display:none;@endif" id="reply-container-{{$reply->id}}">
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
                                        
                                    <div class="text-muted float-right  ">
                                        {{$reply->created_at->format('j F Y')}}  
                                        @if(auth()->guard('user')->check() && $reply->user_id === CurrentUser()->id)
                                        <div class="dropdown text-muted   m-2">
                                            <button class="btn btn-outline-secondary py-0 px-1" type="button" data-toggle="dropdown">
                                                <i class="fas fa-ellipsis-h"></i>
                                            </button>
                                            <div class="dropdown-menu" >
            
                                                <a class="dropdown-item edit-reply-button" 
                                                    data-href="{{route('user.topic.reply.edit')}}"
                                                    data-id="{{ $reply->id }}"
                                                    data-reply="{{ $reply->reply }}" >
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>

                                                <a class="dropdown-item delete-reply-button" 
                                                    data-href="{{route('user.topic.reply.delete')}}" 
                                                    data-id="{{ $reply->id }}" 
                                                    >
                                                    <i class="fas fa-trash"></i> Delete
                                                </a> 
                                            </div>  
                                        </div>
                                        @endif

                                        
                                    </div>
                                    </div>
                                    <div class="card-header border-0 pl-5 py-3">
                                         <div class="card-text" id="topic-reply-body-{{$reply->id}}">{!! $reply->reply !!}</div>
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
                                <aside  style="@if($replyChunkKey!=0) display:none; @endif"
                                        data-show="reply-display-{{$topic->id}}-{{$replyChunkKey+1}}"
                                        key-show="load-more-{{$topic->id}}-{{$replyChunkKey+1}}"
                                        id="load-more-{{$topic->id}}-{{$replyChunkKey}}"
                                    class="pl-5 pb-2 main-link2 more_reply reply-display-{{$replyChunkKey}}">
                                    Load More Replies...
                                </aside>
                            @endif
                        @endforeach
                    </div>
                    @if(auth()->guard('user')->check())
                    <div class="card-footer pl-5 border-0 text-muted p-2">
                        <form class="myreply" action="{{route('user.topic.reply.store',$comment->id)}}" method="POST" id="comment-reply-{{$comment->id}}">
                            <input id="reply-{{$comment->id}}" tabindex="-1" maxlength="180" type="text" class="form-control my-2 topic-comment-reply-input" placeholder="Add Reply ...">
                        </form> 
                            <button class="btn p-1 mr-2 comment-like-button" 
                            style="@if($comment->checkLike()) color: var(--clr1); @else color: #939393; @endif"
                            data-href="{{route('user.topic.comment.like',$comment->id)}}">
                            <i class="fas fa-thumbs-up"></i>
                                @if($comment->checkLike()) Liked @else Like @endif
                            </button>
                            <button class="btn p-1 mr-2 reply-btn" style="color: #939393;">
                                <i class="fas fa-reply"></i>
                                Reply
                            </button>
                            <p class="text-info float-right p-2 comment-replies-likes-{{$comment->id}}">
                                {{$comment->likes->count()}} Likes | {{$comment->replies->count()}} 
                                Replies
                            </p> 
                    </div>
                    @endif
                </div> <!-- end Comment -->
                @endforeach
                    @if($loop->remaining > 0)
                    <aside 
                        style="@if($chunkKey!=0) display:none; @endif"
                        key-show="comment-more-{{$topic->id}}-{{$chunkKey+1}}"
                        id="comment-more-{{$topic->id}}-{{$chunkKey}}"
                        data-show="comment-display-{{$topic->id}}-{{$chunkKey+1}}" class="main-link2 pt-1 more_comment">Load
                        More
                        Comments...
                    </aside>
                    @endif
                @endforeach
            </div>

            {{-- modals  --}}
            {{-- edit Comment--}}
            <div class="modal fade comment-edit-modal" id="comment-edit-modal" tabindex="-1" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">

                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-header">
                            <button type="button" 
                                    class="close" 
                                    data-dismiss="modal"
                                    aria-label="Close">
                                    <span  aria-hidden="true">&times;</span>
                            </button> 
                        </div>

                        <div class="modal-body " id="comment-edit-container">  
                            <form method="POST"   action=" " id="comment-edit-form" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" class="form-control comment-href"                          id="comment-edit-href" > 
                                <input type="hidden" class="form-control comment-id"    name="id"               id="comment-edit-id" > 
                                <input type="text" class="form-control comment-body"    name="comment"          id="comment-edit-body" >
                                <button type="button" class="btn btn-default"   id="comment-edit-close" data-dismiss="modal">Close</button> 
                                <button type="submit"  class="btn btn-danger" id="comment-edit-submit">Edit</button> 
                            </form>  
                        </div>

                    </div>
                </div> 

            </div>    {{-- edit Comment--}}

            {{-- edit Reply--}}
            <div class="modal fade reply-edit-modal" id="reply-edit-modal" tabindex="-1" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">

                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-header">
                            <button type="button" 
                                    class="close" 
                                    data-dismiss="modal"
                                    aria-label="Close">
                                    <span  aria-hidden="true">&times;</span>
                            </button> 
                        </div>

                        <div class="modal-body " id="reply-edit-container">  
                            <form method="POST"   action=" " id="reply-edit-form" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" class="form-control "             id="reply-edit-href" > 
                                <input type="hidden" class="form-control "  name="id"   id="reply-edit-id" > 
                                <input type="text" class="form-control  "    name="reply"      id="reply-edit-body" >
                                <button type="button" class="btn btn-default"   id="reply-edit-close" data-dismiss="modal">Close</button> 
                                <button type="submit"  class="btn btn-danger" id="reply-edit-submit">Edit</button> 
                            </form>  
                        </div>

                    </div>
                </div> 

            </div>    {{-- edit Reply--}}
            

            {{-- edit Modal --}}
            @if(auth()->guard('user')->check())
            <form class="mycomment mt-3" method="POST" action="{{route('user.topic.comment.store',$topic->id)}}" enctype="multipart/form-data" id="comment-topic-{{$topic->id}}">
                
                    <img class="userimage col-md-3" alt="" src="{{auth()->guard('user')->user()->image}}">
                    <input  name="comment" 
                            maxlength="180" 
                            id="comment-{{$topic->id}}" 
                            tabindex="-1"  
                            class="btn-block form-control topic-comment-input col-md-8 ml-10" 
                            type="text" placeholder="Write Comment ...">
 

                <div class="choosefile">
                    <label for="image-{{$topic->id}}"><i class="far fa-images"></i></label>
                    <input class="d-none" type="file" id="image-{{$topic->id}}" onchange="document.getElementById('image-view-{{$topic->id}}').src = window.URL.createObjectURL(this.files[0])">
                </div>
                <div id="imagetoshow-{{$topic->id}}" class="imagetoshow border p-2 mt-1 rounded" style="display:none">
                    <img src="/images/white.png" id="image-view-{{$topic->id}}" alt="">
                    <span class="btn btn-danger">X</span>
                </div>
                <div class="choosefile">
                    <label for="image-{{$topic->id}}"><i class="far fa-images"></i></label>
                    <input class="d-none" type="file" id="image-{{$topic->id}}">
                </div>
            </form>
            <script>
                //=== Upload Comment Image ===
                $('#image-{{$topic->id}}').change(function() {
                    $('#imagetoshow-{{$topic->id}}').fadeIn()
                });

                $('#imagetoshow-{{$topic->id}} span').click(function() {
                    $('#image-{{$topic->id}}').val('')
                    $('#imagetoshow-{{$topic->id}}').fadeOut();
                });
            </script>
            @endif
            <!--End My Comment-->

        </div>
        {{-- End Comments and replay --}}
    </div>
</div>

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