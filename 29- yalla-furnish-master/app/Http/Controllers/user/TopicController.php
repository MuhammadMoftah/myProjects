<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTopicRequest;
use App\Http\Requests\UpdateTopicRequest;
use App\Services\site\BoardService;
use App\Services\site\TopicService;
use App\Topic;
use Illuminate\Support\Facades\DB;
use Mail;
use App\Mail\ShareTopicMail;
use App\Http\Requests\shareEmailRequest;
use App\Services\site\CategoryService;

class TopicController extends Controller
{
    protected $topic_service;

    public function __construct(TopicService $topic_service)
    {
        $this->topic_service = $topic_service;
        // $u = Topic::find(32);
        // dd($u->user->toArray(),$u->comments->toArray() ,$u->getCommentsWithDistinct(0)->toArray());
    }

    public function getTopics(CategoryService $categoryService, BoardService $board_service)
    {
        $boards = [];
        $user = null;
        if (auth()->guard('user')->check()) {
            $boards = $board_service->getAllUserBoards(auth()->guard('user')->user()->id);
            $user = auth('user')->user();
        }
        $topics = $this->topic_service->getAllTopics($perPage = 10, $user);
        if (request()->ajax()) {
            return view('frontend.topics.topics_data', compact(['topics', 'boards']))->render();
        }
        $categories = $categoryService->getAll();
        return view('frontend.topics.topics', compact('categories', 'topics', 'boards'));
    }

    public function postCreateTopic(StoreTopicRequest $request)
    {
        $striped = strip_tags(request()->body, '<br><p>');
        request()->merge(['body' =>   $striped]);

        try {
            DB::beginTransaction();
            $this->topic_service->storeTopic();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }
        return back()->withMessage('topic created successfully');
    }

    public function postDeleteTopic($id)
    {
        $topic = Topic::where([
            'id' => $id,
            'user_id' => auth()->guard('user')->user()->id
        ])->firstOrFail();

        $topic->delete();

        if (app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName() == 'user.get.topic') {
            return redirect()->route('user.get.topics');
        }
        return back()->withMessage('topic Deleted Successfully');
    }

    public function postUpdateTopic($id, UpdateTopicRequest $request)
    {
        $striped = strip_tags(request()->body, '<br><p>');
        request()->merge(['body' =>   $striped]);
        $updated = $this->topic_service->updateTopic($id);
        return redirect()->route('user.get.topics');
    }

    public function getEditTopic($id, CategoryService $categoryService)
    {
        $categories = $categoryService->getAll();
        $topic = $this->topic_service->getSingleTopic($id);
        $selectCategories = $topic->categories->pluck('id');
        return view('frontend.topics.topicEdit', compact('topic', 'categories', 'selectCategories'));
    }

    public function getSingleTopic($id, BoardService $board_Service)
    {
        $boards = [];
        if (auth()->guard('user')->check()) {
            $boards = $board_Service->getAllUserBoards(auth()->guard('user')->user()->id);
        }
        $topic = $this->topic_service->getSingleTopic($id);
        if ($topic) {
            return view('frontend.topics.topic_view', compact('topic', 'boards'));
        } else {
            abort(404);
        }
    }

    public function shareTopic($id, $provider)
    {
        $share_link = $this->topic_service->shareTopic($id, $provider);
        return redirect()->away($share_link);
    }

    public function getEmailShare($id)
    {
        $topic = $this->topic_service->getSingleTopic($id);
        return view('frontend.topics.email', compact('topic'));
    }
    public function postEmailShare($id, shareEmailRequest $request)
    {
        $url = route('user.get.topic', $id);
        if ($url) {
            Mail::to($request->email)->send(new ShareTopicMail($url));
        }
        return back()->with('message', 'Thanks for contacting us!');
    }
}
