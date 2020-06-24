<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\storeReplyRequest;
use App\Http\Requests\EditTopicReplyRequest;
use App\Http\Requests\DeleteTopicReplyRequest;
use App\Services\site\TopicCommentLikeService;
use App\Services\site\TopicCommentReplyService;
use Illuminate\Support\Facades\DB;

class TopicCommentReplyController extends Controller
{
    protected $topic_comment_reply_service;
    protected $topic_comment_like_service;

    public function __construct(TopicCommentReplyService $topic_comment_reply_service, TopicCommentLikeService $topic_comment_like_service)
    {
        $this->topic_comment_like_service = $topic_comment_like_service; 
        $this->topic_comment_reply_service = $topic_comment_reply_service;
    }

    public function storeReply($comment_id, storeReplyRequest $request)
    {  
        $this->checkReplyBody();
        try {
            DB::beginTransaction(); 
            $reply = $this->topic_comment_reply_service->storeReply($comment_id); 
            $reply['user_image'] = $reply->user->image;
            $reply['user_name'] = $reply->user->fullname;
            $reply['date'] = $reply->created_at->format('j F Y');
            $reply['url'] = route('user.topic.reply.like', $reply->id); 
            $comment_likes = $this->topic_comment_like_service->getCommentLikes($comment_id); 
            $replies_count = $this->topic_comment_reply_service->getCommentReplies($comment_id); 
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        } 
        return response()->json(['reply' => $reply, 'replies_count' => $replies_count, 'likes_count' => $comment_likes, 'code' => 200]);
    }

    public function editReply(EditTopicReplyRequest $request ) { 
        $this->checkReplyBody();  
        return  $this->topic_comment_reply_service->editReply( request()->id ); 
    }

    public function deleteReply(DeleteTopicReplyRequest $request ) {  
        return  $this->topic_comment_reply_service->deleteReply(); 
    }
    
    

    public function checkReplyBody() {  
        $this->stripeReplyBody();
        if(  trim(str_replace( "&nbsp;" , "",  strip_tags(request()->reply) ))  === '' ) {return response()->json(['errMessage' => "Empty Reply" ]);}
    }

    public function stripeReplyBody() {  
        request()->merge( ['reply' =>   strip_tags( request()->reply , '<br><p>') ] );  
    }

}
