<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RelpyStoreRequest; 
use App\Http\Requests\RelpyDeleteRequest; 
use App\Http\Requests\ReplyUpdateRequest; 
use App\Services\RelpyService;
use App\Reply;
class ReplyController extends Controller
{
    public $replyService;

    public function __construct(RelpyService $replyService) {
        $this->replyService = $replyService;
        // $this->authorizeResource(Reply::class, 'id');
    }
    public function store(RelpyStoreRequest $request){
       $this->authorize('create', Reply::class);
       return $this->replyService->store();
    }
    public function destroy(RelpyDeleteRequest $request){
        $this->authorize('delete', $this->replyService->get());
        return $this->replyService->destroy();
    }
    public function update(ReplyUpdateRequest $request){
        $this->authorize('update', $this->replyService->get());
        return $this->replyService->update();
    }  
}
