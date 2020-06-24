<?php

namespace App\Services\site;

use Illuminate\Http\Request;
use App\IdeaCommentReply;
use App\Http\Resources\CommentReplyUpdateSuccess;
use App\Http\Resources\CommentReplyUpdateError;
use App\Http\Resources\ReplyDeleteError;
use App\Http\Resources\ReplyDeleteSuccess;

class IdeaCommentReplyService
{
    private $idea_comment_reply_model;
    private $request;

    public function __construct(IdeaCommentReply $idea_comment_reply_model, Request $request)
    {
        $this->idea_comment_reply_model = $idea_comment_reply_model;
        $this->request = $request;
    }

    public function storeReply($comment_id)
    {
        $reply_data = [
            'reply' => $this->request->reply,
            'comment_id' => $comment_id,
            'user_id' => auth()->guard('user')->user()->id,
        ]; 
        return $this->idea_comment_reply_model->create($reply_data);
    }

    public function getCommentReplies($comment_id)
    {
        return $this->idea_comment_reply_model->where(['comment_id' => $comment_id])->count();
    }
    
    public function deleteReply($replyId)
    {
        if ( $reply = $this->idea_comment_reply_model->find($replyId) ){
            $reply->delete(); 
            return new ReplyDeleteSuccess(request());
        } else { 
            return new ReplyDeleteError(request());
        }
    }

    // edit reply
    public function editReply($replyId) {
        $reply = $this->idea_comment_reply_model->findOrFail( $replyId);
        if ($reply) { 
            $reply->update([ 'reply' => request()->reply ]);
            return new CommentReplyUpdateSuccess(request());  
        } else {
            return new CommentReplyUpdateError(request());  
        }
    }  
}
