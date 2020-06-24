<?php

namespace App\Services\site;

use App\Notifications\SendNotification;
use Illuminate\Http\Request;
use App\ProductCommentLike;

class ProductCommentLikeService
{
    private $product_comment_like_model;
    private $request;

    public function __construct(ProductCommentLike $product_comment_like_model, Request $request)
    {
        $this->product_comment_like_model = $product_comment_like_model;
        $this->request = $request;
    }

    public function likeComment($comment_id)
    {
        $like = $this->product_comment_like_model->create([
            'user_id' => auth()->guard('user')->user()->id,
            'comment_id' => $comment_id,
        ]);

        $commentUser = $like->comment->user;
        $likeUser = $like->user;

        if ($likeUser->id != $commentUser->id) {
            $product = $like->comment->product;
            $commentUser->notify(new SendNotification([
                'type' => \App\Product::class,
                'typeId' => $product->id,
                'url' => route('user.product.get', $product->id),
                'text' => "$likeUser->first_name Like Your Comment on $product->name_en"
            ]));
        }
    }

    public function checkLike($comment_id)
    {
        $like = $this->product_comment_like_model->where([
            'user_id' => auth()->guard('user')->user()->id,
            'comment_id' => $comment_id
        ])->first();

        return $like;
    }

    public function deleteLike($id)
    {
        $like = $this->product_comment_like_model->findOrFail($id);
        $like->delete();
    }

    public function getCommentLikes($comment_id)
    {
        return $this->product_comment_like_model->where(['comment_id' => $comment_id])->count();
    }
}
