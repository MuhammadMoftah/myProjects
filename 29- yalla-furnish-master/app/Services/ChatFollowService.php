<?php 

namespace  App\Services;
use App\Repositories\Interfaces\ChatFollowRepositoryInterface;

class ChatFollowService  {
    public $ChatFollowRepository; 
    // inject comment-repo
    public function __construct(ChatFollowRepositoryInterface $ChatFollowRepository ) {
        $this->ChatFollowRepository = $ChatFollowRepository;   
    }  
 
    public function store() {
        $data = $this->getPinnableData();
        if(!$this->get($data) ) {
            return $this->ChatFollowRepository->store($data);
        } else {
            return false;
        }  
    }
    public function get() { 
        return $this->ChatFollowRepository->get($this->getPinnableData());
    }
    public function destory() {
        $data = $this->getPinnableData();
        if($this->get($data)) {
            $this->ChatFollowRepository->destroy($data);
            return json_encode([
                "message" => "this chat is pinned"
            ]);
        } else {
            return json_encode([
                "message" => "this chat is not pinned"
            ]);
        }
    }
    // check and collect pinnable data
    public function getPinnableData() {
        $pinnableData = [
            'pinnable_id' => request()->pinnedId,  
            'user_id' => CurrentUser()->id,
        ];
        if (request()->pinnedType === "showroom") {
           $pinnableData['pinnable_type'] = 'App\Showroom';
        } elseif (request()->pinnedType === "user") {
            $pinnableData['pinnable_type'] = 'App\User';
        } 
        return $pinnableData;
    }
}