<?php

namespace App\Services;
use App\ShowroomReview;
use App\Http\Resources\Reply\ReplyStoreError;
use App\Http\Resources\Reply\ReplyUpdateError;
use App\Http\Resources\Reply\ReplyUpdateSuccess;
use App\Http\Resources\Reply\ReplyDeleteError;
use App\Http\Resources\Reply\ReplyDeleteSuccess;
 
use App\Repositories\Interfaces\ReplyRepositoryInterface; 
// polymorphic
class RelpyService {

    public $replyRepository;
    // inject comment-repo
    public function __construct(ReplyRepositoryInterface $replyRepository) {
        $this->replyRepository = $replyRepository;
    } 
    // store reply 
    public function store() { 
        if ( $repliableModel = $this->repliableModel() ){
            $reply = $this->replyRepository->store($repliableModel);
            // $this->request->hasFile('image') ? $comment_data['image'] = $this->request->image : ''; 
            return  view('frontend.ajax_components.reply_stored', compact('reply'))->render(); 
        }
        return new ReplyStoreError(request()); // resource
    }
    // delete reply 
    public function destroy() {
        if ($this->replyRepository->delete(request()->id) ){  
            return new ReplyDeleteSuccess(request()); // resource
        }
        return new ReplyDeleteError(request()); // resource
    }
    // update reply 
    public function update() {
        if ($reply = $this->replyRepository->update(request()->id ,  request()->body) ){  
            return new ReplyUpdateSuccess($reply); // resource
        }
        return new ReplyUpdateError(request()); // resource
    }
    // get certain reply 
    public function get() {
        return $this->replyRepository->get(request()->id);
    }
    // check the  repliable type
    public function repliableModel() {
        $type = request()->type;
        if($type === 'comment'){
            return "App\Comment";
        }
        return false;
    }
}