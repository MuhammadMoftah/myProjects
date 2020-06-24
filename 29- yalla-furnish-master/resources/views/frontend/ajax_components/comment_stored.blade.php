<div class="card comment my-3  "  id="comment-container-{{$comment->id}}" >
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
                    @if(CurrentUser()->can('delete', $reply) )
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
                <button class="btn p-1 mr-2 reply-like-button" style="@if($reply->checkLike()) color: var(--clr1); @else color: #939393; @endif" data-href="{{route('user.topic.reply.like',$reply->id)}}"><i class="fas fa-thumbs-up"></i>
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

        <button class="btn p-1 mr-2 comment-like-button" style="@if($comment->checkLike()) color: var(--clr1); @else color: #939393; @endif" data-href="{{route('user.topic.comment.like',$comment->id)}}"><i class="fas fa-thumbs-up"></i>
            @if($comment->checkLike()) Liked @else Like @endif</button>
        <button class="btn p-1 mr-2 reply-btn" style="color: #939393;"><i class="fas fa-reply"></i>
            Reply</button>
        <p class="text-info float-right p-2 comment-replies-likes-{{$comment->id}}">
            {{$comment->likes->count()}} Likes | 
            {{-- {{$comment->replies->count()}} Replies --}}
        </p>
    </div>
    @endif
    
</div> <!-- end Comment -->