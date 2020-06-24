<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\storeReplyRequest;
use App\Services\site\ProductCommentLikeService;
use App\Services\site\ProductCommentReplyService;
use Illuminate\Support\Facades\DB;

class ProductCommentReplyController extends Controller
{
    protected $topic_comment_reply_service;
    protected $topic_comment_like_service;

    public function __construct(ProductCommentReplyService $product_comment_reply_service, ProductCommentLikeService $product_comment_like_service)
    {
        $this->product_comment_like_service = $product_comment_like_service;
        $this->product_comment_reply_service = $product_comment_reply_service;
    }

    public function storeReply($comment_id, storeReplyRequest $request)
    {
        try {
            DB::beginTransaction();

            $reply = $this->product_comment_reply_service->storeReply($comment_id);

            $reply['user_image'] = $reply->user->image;
            $reply['user_name'] = $reply->user->fullname;
            $reply['date'] = $reply->created_at->format('j F Y');
            $reply['url'] = route('user.product.reply.like', $reply->id);

            $comment_likes = $this->product_comment_like_service->getCommentLikes($comment_id);

            $replies_count = $this->product_comment_reply_service->getCommentReplies($comment_id);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }

        return response()->json(['reply' => $reply, 'replies_count' => $replies_count, 'likes_count' => $comment_likes, 'code' => 200]);
    }
}
