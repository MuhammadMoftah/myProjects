<?php

namespace App\Http\Controllers\admin;

use App\Feedback;
use App\Http\Controllers\Controller;
use App\User;

use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    protected $feedback_model;
    protected $request;

    public function __construct(Feedback $feedback_model, Request $request)
    {
        $this->request = $request;
        $this->feedback_model = $feedback_model;
    }

    public function getAll()
    {
        $feedbacks = $this->feedback_model->latest()->paginate(10);
        return view('admin.pages.feedbacks.all', compact('feedbacks'));
    }

    public function getCreate(User $user_model)
    {
        $users = $user_model->get();
        return view('admin.pages.feedbacks.create', compact('users'));
    }

    public function postCreate()
    {
        $this->validate($this->request, $this->feedback_model->getCreateAndUpdateRules());

        $this->feedback_model->create([
            'body' => $this->request->body,
            'user_id' => $this->request->user_id
        ]);

        return redirect()->route('admin.feedbacks')->withMessage('feedback created successfully!');
    }

    public function delete($id)
    {
        $feedback = $this->feedback_model->findOrFail($id);
        return $feedback->delete() ?back()->withMessage('feedback has been deleted') : abort(500);
    }

    public function getView($id)
    {
        $feedback = $this->feedback_model->findOrFail($id);
        return view('admin.pages.feedbacks.view', compact('feedback'));
    }

    public function getEdit($id, User $user_model)
    {
        $feedback = $this->feedback_model->findOrFail($id);
        $users = $user_model->get();
        return view('admin.pages.feedbacks.edit', compact('feedback', 'users'));
    }

    public function postEdit($id)
    {
        $feedback = $this->feedback_model->findOrFail($id);
        $this->validate($this->request, $this->feedback_model->getCreateAndUpdateRules());

        $feedback->update([
            'body' => $this->request->body,
            'user_id' => $this->request->user_id
        ]);

        return redirect()->route('admin.feedbacks')->withMessage('feedback updated successfully!');
    }

    public function search()
    {
        $keyword = $this->request->search;
        $feedbacks = $this->feedback_model->where('body', 'LIKE', "%" . $keyword . "%")->latest()->paginate(10);
        return view('admin.pages.feedbacks.search', compact('feedbacks'));
    }

    public function approve($id)
    {
        $feedback = $this->feedback_model->findOrFail($id);
        $feedback->approved == 0 ?$feedback->update(['approved' => 1]) : $feedback->update(['approved' => 0]);
        return back();
    }
}
