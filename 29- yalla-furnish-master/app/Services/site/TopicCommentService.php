<?php

namespace App\Services\site;

use App\Activity;
use App\TopicComment;
use Illuminate\Http\Request;
use App\Notifications\SendNotification;
use Illuminate\Support\Facades\Notification;

class TopicCommentService
{
    private $topic_comment_model;
    private $request;

    public function __construct(TopicComment $topic_comment_model, Request $request)
    {
        $this->topic_comment_model = $topic_comment_model;
        $this->request = $request;
    }

    public function storeComment($topic_id)
    {
        $comment_data = [
            'comment' => $this->request->comment,
            'topic_id' => $topic_id,
            'user_id' => auth()->guard('user')->user()->id,
        ];

        $this->request->hasFile('image') ? $comment_data['image'] = $this->request->image : '';

        $comment = $this->topic_comment_model->create($comment_data);

        $activity = new Activity;

        $activity->create([
            'user_id' => auth()->guard('user')->user()->id,
            'activity' => 'Commented on <a href="' . route('user.get.topic', $topic_id) . '">This Topic</a>'
        ]);

        // notiifcation 
        $comment->load(["topic.user", "topic.comments"]);
        $data["text"]        =   $comment->user->first_name . " Commented on topic";
        $data["type"]        =   TopicComment::class;
        $data["typeId"]      =   $comment->id;
        $data['url']         =   route('user.get.topic', ['id' => $comment->topic_id]);
        if ($comment->topic->user && $comment->user_id != $comment->topic->user_id) {
            $comment->topic->user->notify(new SendNotification($data));
        }
        $users = $comment->topic->getCommentsWithDistinct($comment->user_id);
        if ($users->count() > 0)
            Notification::send($users, new SendNotification($data));


        return $comment;
    }
    public function editComment($id)
    {
        if ($comment =  $this->topic_comment_model->findOrFail($id)) {
            if ($comment->user->id === CurrentUser()->id) {
                $comment->update(['comment' => $this->request->comment]);
                if ($this->request->hasFile('image')) {
                    Storage::delete($comment->image);
                    $comment->update(['image' => $this->request->image]);
                }
                return response()->json(['message' => 'Comment Updated Successfully ', 'comment' => $comment]);
            } else {
                abort(403);
            }
        }

        return response()->json(['errMessage' => 'Comment Not Found']);
    }

    public function deleteComment()
    {
        if ($comment =  $this->topic_comment_model->findOrFail(request()->id)) {
            if ($comment->user->id === CurrentUser()->id) {
                $comment->delete();
                return response()->json(['message' => 'Comment deleted Successfully']);
            } else {
                abort(403);
            }
        }
        return response()->json(['errMessage' => 'Comment Not Found']);
    }
}
