<div  class="card reply my-2 "   id="reply-container-{{$reply->id}}"> 
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