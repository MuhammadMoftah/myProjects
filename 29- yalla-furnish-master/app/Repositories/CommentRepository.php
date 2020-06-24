<?php 
namespace App\Repositories;
use  App\Repositories\Interfaces\CommentRepositoryInterface;
use App\Comment;
class CommentRepository implements  CommentRepositoryInterface 
{ 
    public $commentModel;
    
    public function __construct(Comment $commentModel) {
        $this->commentModel = $commentModel;
    }
    // store comment - return comment
    public function store($commentableModel){
        $comment = $this->commentModel->create([
                                            'user_id' => auth('user')->user()->id, 
                                            'body' => request()->body,
                                            'commentable_type' => $commentableModel, 
                                            'commentable_id' => request()->comentableId
                                        ]);
        return $comment; 
    }
    // delete comment - return bollean
    public function delete($id) {
        return $this->commentModel->destroy($id); 
    }
    // update comment - return comment
    public function update($id, $body){
        $comment =  $this->get($id);
        $comment->update(['body' => $body  ]); 
        return $comment;
    } 
    // get comment - return comment
    public function get($id) { return $this->commentModel->findOrFail($id);  }
}
