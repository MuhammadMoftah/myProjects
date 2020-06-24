<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Services\site\IdeaReplyLikeService;
use Illuminate\Support\Facades\DB;

class IdeaReplyLikeController extends Controller
{
    protected $idea_reply_like_service;

    public function __construct(IdeaReplyLikeService $idea_reply_like_service)
    {
        $this->idea_reply_like_service = $idea_reply_like_service;
    }

    public function likeReply($reply_id)
    {
        try {
            DB::beginTransaction();

            $liked = $this->idea_reply_like_service->checkLike($reply_id);

            $liked ? $this->idea_reply_like_service->deleteLike($liked->id) : $this->idea_reply_like_service->likeReply($reply_id);

            $likes_count = $this->idea_reply_like_service->getReplyLikes($reply_id);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }

        return response()->json(['reply_like' => $liked, 'reply' => $reply_id, 'likes_count' => $likes_count, 'code' => 200]);
    }
}
