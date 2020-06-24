<?php

namespace App\Services;
use App\ShowroomReview;
use App\Http\Resources\Comment\CommentStoreSuccess;
use App\Http\Resources\Comment\CommentStoreError;
use App\Http\Resources\Comment\CommentDeleteSuccess;
use App\Http\Resources\Comment\CommentDeleteError;
use App\Http\Resources\Comment\CommentUpdateSuccess;
use App\Http\Resources\Comment\CommentUpdateError;
use App\Repositories\Interfaces\CommentRepositoryInterface;  
 
use App\Services\ImageService;
// polymorphic
class CommentService {

    public $commentRepository;
    public $imageService;
    // inject comment-repo
    public function __construct(CommentRepositoryInterface $commentRepository , ImageService $imageService) {
        $this->commentRepository = $commentRepository;
        $this->imageService = $imageService;
    } 
    // store comment 
    public function store() { 
        if ( $commentableModel = $this->commentableModel() ){
            $comment = $this->commentRepository->store($commentableModel); 
            $this->checkImage($comment->id, 'store');  
            return  view('frontend.ajax_components.comment_stored', compact('comment'))->render();   
        }
        return new CommentStoreError(request()); // resource
    }
    // delete comment 
    public function delete() { 
        if ($this->commentRepository->delete(request()->id) ){  
            return new CommentDeleteSuccess(request()); // resource
        }
        return new CommentDeleteError(request()); // resource
    }
    // update comment 
    public function update() {
        if ($comment = $this->commentRepository->update(request()->id ,  request()->body) ){  
            return new CommentUpdateSuccess($comment); // resource
        }
        return new CommentUpdateError(request()); // resource
    }
    // get certain comment 
    public function get() {
        return $this->commentRepository->get(request()->id);
    }
    // check the commentable type
    public function commentableModel() {
        $type = request()->type;
        if($type === 'showroom_review'){
            return "App\ShowroomReview";
        }
        return false;
    }
    //  check if image Exist 
    public function checkImage($id, $action) { 
        if(request()->hasFile('image') && $action){
            $imageableData = [
                'id' => $id, 
                'type' => 'App\Comment'
            ]; 
            if ($action == 'store'){
                $this->imageService->store( request('image'),   $imageableData);
            } elseif ($action == 'update') {
                $this->imageService->update(  request('image'),   $imageableData);
            }
        }
    }
}