<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ChatFollowService;
use App\Http\Requests\ChatFollowRequest;
class ChatFollowController extends Controller
{
    public $chatFollowService;
    public function __construct(ChatFollowService $chatFollowService) {
        $this->chatFollowService = $chatFollowService;
    } 
    public function store(ChatFollowRequest $request) {
        return $this->chatFollowService->store();
    }
    public function destroy(ChatFollowRequest $request) {  
        return $this->chatFollowService->destory();
    }
}
