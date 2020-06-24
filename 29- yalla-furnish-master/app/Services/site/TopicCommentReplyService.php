<?php

namespace App\Services\site;

use App\TopicCommentReply;
use Illuminate\Http\Request;
use App\Notifications\SendNotification;

class TopicCommentReplyService
{
    private $topic_comment_reply_model;
    private $request;

    public function __construct(TopicCommentReply $topic_comment_reply_model, Request $request)
    {
        $this->topic_comment_reply_model = $topic_comment_reply_model;
        $this->request = $request;
    }

    public function storeReply($comment_id)
    {
        $reply_data = [
            'reply' => $this->request->reply,
            'comment_id' => $comment_id,
            'user_id' => auth()->guard('user')->user()->id,
        ];
        $replay = $this->topic_comment_reply_model->create($reply_data);

        if ($replay['user_id'] != $replay->comment->user_id) {
            // notiifcation 
            $replay->load(["comment.user", "comment.topic.user"]);
            $data["text"]        =   $replay->user->first_name . "replied to your comment";
            $data["type"]        =   TopicCommentReply::class;
            $data["typeId"]      =   $replay->id;
            $data['url']         =   route('user.get.topic', ['id' => $replay->comment->topic_id]);
            $replay->comment->user->notify(new SendNotification($data));
            if ($replay->comment->user_id != $replay->comment->topic->user_id) {
                $replay->comment->topic->user->notify(new SendNotification($data));
            }
        } else {
            $replay->comment->topic->user->notify(new SendNotification($data));
        }

        return $replay;
    }

    public function editReply($id)
    {
        if ($reply =  $this->topic_comment_reply_model->findOrFail($id)) {
            if ($reply->user->id === CurrentUser()->id) {
                $reply->update(['reply' => $this->request->reply]);
                return response()->json(['message' => 'Reply Updated Successfully ', 'reply' => $reply]);
            } else {
                abort(403);
            }
        }
        return response()->json(['errMessage' => 'Reply Not Found']);
    }

    public function deleteReply()
    {
        if ($reply =  $this->topic_comment_reply_model->findOrFail(request()->id)) {
            if ($reply->user->id === CurrentUser()->id) {
                $reply->delete();
                return response()->json(['message' => 'Reply Deleted Successfully ']);
            } else {
                abort(403);
            }
        }
        return response()->json(['errMessage' => 'Reply Not Found']);
    }




    public function getCommentReplies($comment_id)
    {
        return $this->topic_comment_reply_model->where(['comment_id' => $comment_id])->count();
    }
}
