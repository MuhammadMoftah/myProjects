<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\storeReplyRequest;
use App\Http\Requests\GetReplyRequest; 
use App\Services\site\IdeaCommentLikeService;
use App\Services\site\IdeaCommentReplyService;
use App\Http\Requests\EditReplyRequest; 
use Illuminate\Support\Facades\DB;

class IdeaCommentReplyController extends Controller
{
    protected $idea_comment_reply_service;
    protected $idea_comment_like_service;

    public function __construct(IdeaCommentReplyService $idea_comment_reply_service, IdeaCommentLikeService $idea_comment_like_service)
    {
        $this->idea_comment_like_service = $idea_comment_like_service;
        $this->idea_comment_reply_service = $idea_comment_reply_service;
    }

    public function storeReply($comment_id, storeReplyRequest $request)
    {
        $this->checkReplyBody();
        try {
            DB::beginTransaction();

            $reply = $this->idea_comment_reply_service->storeReply($comment_id);

            $reply['user_image'] = $reply->user->image;
            $reply['user_name'] = $reply->user->fullname;
            $reply['date'] = $reply->created_at->format('j F Y');
            $reply['url'] = route('user.idea.reply.like', $reply->id);

            $comment_likes = $this->idea_comment_like_service->getCommentLikes($comment_id);

            $replies_count = $this->idea_comment_reply_service->getCommentReplies($comment_id);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }

        return response()->json(['reply' => $reply, 'replies_count' => $replies_count, 'likes_count' => $comment_likes, 'code' => 200]);
    }
    
    public function deleteReply($replyId){
        $reply = $this->idea_comment_reply_service->deleteReply($replyId); 
        return $reply;
    }
    public function editReply($replyId, EditReplyRequest $request){
        $this->checkReplyBody();
        return  $this->idea_comment_reply_service->editReply($replyId);
          
    }  

    public function checkReplyBody() {  
        $this->stripeReplyBody();
        if(  trim(str_replace( "&nbsp;" , "",  strip_tags(request()->reply) ))  === '' ) {return response()->json(['errMessage' => "Empty Reply" ]);}
    }

    public function stripeReplyBody() {  
        request()->merge( ['reply' =>   strip_tags( request()->reply , '<br><p>') ] );  
    }
}
