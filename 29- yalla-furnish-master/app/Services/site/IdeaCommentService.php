<?php

namespace App\Services\site;

use Illuminate\Http\Request;
use App\IdeaComment;
use App\Activity;
use App\Http\Resources\Comment\CommentDeleteSuccess;
use App\Http\Resources\Comment\CommentDeleteError;
use App\Http\Resources\Comment\CommentUpdateSuccess;
use App\Http\Resources\Comment\CommentUpdateError; 
class IdeaCommentService
{
    private $idea_comment_model;
    private $request;

    public function __construct(IdeaComment $idea_comment_model, Request $request)
    {
        $this->idea_comment_model = $idea_comment_model;
        $this->request = $request;
    }

    public function storeComment($idea_id)
    {
        $comment_data = [
            'comment' => $this->request->comment,
            'idea_id' => $idea_id,
            'user_id' => auth()->guard('user')->user()->id,
        ];

        $this->request->hasFile('image') ? $comment_data['image'] = $this->request->image : '';

        $comment = $this->idea_comment_model->create($comment_data);
        $activity = new Activity;

        $activity->create([
            'user_id' => auth()->guard('user')->user()->id,
            'activity' => 'Commented on <a href="' . route('user.get.idea', $idea_id) . '">This Idea</a>'
        ]);

        return $comment;
    }

    public function deleteComment($commentId) {
        $comment = $this->idea_comment_model->findOrFail($commentId);
        if ($comment) {
            $comment->delete(); 
            return new CommentDeleteSuccess(request());  
        } else { 
            return new CommentDeleteError(request());  
        }
    } 
    
    // edit Comment
    public function editComment() {
        $comment = $this->idea_comment_model->findOrFail(request()->commentId);
        if ($comment) { 
            $comment->update([
                'comment' => request()->comment
            ]);
            return new CommentUpdateSuccess($comment);  
        } else {
            return new CommentUpdateError(request());  
        } 
    } 
}
