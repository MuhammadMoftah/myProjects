<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Services\site\TopicCommentLikeService;
use App\Services\site\TopicCommentReplyService;
use Illuminate\Support\Facades\DB;

class TopicCommentLikeController extends Controller
{
    protected $topic_comment_like_service;
    protected $topic_comment_reply_service;

    public function __construct(TopicCommentLikeService $topic_comment_like_service, TopicCommentReplyService $topic_comment_reply_service)
    {
        $this->topic_comment_like_service = $topic_comment_like_service;
        $this->topic_comment_reply_service = $topic_comment_reply_service;
    }

    public function likeComment($comment_id)
    {
        try {
            DB::beginTransaction();

            $liked = $this->topic_comment_like_service->checkLike($comment_id);

            $liked ? $this->topic_comment_like_service->deleteLike($liked->id) : $this->topic_comment_like_service->likeComment($comment_id);

            $comment_likes = $this->topic_comment_like_service->getCommentLikes($comment_id);

            $comment_replies = $this->topic_comment_reply_service->getCommentReplies($comment_id);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }

        return response()->json(['comment_like' => $liked, 'comment_id' => $comment_id, 'likes_count' => $comment_likes, 'replies_count' => $comment_replies, 'code' => 200]);
    }
}
