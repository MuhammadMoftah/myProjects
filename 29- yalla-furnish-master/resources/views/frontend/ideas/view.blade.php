@extends('frontend.master')
@section('styles')
<link rel="stylesheet" href="{{asset('assets/site/css/addProduct.css?rand=1234')}}">
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
<link rel="stylesheet" href="{{asset('assets/site/css/SingleIdea.css?rand=1234')}}">
<meta property="og:title" content='{{$idea->name_en}}'>
<meta property="og:image" content="{{$idea->idea_image}}">
<!-- Twitter Cards -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@">
<meta name="twitter:title" content='{{$idea->name_en}}'>
<meta name="twitter:image" content="{{$idea->idea_image}}">
@endsection
@section('search')
@include('frontend.search_layouts.search')
@endsection
@section('body')
<div class="showrooms single-idea-page topics">
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-8 px-0">
                <div class="single-idea bg-white py-2 px-5">
                    <h3 class="py-2 border-bottom" style="text-transform: none;">{!!$idea->name_en!!}</h3>
                    <date class='font-weight-bold' style="font-size:14px">{{$idea->created_at->format('j F Y')}} by
                        <a class="main-link2" href="@if($idea->user_id){{route('user.view.profile',$idea->user->id)}}@else#@endif">{{$idea->user->fullname}}
                        </a>
                    </date>

                    <div class="tags pt-1 pb-3">

                        @foreach( $idea->categories as $category)
                        <a href="{{ route('get_all_ideas',['by_category'=>$category->name_en,'category'=>$category->id]) }}" class="px-2 text-white d-inline-block rounded" style="background-color: lightgray; margin-bottom:5px;font-size: 14px;padding:1px 0">{{$category->name_en}}</a>
                        @endforeach
                    </div>
                    <img src="{{$idea->idea_image}}" alt="{{$idea->name_en}}">

                    <div class="py-3 row">
                        @foreach($idea->activeParagraphs as $paragraph)
                        @if($paragraph->position=="top")
                        <aside class="col-md-12 my-2" style="word-wrap: break-word;">
                            @if($paragraph->getOriginal('image'))
                            <img class="" src="{{$paragraph->image}}" alt="" style="max-width:90%">
                            @endif
                            <p style="word-wrap: break-word;" class="h4"> {!!$paragraph->title_en!!} </p>
                            @if($paragraph->youtube_link)
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="{{$paragraph->youtube_link}}" allowfullscreen></iframe>
                            </div>
                            @endif
                            <p style="word-wrap: break-word;">{!! $paragraph->description_en !!}</p>
                        </aside>
                        @endif

                        @if($paragraph->position=="bottom")
                        <aside class="col-md-12 my-2" style="word-wrap: break-word;">
                            <p class="h4" style="word-wrap: break-word;"> {!!$paragraph->title_en!!} </p>
                            @if($paragraph->youtube_link)
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="{{$paragraph->youtube_link}}" allowfullscreen></iframe>
                            </div>
                            @endif
                            <p style="word-wrap: break-word;">{!! $paragraph->description_en !!}</p>
                            @if($paragraph->getOriginal('image'))
                            <img class="my-3" src="{{$paragraph->image}}" alt="" style="max-width:90%">
                            @endif
                        </aside>
                        @endif

                        @if($paragraph->position=="right")
                        <aside class="col-md-12 my-5 image-in-text" style="word-wrap: break-word;">
                            @if($paragraph->getOriginal('image'))
                            <img class="mr-2 mb-0 mt-1 float-right" src="{{$paragraph->image}}" alt="" style="max-width:300px">
                            @endif
                            <p class="h4 text-capitalize mt-1" style="word-wrap: break-word; "> {!! $paragraph->title_en !!} </p>
                            <p style="word-wrap: break-word;">{!! $paragraph->description_en !!}</p>
                        </aside>
                        <div class="col-md-12 my-3">
                            @if($paragraph->youtube_link)
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="{{$paragraph->youtube_link}}" allowfullscreen></iframe>
                            </div>
                            @endif
                        </div>
                        @endif

                        @if($paragraph->position=="left")
                        <aside class="col-md-12 my-5 image-in-text" style="word-wrap: break-word;">
                            @if($paragraph->getOriginal('image'))
                            <img class="mr-2 mb-0 mt-1 float-left" src="{{$paragraph->image}}" alt="" style="max-width:300px">
                            @endif
                            <p class="h4 text-capitalize mt-1" style="word-wrap: break-word; "> {!! $paragraph->title_en !!} </p>
                            <p style="word-wrap: break-word;">{!! $paragraph->description_en !!}</p>
                        </aside>
                        <div class="col-md-12 my-3">
                            @if($paragraph->youtube_link)
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="{{$paragraph->youtube_link}}" allowfullscreen></iframe>
                            </div>
                            @endif
                        </div>
                        @endif
                        @endforeach
                    </div>

                    @if(auth()->guard('user')->check())
                    <div class="orders text-center p-1 border-top mt-5">
                        <button class="btn btn-outline-info my-1 item-like" data-href="{{route('item.like',['id'=>$idea->id,'type'=>'idea'])}}"><i class="fas fa-thumbs-up"></i>
                            @if($idea->userLike) Liked @else Like @endif
                            | {{$idea->likes->count()}}</button>
                        <button class="btn btn-outline-info my-1 comments_count"><i class="far fa-comment-dots"></i> Comment |
                            {{$idea->comments->count()}}</button>
                        <button class="btn btn-outline-info my-1" data-idea_id="{{ $idea->id }}" data-toggle="modal" data-target="#SaveModal"><i class="fas fa-heart"></i> Save | {{$idea->saves->count()}}</button>
                        <button class="btn btn-outline-info my-1" data-toggle="modal" data-target="#ShareModal"><i class="fas fa-share-square"></i> Share </button>
                        {{-- SavedModel --}}
                        <div class="modal fade savemodal" id="SaveModal">
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
                                                    <div class="img" style="background-image: url({{ $idea->idea_image ? $idea->idea_image: asset('assets/images/animation-bg.jpg') }});">
                                                    </div>
                                                    <div class="card-body  d-flex flex-column justify-content-between">

                                                        <p class="card-text text-info m-0">
                                                            {{ substr($idea->name_en,0,20) }}
                                                        </p>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-7 p-2">
                                                <div class="form-group">
                                                    <h4>Choose board</h4>

                                                    <select name="board_id" id="board_id" data-style="btn-white" class="selectpicker form-control ">
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
                                        </div>
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <input class="btn main-btn save" value="Save">
                                        <button type="button" class="btn main-btn2" data-dismiss="modal">Close</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                        {{-- End SavedModel --}}



                        <!-- The Share Modal -->
                        <div class="modal fade sharemodal" id="ShareModal">
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
                                                <a target="_blank" href="{{ route('user.idea.share',[$idea->id,'facebook']) }}"><i style="background-color:#3b5998;" class="fab fa-facebook-f"></i></a>
                                                <a target="_blank" href="{{ route('user.idea.share',[$idea->id,'twitter']) }}"><i style="background-color:#00acee;" class="fab fa-twitter"></i></a>
                                                <a target="_blank" href="{{ route('user.idea.share',[$idea->id,'linkedin']) }}"><i style="background-color:#0077b5;" class="fab fa-linkedin-in"></i></a>
                                                <a target="_blank" href="{{ route('user.idea.shareViaEmail',[$idea->id]) }}"><i style="background-color:#0077b5;" class="fas fa-envelope"></i></a>
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
                    </div>
                    @endif
                </div>
                <div class="card-footer px-5 mt-5 bg-white lunched-post">
                    @if(auth()->guard('user')->check())
                    <div class="alert alert-success" role="alert">
                    </div>
                    <div class="alert bg-red errors">
                    </div>
                    <form class="mycomment mt-3" method="POST" action="{{route('user.idea.comment.store',$idea->id)}}">

                        <img style="height:50px;" src="{{auth()->guard('user')->user()->image}}" class="userimage" alt="">
                        <input tabindex="-1" id="comment" class="btn-block form-control idea-comment-input" type="text" placeholder="Write Comment ss ...">

                        <div class="choosefile">
                            <label for="uploadimg"><i class="far fa-images"></i></label>
                            <input class="d-none" type="file" id="uploadimg" onchange="document.getElementById('profileImage').src = window.URL.createObjectURL(this.files[0])">
                        </div>

                        <div class="imagetoshow border p-2 mt-1 rounded" id="imagetoshow" style="display:none;">
                            <img src="images/white.png" class="" style="width:100px; height: 100px; border-radius:5%;" id="profileImage" alt="">
                            <span class="btn btn-danger" style="position:absolute; right:10px;">X</span>
                        </div>
                    </form>
                    @else
                    <p style="text-align:center; display:inline-block; width: 100%;">
                        Please <a href="{{route('user.login.get')}}">Login</a> Or <a href="{{route('user.register.get')}}">SignUp</a> to continue
                    </p>
                    @endif
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
                    <!--End My Comment-->
                    <div class="comments">
                        {{-- 4 comments are displayed first --}}
                        @foreach($idea->comments->chunk(10) as $chunkKey => $chunk)
                        @foreach($chunk as $comment_key => $comment)
                        <div class="card comment my-3 comment-display-{{$comment_key}}" id="comment-display-{{$comment->id}}" style="@if($chunkKey!=0)display:none;@endif">
                            <div class="card-header p-1 border-0">
                                <figure style="background-image:url('{{$comment->user->image}}')" class="img d-inline-block mr-2"></figure>
                                <p class="font-weight-bold d-inline-block user-name">{{$comment->user->fullname}} </p>
                                @if (auth()->guard('user')->check())
                                @if (auth()->guard('user')->user()->id != $comment->user->id)
                                @if ($comment->user?$comment->user->check_following($comment->user->id , auth()->guard('user')->user()->id):'')
                                | <a class="" style="color: var(--clr1);">Following</a>
                                @else
                                | <a class="foll" style="color: var(--clr1);" data-count="" data-id="{{ $comment->user->id }}" data-follow="follow">Follow</a>
                                @endif
                                @endif
                                @endif
                                <div class="text-muted float-right m-3">
                                    {{$comment->created_at->format('j F Y')}}

                                    @if(auth()->guard('user')->check() && $comment->user_id === CurrentUser()->id)
                                    <div class="dropdown text-muted   m-2">
                                        <button class="btn btn-outline-secondary py-0 px-1" type="button" data-toggle="dropdown">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </button>
                                        <div class="dropdown-menu">

                                            <a class="dropdown-item  fas fa-edit comment-edit-button" data-type="edit" data-id='{{$comment->id}}' data-key='{{$comment_key}}' data-route="{{route('user.idea.comment.edit', $comment->id)}}"> Edit
                                            </a>

                                            <a class="dropdown-item  trash-link fas fa-trash-alt   comment-delete-action" style="font-size:17px;" title="Delete Comment" data-type="delete" data-comment='{{$comment->id}}' data-key='{{$comment_key}}' data-route="{{route('user.idea.comment.delete', $comment->id)}}"> Delete
                                                {{-- <i class="fas fa-trash"></i> Delete --}}
                                            </a>

                                        </div>
                                    </div>
                                    @endif


                                </div>
                            </div>
                            <div class="card-header border-0 pl-5 py-3 bg-transparent ">
                                <div class="card-text comment-content-{{$comment->id}}">{!!$comment->comment!!}</div>
                                @if($comment->getOriginal('image'))
                                <a href="#" data-image="{{$comment->image}}" role="button" class="d-block show-comment-image" data-toggle="modal">
                                    <img src="{{$comment->image}}" style="width:auto;height:auto;max-width:70%;max-height:400px" class="mt-3 rounded" alt="" />
                                </a>
                                @endif
                            </div>

                            <div class="card reply my-2 mx-1" style="@if($comment->replies->count()==0) border:none; @endif" id="comment-replies-{{$comment->id}}">
                                @foreach($comment->replies->chunk(10) as $replyChunkKey => $replyChuck)
                                @foreach($replyChuck as $replyKey => $reply)
                                <div class="my-2 reply-display-{{$replyKey}}" id="reply-display-{{$reply->id}}" style="@if($replyChunkKey!=0)display:none;@endif">

                                    <div class="card-header p-1 border-0">
                                        <img src="{{$reply->user->image}}" alt="" class="d-inline-block mr-2">
                                        <p class="font-weight-bold d-inline-block user-name">{{$reply->user->fullname}}
                                        </p>
                                        @if (auth()->guard('user')->check())
                                        @if (auth()->guard('user')->user()->id != $reply->user->id)
                                        @if ($reply->user?$reply->user->check_following($reply->user->id , auth()->guard('user')->user()->id):'')
                                        | <a class="" style="color: var(--clr1);">Following</a>
                                        @else
                                        |
                                        <a class="foll" style="color: var(--clr1);" data-count="" data-id="{{ $reply->user->id }}" data-follow="follow">
                                            Follow
                                        </a>
                                        @endif
                                        @endif
                                        @endif
                                        <div class="text-muted float-right m-3">
                                            {{$reply->created_at->format('j F Y')}}


                                            @if(auth()->guard('user')->check() && $reply->user_id === CurrentUser()->id)
                                            <div class="dropdown text-muted   m-2">
                                                <button class="btn btn-outline-secondary py-0 px-1" type="button" data-toggle="dropdown">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </button>
                                                <div class="dropdown-menu">

                                                    <a class="dropdown-item fas fa-edit reply-edit-action main-link" data-route="{{route('user.idea.reply.edit', $reply->id)}}" data-type="edit" data-reply='{{$reply->reply}}' data-id='{{$reply->id}}' data-key='{{$replyKey}}'>
                                                        Edit
                                                    </a>

                                                    <a class="dropdown-item fas fa-trash-alt reply-delete-action" style="font-size:17px;" data-route="{{route('user.idea.reply.delete', $reply->id)}}" title="Delete reply" data-type="delete" data-reply='{{$reply->id}}' data-key='{{$replyKey}}'>
                                                        Delete
                                                    </a>



                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="card-body border-0 pl-5 py-3">
                                        <div class="card-text reply-content-{{$reply->id}}">{!! $reply->reply!!}</div>
                                    </div>
                                    @if(auth()->guard('user')->check())
                                    <div class="card-footer pl-5 border-0 text-muted p-2">
                                        <button class="btn p-1 mr-2 reply-like-button" data-href="{{route('user.idea.reply.like',$reply->id)}}" style="color: #939393;"><i class="fas fa-thumbs-up"></i> Like</button>
                                    </div>
                                    @endif
                                    <p class="text-info float-right p-2" id="reply-likes-count-{{$reply->id}}">
                                        {{$reply->likes->count()}} Likes</p>
                                </div>
                                @endforeach
                                @if($loop->remaining > 0)
                                <aside style="@if($replyChunkKey!=0) display:none; @endif" data-show="reply-display-{{$replyChunkKey+1}}" key-show="load-more-{{$replyChunkKey+1}}" id="load-more-{{$replyChunkKey}}" class="pl-5 pb-2 main-link2 more_reply reply-display-{{$replyChunkKey}}">Load More Replies...</aside>
                                @endif
                                @endforeach
                            </div> <!-- end Reply -->

                            <div class="card-footer pl-5 border-0 text-muted p-2">
                                @if(auth()->guard('user')->check())
                                <form class="myreply" action="{{route('user.idea.reply.store',$comment->id)}}" method="POST" id="comment-reply-{{$comment->id}}">
                                    <input id="reply-{{$comment->id}}" tabindex="-1" maxlength="180" type="text" class="form-control my-2 idea-comment-reply-input" placeholder="Add Reply ...">
                                </form>
                                <button class="btn p-1 mr-2 comment-like-button" style="color: #939393;" data-href="{{route('user.idea.comment.like',$comment->id)}}"><i class="fas fa-thumbs-up"></i>
                                    @if($comment->checkLike()) Liked @else Like @endif</button>
                                <button class="btn p-1 mr-2 reply-btn" style="color: #939393;"><i class="fas fas fa-reply"></i>
                                    Reply</button>
                                @endif
                                <p class="text-info float-right p-2 comment-replies-likes-{{$comment->id}}">
                                    {{$comment->likes->count()}} Likes | {{$comment->replies->count()}} Replies</p>
                            </div>
                        </div> <!-- end Comment -->
                        @endforeach
                        @if($loop->remaining > 0)
                        <aside style="@if($chunkKey!=0) display:none; @endif" key-show="comment-more-{{$chunkKey+1}}" id="comment-more-{{$chunkKey}}" data-show="comment-display-{{$chunkKey+1}}" class="main-link2 pt-1 more_comment">Load
                            More
                            Comments...</aside>
                        @endif
                        @endforeach
                        {{-- edit Comment--}}
                        <div class="modal fade comment-edit-modal" id="comment-edit-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body " id="comment-edit-container">
                                        <form method="POST" action=" " id="comment-edit-form" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" class="form-control comment-href" id="comment-edit-href">
                                            <input type="hidden" class="form-control comment-id" name="id" id="comment-edit-id">
                                            <input type="text" class="form-control comment-body" name="comment" id="comment-edit-body">
                                            <button type="button" class="btn btn-default" id="comment-edit-close" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger" id="comment-edit-submit">Edit</button>
                                        </form>
                                    </div>

                                </div>
                            </div>

                        </div> {{-- edit Comment--}}

                        {{-- edit Reply--}}
                        <div class="modal fade reply-edit-modal" id="reply-edit-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body " id="reply-edit-container">
                                        <form method="POST" action=" " id="reply-edit-form" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" class="form-control " id="reply-edit-href">
                                            <input type="hidden" class="form-control " name="id" id="reply-edit-id">
                                            <input type="text" class="form-control  " name="reply" id="reply-edit-body">
                                            <button type="button" class="btn btn-default" id="reply-edit-close" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger" id="reply-edit-submit">Edit</button>
                                        </form>
                                    </div>

                                </div>
                            </div>

                        </div> {{-- edit Reply--}}

                    </div>
                </div>
                <!--end-comments-->
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{asset('assets/site/js/ideaComment.js')}}"></script>
<script src="{{asset('assets/site/js/likeItem.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        var board_id = $('#board_id :selected').val();
        $("#board_id").on('change', function() {
            board_id = $('#board_id :selected').val();
            if (board_id === "create") {
                $("#append").html('<h1>or create new board</h1><form action="" id="create_save">' +
                    'Board Name <br> <input name="name" id="name" class="form-control " type="text"><br>' +
                    'Board type <br><select name="board_type" id="board_type"' +
                    'data-style="btn-white" class="form-control ">' +
                    '<option value="1">private</option>' +
                    '<option value="0">public</option>' +
                    '</select><br>' +
                    '<input type="submit" value="create and save"' +
                    'class="btn btn-lg btn-success" style="background-color:#3ab1b7;border: thick;margin-left:0px">' + '</form>');
            }
            $("#create_save").submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'GET', //THIS NEEDS TO BE GET
                    url: "{{ route('create.save.board') }}",
                    data: {
                        board_type: $('#board_type :selected').val(),
                        board_name: $('#name').val(),
                        type: 'idea',
                        idea_id: parseInt({
                            {
                                $idea - > id
                            }
                        }),
                    },
                    success: function(data) {
                        $('#SaveModal').modal('toggle');

                        // console.log(data);
                        if (data == "ok") {
                            Swal.fire({
                                position: 'center',
                                type: 'success',
                                title: 'Your idea saved ',
                                timer: 1500,
                                confirmButtonText: 'done',
                                showLoaderOnConfirm: true,
                                confirmButtonColor: '#21d5de'
                            });
                            setTimeout(location.reload.bind(location), 2000)
                        } else {
                            Swal.fire({
                                position: 'center',
                                type: 'error',
                                title: 'The idea already exist ',
                                timer: 1500,
                                confirmButtonText: 'done',
                                showLoaderOnConfirm: true,
                                confirmButtonColor: '#21d5de'
                            });
                            setTimeout(location.reload.bind(location), 2000)
                        }

                    }
                });
            });
        });

        $(".save").on('click', function() {

            $.ajax({
                type: 'GET', //THIS NEEDS TO BE GET
                url: "{{ route('save.product') }}",
                data: {
                    board_id: parseInt(board_id),
                    idea_id: parseInt({
                        {
                            $idea - > id
                        }
                    }),
                    type: 'idea'
                },
                success: function(data) {
                    if (data == "ok") {
                        Swal.fire({
                            position: 'center',
                            type: 'success',
                            title: 'Your idea saved ',
                            timer: 1500,
                            confirmButtonText: 'done',
                            showLoaderOnConfirm: true,
                            confirmButtonColor: '#21d5de'
                        });
                        setTimeout(location.reload.bind(location), 2000)
                    } else {
                        Swal.fire({
                            position: 'center',
                            type: 'error',
                            title: 'The idea already exist ',
                            timer: 1500,
                            confirmButtonText: 'done',
                            showLoaderOnConfirm: true,
                            confirmButtonColor: '#21d5de'
                        });
                        setTimeout(location.reload.bind(location), 2000)
                    }
                }
            });

        });
    });
</script>
<script>
    $(document).ready(function() {

        $(".follow").on('click', function() {
            $('.loader').show();
            var count = $(this).attr('data-count');
            var new_count;

            var user_id = $(this).attr('data-id');
            if ($(this).html() == 'Follow') {
                $(this).html("Following");
            } else if ($(this).html() == 'Following') {
                $(this).html("Follow");
            }
            $.ajax({
                type: 'GET', //THIS NEEDS TO BE GET
                url: "{{ route('user.follow.user') }}",
                datatype: 'html',
                data: {
                    user_id: user_id
                }
            });
            $('.loader').hide();
        });
    });
</script>
<script>
    $(document).ready(function() {

        $(".foll").on('click', function(e) {
            var count = $(this).attr('data-count');
            var new_count;

            var user_id = $(this).attr('data-id');
            if ($(this).html() == 'Follow') {
                $(this).html("Following");
            }
            $('.loader').show();
            $.ajax({
                type: 'GET', //THIS NEEDS TO BE GET
                url: "{{ route('user.follow.user') }}",
                datatype: 'html',
                data: {
                    user_id: user_id
                }
            });
            $('.loader').hide();
        });
    });
</script>
@endsection