<div class="card-footer p-0 bg-white">
    <div id="comments-container-{{$showroom_review->id}}" style="padding-bottom:15px;" >
        @foreach($showroom_review->comments as $comment_key => $comment)
        <div class="card comment my-3 comment-display-{{$comment_key}}"  id="comment-container-{{$comment->id}}"
                style="@if($comment_key!=0)display:none;@endif">
                <div class="card-header p-1 border-0 bg-transparent">
                    <figure style="background-image:url('{{$comment->user->image}}')" class="img d-inline-block mr-2"></figure>
                    <p class="font-weight-bold d-inline-block user-name">{{ substr($comment->user->fullname,0,30)}} </p>
                    <a href="" style="color: var(--clr1);">
                        @if (auth()->guard('user')->check())
                        @if (auth()->guard('user')->user()->id != $comment->user->id)
                        @if ($comment->user?$comment->user->check_following($comment->user->id , auth()->guard('user')->user()->id):'')
                        | <a class="" style="color: var(--clr1);" >Following</a>
                        @else
                        | <a class="foll" style="color: var(--clr1);" data-count="" data-id="{{ $comment->user->id }}" data-follow="follow">Follow</a>
                        @endif
                        @endif
                        @endif
                    </a>
                    <p class="text-muted float-right m-3">
                        {{$comment->created_at->format('j F Y')}}    
                        @if(CurrentUser()->can('delete', $comment) )
                        <i class="trash-link fas fa-trash-alt mx-2 comment-delete-action" 
                            style="font-size:17px;" title="Delete Comment"  
                            data-type="delete" 
                            data-comment='{{$comment->id}}' 
                            data-route= "{{route('user.comment.delete')}}">
                        </i> 
                        @endif
                        @if(CurrentUser()->can('update', $comment) )
                        <i  class="main-link fas fa-edit comment-edit-action"
                            data-type="edit" 
                            data-comment='{{$comment->id}}' 
                            data-route= "{{route('user.comment.update')}}">
                        </i> 
                        @endif
                    </p> 
                </div>
                <div class="card-header border-0 pl-5 py-3 bg-transparent">
                    <p class="card-text" id="comment-content-{{$comment->id}}"> 
                        {{$comment->body}}
                        @if($comment->getOriginal('image'))
                            <img style="border-radius: 5px; display: -webkit-box;" src="{{$comment->image}}" height="100px" width="100px"/>
                        @endif
                    </p>
                </div>  
                <div id="comment-replies-{{$comment->id}}">
                    @foreach($comment->replies as $reply_key => $reply)
                    <div    class="card reply my-2 reply-display-{{$reply_key}}" 
                            style="@if($reply_key!=0)display:none;@endif" 
                            id="reply-container-{{$reply->id}}"> 
                        <div class="card-header p-1 border-0">
                            <figure style="background-image:url('{{$reply->user->image}}')" class="img d-inline-block mr-2"></figure>
                            <p class="font-weight-bold d-inline-block user-name">{{ substr($reply->user->fullname,0,30)}} </p>
                            <a href="" style="color: var(--clr1);">
                                @if (auth()->guard('user')->check())
                                @if (auth()->guard('user')->user()->id != $reply->user->id)
                                @if ($reply->user?$reply->user->check_following($reply->user->id , auth()->guard('user')->user()->id):'')
                                | <a class="" style="color: var(--clr1);" >Following</a>
                                @else
                                | <a class="foll" style="color: var(--clr1);" data-count="" data-id="{{ $reply->user->id }}" data-follow="follow">Follow</a>
                                @endif
                                @endif
                                @endif
                            </a> 
                            <p class="text-muted float-right m-3">
                                {{$reply->created_at->format('j F Y')}} 
                                <a class="fas fa-flag text-secondary" data-toggle="modal" data-target="#reportModal"> </a>
                                @if(CurrentUser()->can('delete', $reply))
                                <i class="trash-link fas fa-trash-alt mx-2 reply-delete-action" 
                                style="font-size:17px;" title="Delete Reply"  
                                data-type="delete" 
                                data-reply='{{$reply->id}}' 
                                data-route= "{{route('user.reply.delete')}}">
                                </i> 
                                @endif
                                @if(CurrentUser()->can('update', $reply) )
                                <i  class="main-link fas fa-edit reply-edit-action"  title="update Reply"
                                    data-type="edit" 
                                    data-reply='{{$reply->id}}' 
                                    data-route= "{{route('user.reply.update')}}">
                                </i>
                                @endif
                            </p>
                        </div>
                        <div class="card-header border-0 pl-5 py-3">
                        <p class="card-text" id="reply-content-{{$reply->id}}">{{$reply->body}}</p>
                        </div>
                        
                        <div class="card-footer pl-5 border-0 text-muted p-2">
                            @if(auth()->guard('user')->check())
                            <button class="btn p-1 mr-2 item-like" 
                                    style="@if($reply->checkLike()) color: var(--clr1); @else color: #939393; @endif" 
                                    data-href="{{route('item.like',['id'=> $reply->id,'type'=>'reply'])}}"><i class="fas fa-thumbs-up"></i>
                                @if($reply->checkLike()) Liked @else Like
                                @endif</button>
                            @endif
                            <p class="text-muted float-right p-2" id="reply-likes-count-{{$reply->id}}">
                                {{$reply->likes->count()}} Likes</p>
                        </div>
                    </div> <!-- end Reply -->
                    @if(!$loop->last)
                    <a data-show="reply-display-{{$reply_key+1}}" class="pl-5 py-2 main-link2 more_reply main-color reply-display-{{$reply_key}}" style="@if($reply_key!=0)display:none;@endif">Load More Replies...</a>
                    @endif
                    @endforeach
                </div>
                @if(auth()->guard('user')->check())
                <div class="card-footer pl-5 border-0 text-muted p-2"> 
                    <form class="myreply submit-reply" action="{{route('user.reply.store')}}" 
                          method="POST" id="comment-reply-{{$comment->id}}" 
                          data-targetId="{{$comment->id}}">
                        @csrf
                        <input type="hidden" value="comment" name="type" id="reply-type-{{$comment->id}}">
                        <input type="hidden" value="id" name="id" id="reply-id-{{$comment->id}}">
                        <input id="reply-{{$comment->id}}" tabindex="-1"  
                               maxlength="180" type="text" class="form-control my-2" 
                               placeholder="Add Reply ..." name="body" >
                     </form>
                    <button class="btn p-1 mr-2 item-like"
                            style="@if($comment->checkLike()) color: var(--clr1); @else color: #939393; @endif" 
                            data-href="{{route('item.like',['id'=> $comment->id,'type'=>'comment'])}}">
                        <i class="fas fa-thumbs-up"></i>
                        @if($comment->checkLike()) Liked @else Like @endif
                    </button>
                    <button class="btn p-1 mr-2 reply-btn" style="color: #939393;"><i class="fas fa-reply"></i>
                        Reply</button>
                    <p class="text-info float-right p-2 comment-replies-likes-{{$comment->id}}">
                        {{$comment->likes->count()}} Likes | 
                        {{-- {{$comment->replies->count()}} Replies --}}
                    </p>
                </div>
                @endif
                @if(!$loop->last)
                <a data-show="comment-display-{{$comment_key+1}}" class="main-link2 p-3 more_comment main-color">Load More Comments...</a>
                @endif
        </div> <!-- end Comment -->
        @endforeach
    </div>

    @if(auth()->guard('user')->check())
    <form class="mycomment mt-3" method="POST" 
         action="{{route('user.comment.store')}}"
        enctype="multipart/form-data" id="comment-showroom_review-{{$showroom_review->id}}" data-targetId="{{$showroom_review->id}}">
        @csrf
        <input type="hidden" name="type" id="comment-type-{{$showroom_review->id}}" value="showroom_review">
        <input type="hidden" name="id" id="comment-id-{{$showroom_review->id}}" value="{{$showroom_review->id}}">
        <img class="userimage" style="top: 1px;" alt="" src="{{auth()->guard('user')->user()->image}}">
        <input name="body" maxlength="180" id="comment-{{$showroom_review->id}}" tabindex="-1" class="btn-block form-control" type="text" placeholder="Write Comment ...">

        <div class="choosefile">
            <label for="upload-comment-image-{{$showroom_review->id}}"><i class="far fa-images"></i></label>
            <input class="d-none upload-comment-image" type="file" id="upload-comment-image-{{$showroom_review->id}}" data-targetId="{{$showroom_review->id}}"  >
        </div>

        <div class="imagetoshow border p-2 mt-1 rounded" style="display:none;"  id='comment-upload-image-display-container-{{$showroom_review->id}}'>
            <img src="images/white.png" class="" style="width:100px; height: 100px; border-radius:5%;" id="comment-upload-image-display-{{$showroom_review->id}}" alt="">
            <span class="btn btn-danger" style="position:absolute; right:10px;">X</span>
        </div>

    </form>
    <br>
    <span style="display:none; " class="alert alert-danger errors-{{$showroom_review->id}}  "></span>
    <br>
    @endif
    <!--End My Comment--> 
</div>
@push('scripts_stack')
<script src="{{asset('assets/site/js/Comments.js')}}"></script>
</script> 
<script src="{{asset('assets/site/js/Replies.js')}}"></script>
</script> 
@endpush
