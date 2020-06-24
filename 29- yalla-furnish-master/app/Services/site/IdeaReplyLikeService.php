<?php

namespace App\Services\site;

use Illuminate\Http\Request;
use App\IdeaReplyLike;

class IdeaReplyLikeService
{
    private $idea_reply_like_model;
    private $request;

    public function __construct(IdeaReplyLike $idea_reply_like_model, Request $request)
    {
        $this->idea_reply_like_model = $idea_reply_like_model;
        $this->request = $request;
    }

    public function likeReply($reply_id)
    {
        $this->idea_reply_like_model->create([
            'user_id' => auth()->guard('user')->user()->id,
            'reply_id' => $reply_id,
        ]);
    }

    public function checkLike($reply_id)
    {
        $like = $this->idea_reply_like_model->where([
            'user_id' => auth()->guard('user')->user()->id,
            'reply_id' => $reply_id
        ])->first();

        return $like;
    }

    public function deleteLike($id)
    {
        $like = $this->idea_reply_like_model->findOrFail($id);

        $like->delete();
    }

    public function getReplyLikes($reply_id)
    {
        return $this->idea_reply_like_model->where(['reply_id' => $reply_id])->count();
    }
}
