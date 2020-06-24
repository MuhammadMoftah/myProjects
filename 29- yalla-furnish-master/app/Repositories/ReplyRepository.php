<?php 
namespace App\Repositories;
use  App\Repositories\Interfaces\ReplyRepositoryInterface;
use App\Reply;
class ReplyRepository implements  ReplyRepositoryInterface {

    public $replyModel;
    
    public function __construct(Reply $replyModel) {
        $this->replyModel = $replyModel;
    }
    // store reply
    public function store($repliableModel){
        $reply = $this->replyModel->create([
                                            'user_id' => auth('user')->user()->id, 
                                            'body' => request()->body,
                                            'repliable_type' => $repliableModel, 
                                            'repliable_id' => request()->repliableId
                                        ]);
        return $reply; 
    }
     // delete reply
    public function delete($id) {
        return $this->replyModel->destroy($id); 
    }
     // get reply
     public function get($id) {
        return $this->replyModel->findOrFail($id); 
    }
     // update reply
    public function update($id, $body){
        $reply =  $this->get($id);
        $reply->update(['body' => $body  ]); 
        return $reply;
    } 
}
