<?php

namespace App\Services\site;

use Illuminate\Http\Request;
use App\ProductComment;
use App\Activity;
use App\Notifications\SendNotification;

class ProductCommentService
{
    private $product_comment_model;
    private $request;

    public function __construct(ProductComment $product_comment_model, Request $request)
    {
        $this->product_comment_model = $product_comment_model;
        $this->request = $request;
    }

    public function storeComment($product_id)
    {
        $comment_data = [
            'comment' => request()->comment,
            'product_id' => $product_id,
            'user_id' => auth()->guard('user')->user()->id,
        ];

        if (request()->hasFile('image')) {
            $comment_data['image'] = request()->image;
        }

        $comment = $this->product_comment_model->create($comment_data);
        $activity = new Activity;
        $link = route('user.product.get', $product_id);
        $activity->create([
            'user_id' => auth()->guard('user')->user()->id,
            'activity' => 'Commented on <a href="' . $link . '">This Product</a>'
        ]);

        $showroomUser = $comment->product->showroom->user;
        $commentUser = $comment->user;

        if ($showroomUser->id != $commentUser->id) {
            $product = $comment->product;
            $showroomUser->notify(new SendNotification([
                'type' => \App\Product::class,
                'typeId' => $product->id,
                'url' => $link,
                'text' => "$commentUser->first_name Commented on $product->name_en"
            ]));
        }
        return $comment;
    }
}
