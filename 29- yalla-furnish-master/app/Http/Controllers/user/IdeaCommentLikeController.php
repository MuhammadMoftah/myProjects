<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Services\site\IdeaCommentLikeService;
use App\Services\site\IdeaCommentReplyService;
use Illuminate\Support\Facades\DB;

class IdeaCommentLikeController extends Controller
{
    protected $idea_comment_like_service;
    protected $idea_comment_reply_service;

    public function __construct(IdeaCommentLikeService $idea_comment_like_service, IdeaCommentReplyService $idea_comment_reply_service)
    {
        $this->idea_comment_like_service = $idea_comment_like_service;
        $this->idea_comment_reply_service = $idea_comment_reply_service;
    }

    public function likeComment($comment_id)
    {
        try {
            DB::beginTransaction();

            $liked = $this->idea_comment_like_service->checkLike($comment_id);

            $liked ? $this->idea_comment_like_service->deleteLike($liked->id) : $this->idea_comment_like_service->likeComment($comment_id);

            $comment_likes = $this->idea_comment_like_service->getCommentLikes($comment_id);

            $comment_replies = $this->idea_comment_reply_service->getCommentReplies($comment_id);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }

        return response()->json(['comment_like' => $liked, 'comment_id' => $comment_id, 'likes_count' => $comment_likes, 'replies_count' => $comment_replies, 'code' => 200]);
    }
}
