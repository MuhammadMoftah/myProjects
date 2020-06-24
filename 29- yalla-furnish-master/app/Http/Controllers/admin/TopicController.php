<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddTopicRequest;
use App\Http\Requests\UpdateTopicRequest;
use App\Services\admin\TopicService;
use App\Topic;
use App\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class TopicController extends Controller
{
    protected $topic_service;
    protected $topic_model;

    public function __construct(TopicService $topic_service, Topic $topic_model)
    {
        $this->middleware('permission:topic-list', ['only' => ['getAllTopics', 'getSingleTopic']]);
        $this->middleware('permission:topic-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:topic-edit', ['only' => ['edit', 'update']]);

        $this->topic_service = $topic_service;
        $this->topic_model = $topic_model;
    }

    public function getAllTopics()
    {
        $topics = $this->topic_service->getTopics();

        if (request()->ajax()) {
            return view('admin.pages.topics.topics_data', compact('topics'))->render();
        }

        return view('admin.pages.topics.all', compact('topics'));
    }

    public function getSingleTopic($id)
    {
        $topic = $this->topic_service->getSingleTopic($id);

        return view('admin.pages.topics.view', compact('topic'));
    }

    public function create(Category $category_model, User $user_model)
    {
        $users = $user_model->get();
        $categories = $category_model->get();

        return view('admin.pages.topics.create', compact('categories', 'users'));
    }

    public function store(AddTopicRequest $request)
    {
        try {
            DB::beginTransaction();
            $this->topic_service->storeTopic();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }

        return back()->withMessage('Topic created successfully');
    }
    public function edit($id, Category $category_model, User $user_model)
    {
        $users = $user_model->get();
        $categories = $category_model->get();
        $topic = $this->topic_model->find($id);
        return view('admin.pages.topics.update', compact(['topic', 'categories', 'users']));
    }

    public function update(UpdateTopicRequest $request)
    {

        try {
            DB::beginTransaction();
            $topic = $this->topic_model->find($request->id);
            $flag = $this->topic_service->updateTopic($topic);
            if ($flag === false) {
                return back()->withErrors('Error , up to 5 images not allowed');
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }

        return redirect()->route('admin.topics.get')->withMessage('Topic updated successfully');
    }
    public function remove_image(Request $request)
    {
        $id = $request->id;
        $image = $request->image;
        $this->topic_service->removeImage($id, $image);
        return back()->withMessage('Image removed successfully');
    }

    public function delete($id)
    {
        $this->topic_service->deleteTopic($id);

        return redirect()->route('admin.topics.get')->withMessage('Topic Deleted Successfully');
    }
}
