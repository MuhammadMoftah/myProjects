@extends('master')



@section('styles')
<style>
    body {
        background-color: white
    }   

</style>
@endsection

@section('meta-data')
<meta property="og:url" content="{{ route("web.blog.user.details", $blog->slug )}}/" />
<meta property="og:type" content="website" />
<meta property="og:title" content="{{ str_limit($blog->title, 100, '..')}}" />
<meta property="og:description" content="{{str_limit( strip_tags($blog->body) , 150, '...')}}" />
<meta property="og:image" content="{{$blog->image}}" />
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $blog->title}}">
<meta name="twitter:description" content="{{str_limit( strip_tags($blog->body) , 150, '...')}}">
<meta name="twitter:image" content="{{$blog->image}}" />
@endsection

@section('customeHeader')
<section class="blog-header2">
    <div class="container">
        <a href="{{route('web.blog.user.home')}}"> <img src="{{asset('site/images/logo/blog-logo1.png')}}" alt=""> </a>
    </div>
</section>
@endsection


@section('body')

<section class="main-blogs">
    <div class="container">
        <div class="mt-2">
            @include('layouts.message')
            @include('layouts.errors')
        </div>
        <div class="article-details part my-2 m-1 py-5">
            <p class="h4 mt-2 blog-title"> {{ $blog->title}} </p>
            <div class="mt-1 pb-3">
                {{-- <p class="font-weight-bold m-0 d-inline-block pr-3">Muhammad Moftah</p> --}}
               <span class='text-muted d-inline-block"'>{{$blog->created_at->diffForhumans()}}</span>

                <ul class="social-results float-right mb-2 px-0">
                    <li><span>{{$blog->shares}}</span> Shares</li>
                   <li><span>{{$blog->comments_count}}</span> Comments</li>
                   <li><span>{{$blog->views}}</span> Views</li>
                   <li><span>{{$blog->likes_count}}</span> likes</li>
                </ul>
            </div>
            <img src="{{$blog->image}}" alt="">
            <p class="my-1" style="font-size:14px !important; font-style:italic">
            </p>

            <div class="article-content row mt-4">
                <div class="col-2 col-lg-1 share-article">
                    <span class="text-center mb-3 font-weight-bold">Share</span>
                    <span class="text-center"><a href="{{route('web.blog.user.share',['provider'=>'facebook', 'blog'=>$blog->id])}}"  target="_blank" class="fab fa-facebook-f"></a></span>
                    <span class="text-center"><a href="{{route('web.blog.user.share',['provider'=>'linkedin', 'blog'=>$blog->id])}}"  target="_blank" class="fab fa-linkedin-in"></a></span>
                    <span class="text-center"><a href="{{route('web.blog.user.share',['provider'=>'twitter', 'blog'=>$blog->id])}}"  target="_blank"  class="fab fa-twitter-square"></a></span>
                </div>
                <div class="col-10 col-lg-9">
                    <div>
                        {!! $blog->body !!}
                    </div>
                    <div class="tags">
                        @foreach ($blog->tags as $tag)
                            <a class="main-link2 d-inline-block mr-3" href="">#{{$tag->name}}</a>
                        @endforeach
                        
                        
                    </div>

                    <div class="feedback my-4 ">
                        <div class="row bg-grey">
                            <div class="col-md-6 border">
                                <!-- <button class="like-article btn w-100">
                                    <i class="fas fa-heart d-inline-block mr-2"></i>
                                    <p class="d-inline-block"">Like</p>
                                </button> -->
                                <!-- if like pressed -->
                                 <form action="{{route('web.blog.user.like.post')}}" method="POST">
                                    @csrf
                                    @if(auth("user")->check())
                                        <input type="hidden" name="user_type" value="user">
                                         <input type="hidden" name="user_id" value="{{auth("user")->id()}}">
                                    @endif
                                    @if(auth("company")->check())
                                        <input type="hidden" name="user_type" value="company">
                                        <input type="hidden" name="user_id" value="{{auth("company")->id()}}">
                                    @endif
                                    <input type="hidden" name="blog_id" value="{{$blog->id}}" />
                                   
                                            @if(auth("company")->check() )
                                                @if(auth("company")->user()->isLike($blog->id))
                                                <button class="like-article btn w-100" style="color:var(--clr2)">
                                                    <i class="fas fa-heart d-inline-block mr-2"></i>
                                                    <p class="d-inline-block">Unliked</p>
                                                </button>
                                                 @else
                                                 <button class="like-article btn w-100" style="">
                                                    <i class="fas fa-heart d-inline-block mr-2"></i>
                                                    <p class="d-inline-block">Like</p>
                                                </button>
                                                 @endif   
                                            @elseif(auth("user")->check() )
                                                @if(auth("user")->user()->isLike($blog->id))
                                                <button class="like-article btn w-100" style="color:var(--clr2)">
                                                    <i class="fas fa-heart d-inline-block mr-2"></i>
                                                    <p class="d-inline-block">Unliked</p>
                                                </button>
                                                @else
                                                <button class="like-article btn w-100" style="">
                                                    <i class="fas fa-heart d-inline-block mr-2"></i>
                                                    <p class="d-inline-block">Like</p>
                                                </button> 
                                                @endif
                                            @else
                                                <button class="like-article btn w-100" style="">
                                                    <i class="fas fa-heart d-inline-block mr-2"></i>
                                                    <p class="d-inline-block">Like</p>
                                                </button>
                                            @endif
                                    
                               </form> 
                            </div>
                            <div class="col-md-6 border">
                                <button class="add-comment  btn w-100" for="#adcomment">
                                    <i class="far fa-comment-alt d-inline-block  mr-2"></i>
                                    <p class="d-inline-block">Add Comment</p>
                                </button>
                            </div>
                        </div>

                        <div class="row bg-grey pb-3">
                            <div class="col-md-12">
                                <form method="POST"  action="{{route('web.blog.user.comment.post')}}">
                                    @csrf
                                    @if(auth("user")->check())
                                        <input type="hidden" name="user_type" value="user">
                                         <input type="hidden" name="user_id" value="{{auth("user")->id()}}">
                                    @endif
                                    @if(auth("company")->check())
                                        <input type="hidden" name="user_type" value="company">
                                        <input type="hidden" name="user_id" value="{{auth("company")->id()}}">
                                    @endif
                                    <input type="hidden" name="blog_id" value="{{$blog->id}}" />
                                    <div class=" mt-2">
                                        <input type="text"  name="body"  class="form-control {{ $errors->has('body') && !old('modal')  ? 'is-invalid' : ''}} " id="addcomment" placeholder="Type your comment ...">
                                        @if(!old('modal')) {!! $errors->first('body', '<div class="invalid-feedback">:message</div>') !!} @endif
                                    </div>
                                    <div class=" mt-2">
                                        <input class="btn btn-main3 px-5" type="submit" value="Post">
                                    </div>
                              </form>
                            </div>
                        </div>

                        <div class="row ">
                            @forelse ($blog->comments as $comment)
                                <div class="single-comment bg-grey mt-3 p-3 position-relative col-12 rounded" >
                                     <p class="font-weight-bold mb-1"> {{ $comment->comment->getNameForBlog() }}</p>
                                     <p class="text-muted pr-4" style="min-width: 400px">
                                         {{ $comment->body}}
                                     </p>
                                     
                                    @if(
                                        ( ( auth("company")->guest() && !auth("user")->check() ) || ( auth("user")->guest() && !auth("company")->check() )  ) ||
                                        ( auth("company")->check() && $comment->comment_type =="App\Company" && auth("company")->id() != $comment->comment_id ) || 
                                        ( auth("user")->check() && $comment->comment_type =="App\User" && auth("user")->id() != $comment->comment_id )   
                                    )
                                    <a href="javascript:void(0)" class="report report-model" name="Report" data-comment_id="{{$comment->id}}" > <i class="fas fa-exclamation-triangle"></i> </a>
                                    @else
                                   
                                    <a href="{{route('web.blog.user.comment.delete', $comment->id)}}" data-message="are you sure ?" data-form="#delte-comment-form" data-href="{{route('web.blog.user.comment.delete', $comment->id)}} " class="report delete-comment" name="Report" data-comment_id="{{$comment->id}}" ><i class="fas fa-trash-alt"></i></a>
                                    @endif
                                
                                </div>
                            @empty
                                
                            @endforelse
                            
                           

                            {{-- <div class="w-100 text-center mt-3">
                                <button class="px-4 btn btn-main2">View all comments</button>
                            </div> --}}
                        </div>
                    </div>
                </div>
                
            </div>
            
        </div>
    </div>
    @if($relateds->count() > 0)
    <div class="related-articles py-4" style="background-color:#F3F3F3">
        <div class="container">
            <div class="py-3">
                <p class="h4 text-muted text-capitalize">Related articles</p>
            </div>

            <div class="d-flex justify-content-between flex-column flex-lg-row">
                @foreach ($relateds as $item)
                    
               
                    <div class="part my-1 mr-4" style="flex:1">
                        <a href="{{route("web.blog.user.details",$item->slug)}}">
                        <img src="{{$item->image}}" alt="" style="height: 200px;">
                            <p class="h6 mt-2 blog-title">{{  str_limit($item->title, 100, "...") }}</p>
                            <!-- <div class="mt-1 pb-3">
                                <p class="font-weight-bold m-0 d-inline-block pr-3">Muhammad Moftah</p>
                                <span class='text-muted d-inline-block"'>3 hours ago</span>
                            </div> -->
                        </a>
                    </div>
               
                @endforeach


            </div>
        </div>
    </div>
    @endif

    {{-- model  --}}
    <div class="modal fade" tabindex="-1" role="dialog" id="reportModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Report this comment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST"  action="{{route('web.blog.user.report.post')}}">
                <input type="hidden" value="report" name="modal">
                @csrf
                @if(auth("user")->check())
                    <input type="hidden" name="user_type" value="user">
                     <input type="hidden" name="user_id" value="{{auth("user")->id()}}">
                @endif
                @if(auth("company")->check())
                    <input type="hidden" name="user_type" value="company">
                    <input type="hidden" name="user_id" value="{{auth("company")->id()}}">
                @endif
                <input type="hidden" id="comment_id" name="comment_id" value="" />
                <div class="modal-body">
                    <textarea class="form-control {{ $errors->has('body') && old('modal') == 'report' ? 'is-invalid' : ''}}" name="body" id="" cols="30" rows="3"></textarea>

                   @if(old('modal') == "report") {!! $errors->first('body', '<div class="invalid-feedback">:message</div>') !!} @endif
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-danger px-5" value="Report" />
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
            </div>
        </div>
    </div>

</section>

<div style="display: none">
<form id="delte-comment-form" action=""  method="POST">
    @csrf
</form>
</div>
@endsection


@section('scripts')
    <script>
        $(function(){
            var report   = $("#reportModal");
            var comment  = $("#comment_id");
            var commentForm = $("#delte-comment-form")

            $("body").on("click", ".report-model", function(){
                comment.val($(this).data("comment_id"))
                report.modal("show")
            })
            var dialog_type = "{{old('modal')?old('modal'):''}}";
            if(dialog_type == "report")
                report.modal("show")
                
        })

        $(".delete-comment").click(function(e){
                e.preventDefault();
                var _elm = $(this);
                $msg  = _elm.data("message")
                let x = confirm($msg)
                if(x){
                    var _form = $(_elm.data("form") );
                    _form.prop('action', _elm.attr("href"))
                    _form.submit();
                }


            })
    </script>
@endsection