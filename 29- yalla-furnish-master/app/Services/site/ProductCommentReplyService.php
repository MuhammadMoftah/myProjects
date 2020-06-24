<?php

namespace App\Services\site;

use App\Notifications\SendNotification;
use Illuminate\Http\Request;
use App\ProductCommentReply;

class ProductCommentReplyService
{
    private $topic_comment_reply_model;
    private $request;

    public function __construct(ProductCommentReply $product_comment_reply_model, Request $request)
    {
        $this->product_comment_reply_model = $product_comment_reply_model;
        $this->request = $request;
    }

    public function storeReply($comment_id)
    {
        $reply_data = [
            'reply' => $this->request->reply,
            'comment_id' => $comment_id,
            'user_id' => auth()->guard('user')->user()->id,
        ];

        $reply = $this->product_comment_reply_model->create($reply_data);

        $product = $reply->comment->product;
        $showroomUser = $product->showroom->user;
        $replyUser = $reply->user;

        if ($replyUser->id != $showroomUser->id) {
            $link = route('user.product.get', $product->id);
            $showroomUser->notify(new SendNotification([
                'type' => \App\Product::class,
                'typeId' => $product->id,
                'url' => $link,
                'text' => "$replyUser->first_name Replied On $product->name_en"
            ]));
        }

        return $reply;
    }

    public function getCommentReplies($comment_id)
    {
        return $this->product_comment_reply_model->where(['comment_id' => $comment_id])->count();
    }
}
