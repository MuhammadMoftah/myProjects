<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Services\site\TopicReplyLikeService;
use Illuminate\Support\Facades\DB;

class TopicReplyLikeController extends Controller
{
    protected $topic_reply_like_service;

    public function __construct(TopicReplyLikeService $topic_reply_like_service)
    {
        $this->topic_reply_like_service = $topic_reply_like_service;
    }

    public function likeReply($reply_id)
    {
        try {
            DB::beginTransaction();

            $liked = $this->topic_reply_like_service->checkLike($reply_id);

            $liked ? $this->topic_reply_like_service->deleteLike($liked->id) : $this->topic_reply_like_service->likeReply($reply_id);

            $likes_count = $this->topic_reply_like_service->getReplyLikes($reply_id);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }

        return response()->json(['reply_like' => $liked, 'reply' => $reply_id, 'likes_count' => $likes_count, 'code' => 200]);
    }
}
