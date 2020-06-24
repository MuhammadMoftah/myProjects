<?php 
namespace App\Repositories;
use App\Repositories\Interfaces\ChatFollowRepositoryInterface;
use App\ChatFollow;
class ChatFollowRepository implements ChatFollowRepositoryInterface {

    public $chatFollowModel;
    
    public function __construct(ChatFollow $chatFollowModel) {
        $this->chatFollowModel = $chatFollowModel;
    }
    public function store(array $pinnableData){
        return $this->chatFollowModel->create($pinnableData); 
    }
    public function destroy(array $pinnableData) {
        return $this->chatFollowModel->where($pinnableData)->first()->delete(); 
    }
    public function get(array $pinnableData){
        return $this->chatFollowModel->where($pinnableData)->first(); 
    }
}
