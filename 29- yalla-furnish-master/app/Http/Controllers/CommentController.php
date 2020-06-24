<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentStoreRequest;
use App\Http\Requests\CommentDeleteRequest; 
use App\Http\Requests\CommentUpdateRequest; 
use App\Services\CommentService;
use App\Comment; 
class CommentController extends Controller
{
    public $commentService; 

    public function __construct(CommentService $commentService) {
        $this->commentService = $commentService;   
        // $this->authorizeResource(Comment::class , 'id');
    }
    public function store(CommentStoreRequest $request){
       $this->authorize('create', Comment::class);
       return $this->commentService->store();
    } 
    public function destroy(CommentDeleteRequest $request){   
        $this->authorize('delete', $this->commentService->get());
        return $this->commentService->delete();
    }
    public function update(CommentUpdateRequest $request){
        $this->authorize('update', $this->commentService->get());
        return $this->commentService->update();
    }
}
