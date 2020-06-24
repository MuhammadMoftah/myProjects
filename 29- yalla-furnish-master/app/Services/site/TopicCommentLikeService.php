<?php

namespace App\Services\site;

use App\Notifications\SendNotification;
use Illuminate\Http\Request;
use App\TopicCommentLike;

class TopicCommentLikeService
{
    private $topic_comment_like_model;
    private $request;

    public function __construct(TopicCommentLike $topic_comment_like_model, Request $request)
    {
        $this->topic_comment_like_model = $topic_comment_like_model;
        $this->request = $request;
    }

    public function likeComment($comment_id)
    {
        $like = $this->topic_comment_like_model->create([
            'user_id' => auth()->guard('user')->user()->id,
            'comment_id' => $comment_id,
        ]);

        $commentUser = $like->comment->user;
        $likeUser = $like->user;

        if ($likeUser->id != $commentUser->id) {
            $topic = $like->comment->topic;
            $commentUser->notify(new SendNotification([
                'type' => \App\Topic::class,
                'typeId' => $topic->id,
                'url' => route('user.get.topic', $topic->id),
                'text' => "$likeUser->first_name Like Your Comment on This Topic"
            ]));
        }
    }

    public function checkLike($comment_id)
    {
        $like = $this->topic_comment_like_model->where([
            'user_id' => auth()->guard('user')->user()->id,
            'comment_id' => $comment_id
        ])->first();

        return $like;
    }

    public function deleteLike($id)
    {
        $like = $this->topic_comment_like_model->findOrFail($id);

        $like->delete();
    }

    public function getCommentLikes($comment_id)
    {
        return $this->topic_comment_like_model->where(['comment_id' => $comment_id])->count();
    }
}
