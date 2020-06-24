<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ChatBlock;
use App\Http\Requests\ChatBlockRequest;

class ChatBlockController extends Controller
{
    public function __construct(ChatBlockRequest $request) {
        
    }
    public function store() {
        ChatBlock::create(request()->only('showroom_id', 'user_id'));
    }
    public function delete() {
        ChatBlock::where([
            'showroom_id' => request()->showroom_id, 
            'user_id' => request()->user_id
        ])->first()->delete(); 
    }
}
