<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\storeCommentRequest;
use App\Services\site\ProductCommentService;
use Illuminate\Support\Facades\DB;

class ProductCommentController extends Controller
{
    protected $product_comment_service;

    public function __construct(ProductCommentService $product_comment_service)
    {
        $this->product_comment_service = $product_comment_service;
    }

    public function storeComment($product_id, storeCommentRequest $request)
    {

        try {
            DB::beginTransaction();
            $comment = $this->product_comment_service->storeComment($product_id);
            $comment['user_image'] = $comment->user->image;
            $comment['user_name'] = $comment->user->fullname;
            $comment['date'] = $comment->created_at->format('j F Y');
            $comment['url'] = route('user.product.comment.like', $comment->id);
            $comment['reply_url'] = route('user.product.reply.store', $comment->id);
            $comment['has_image'] = $comment->getOriginal('image') ? true : false;
            $comment['image_url'] = $comment->image;

            $comments_count = $comment->product->comments->count();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }
        return response()->json(['comment' => $comment, 'comments_count' => $comments_count, 'code' => 200]);
    }
}
