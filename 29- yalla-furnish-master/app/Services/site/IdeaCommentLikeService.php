<?php

namespace App\Services\site;

use Illuminate\Http\Request;
use App\IdeaCommentLike;
use App\Notifications\SendNotification;

class IdeaCommentLikeService
{
    private $idea_comment_like_model;
    private $request;

    public function __construct(IdeaCommentLike $idea_comment_like_model, Request $request)
    {
        $this->idea_comment_like_model = $idea_comment_like_model;
        $this->request = $request;
    }

    public function likeComment($comment_id)
    {
        $like = $this->idea_comment_like_model->create([
            'user_id' => auth()->guard('user')->user()->id,
            'comment_id' => $comment_id,
        ]);

        $commentUser = $like->comment->user;
        $likeUser = $like->user;

        if ($likeUser->id != $commentUser->id) {
            $idea = $like->comment->idea;
            $commentUser->notify(new SendNotification([
                'type' => \App\Idea::class,
                'typeId' => $idea->id,
                'url' => route('user.get.idea', $product->id),
                'text' => "$likeUser->first_name Like Your Comment on this Idea"
            ]));
        }
    }

    public function checkLike($comment_id)
    {
        $like = $this->idea_comment_like_model->where([
            'user_id' => auth()->guard('user')->user()->id,
            'comment_id' => $comment_id
        ])->first();

        return $like;
    }

    public function deleteLike($id)
    {
        $like = $this->idea_comment_like_model->findOrFail($id);
        $like->delete();
    }

    public function getCommentLikes($comment_id)
    {
        return $this->idea_comment_like_model->where(['comment_id' => $comment_id])->count();
    }
}
