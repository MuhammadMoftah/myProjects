<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\storeCommentRequest;
use App\Http\Requests\GetCommentRequest;
use App\Http\Requests\EditCommentRequest;
use App\Services\site\IdeaCommentService;
use Illuminate\Support\Facades\DB;

class IdeaCommentController extends Controller
{
    protected $idea_comment_service;

    public function __construct(IdeaCommentService $idea_comment_service)
    {
        $this->idea_comment_service = $idea_comment_service;
    }

    public function storeComment($idea_id, storeCommentRequest $request)
    {
        $this->checkCommentBody();
        try {
            DB::beginTransaction();

            $comment = $this->idea_comment_service->storeComment($idea_id);

            $comment['user_image'] = $comment->user->image;
            $comment['user_name'] = $comment->user->fullname;
            $comment['date'] = $comment->created_at->format('j F Y');
            $comment['url'] = route('user.idea.comment.like', $comment->id);
            $comment['reply_url'] = route('user.idea.reply.store', $comment->id);
            $comment['has_image'] = $comment->getOriginal('image') ? true : false;
            $comment['image_url'] = $comment->image;
            $comments_count = $comment->idea->comments->count();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }

        return response()->json([
            'comment' => $comment,
            'comment_counts' => $comments_count,
            'code' => 200
        ]);
    }
    public function deleteComment($commentId, GetCommentRequest $request)
    {
        $response  = $this->idea_comment_service->deleteComment($commentId);
        return $response;
    }
    public function editComment($commentId, EditCommentRequest $request)
    {
        $this->checkCommentBody();
        return $this->idea_comment_service->editComment();
    }

    public function stripCommentBody()
    {
        request()->merge(['comment' =>    strip_tags(request()->comment, '<br><p>')]);
    }

    public function checkCommentBody()
    {
        $this->stripCommentBody();
        if (trim(str_replace("&nbsp;", "", request()->comment))  === '' && !request()->has('image')) {
            return response()->json(['errMessage' => 'Empty Comment']);
        }
    }
}
