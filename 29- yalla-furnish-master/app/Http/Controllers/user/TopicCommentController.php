<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\storeCommentRequest;
use App\Http\Requests\EditTopicCommentRequest;
use App\Http\Requests\DeleteTopicCommentRequest;
use App\Services\site\TopicCommentService;
use Illuminate\Support\Facades\DB;

class TopicCommentController extends Controller
{
    protected $topic_comment_service;

    public function __construct(TopicCommentService $topic_comment_service)
    {
        $this->topic_comment_service = $topic_comment_service;
    }

    public function storeComment($topic_id, storeCommentRequest $request)
    {
        
        $this->checkCommentBody(); 
        try {
            DB::beginTransaction(); 
            $comment = $this->topic_comment_service->storeComment($topic_id); 
            $comment['user_image'] = $comment->user->image;
            $comment['user_name'] = $comment->user->fullname;
            $comment['date'] = $comment->created_at->format('j F Y');
            $comment['url'] = route('user.topic.comment.like', $comment->id);
            $comment['reply_url'] = route('user.topic.reply.store', $comment->id);
            $comment['has_image'] = $comment->getOriginal('image') ? true : false;
            $comment['image_url'] = $comment->image;
            $comments_count = $comment->topic->comments->count();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        } 
        return response()->json(['comment' => $comment, 'comments_count' => $comments_count, 'code' => 200]);
    }

    public function editComment (EditTopicCommentRequest $request)
    {   
        $this->checkCommentBody();
        return $this->topic_comment_service->editComment( request()->id ); 
    }

    public function deleteComment (DeleteTopicCommentRequest $request)
    {    
        return $this->topic_comment_service->deleteComment(); 
    }


    public function stripCommentBody() { 
        request()->merge(['comment' =>    strip_tags( request()->comment , '<br><p>') ] );  
    }

    public function checkCommentBody() {
        $this->stripCommentBody(); 
        if ( trim(str_replace( "&nbsp;" , "",   request()->comment  ))  === '' ) {  return response()->json(['errMessage' => 'Empty Comment']);   } 
    }

   
}
