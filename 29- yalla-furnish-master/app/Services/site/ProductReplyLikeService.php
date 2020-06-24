<?php

namespace App\Services\site;

use Illuminate\Http\Request;
use App\ProductReplyLike;

class ProductReplyLikeService
{
    private $product_reply_like_model;
    private $request;

    public function __construct(ProductReplyLike $product_reply_like_model, Request $request)
    {
        $this->product_reply_like_model = $product_reply_like_model;
        $this->request = $request;
    }

    public function likeReply($reply_id)
    {
        $this->product_reply_like_model->create([
            'user_id' => auth()->guard('user')->user()->id,
            'reply_id' => $reply_id,
        ]);
    }

    public function checkLike($reply_id)
    {
        $like = $this->product_reply_like_model->where([
            'user_id' => auth()->guard('user')->user()->id,
            'reply_id' => $reply_id
        ])->first();

        return $like;
    }

    public function deleteLike($id)
    {
        $like = $this->product_reply_like_model->findOrFail($id);

        $like->delete();
    }

    public function getReplyLikes($reply_id)
    {
        return $this->product_reply_like_model->where(['reply_id' => $reply_id])->count();
    }
}
