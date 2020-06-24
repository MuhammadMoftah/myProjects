<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Services\site\ProductReplyLikeService;
use Illuminate\Support\Facades\DB;

class ProductReplyLikeController extends Controller
{
    protected $product_reply_like_service;

    public function __construct(ProductReplyLikeService $product_reply_like_service)
    {
        $this->product_reply_like_service = $product_reply_like_service;
    }

    public function likeReply($reply_id)
    {
        try {
            DB::beginTransaction();

            $liked = $this->product_reply_like_service->checkLike($reply_id);

            $liked ? $this->product_reply_like_service->deleteLike($liked->id) : $this->product_reply_like_service->likeReply($reply_id);

            $likes_count = $this->product_reply_like_service->getReplyLikes($reply_id);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }

        return response()->json(['reply_like' => $liked, 'reply' => $reply_id, 'likes_count' => $likes_count, 'code' => 200]);
    }
}
