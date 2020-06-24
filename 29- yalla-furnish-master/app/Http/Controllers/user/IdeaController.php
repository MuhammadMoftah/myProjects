<?php

namespace App\Http\Controllers\user;

use Mail;
use App\Http\Controllers\Controller;
use App\Services\site\IdeaService;
use App\Mail\ShareIdeaMail;
use App\Http\Requests\shareEmailRequest;
use App\Services\site\CategoryService;
use App\Idea;

class IdeaController extends Controller
{
    protected $idea_service;

    public function __construct(IdeaService $idea_service)
    {
        $this->idea_service = $idea_service;
    }

    public function get_ideas(CategoryService $categoryService)
    {
        $categories = $categoryService->getAll();
        $ideas = $this->idea_service->getIdeas();
        return view('frontend.ideas.ideas', compact(['ideas', 'categories']));
    }

    public function get_ideasAjex(CategoryService $categoryService)
    {
        $categories = $categoryService->getAll();
        $ideas = $this->idea_service->getIdeas();
        return view('frontend.ideas.ideas_data', compact('ideas'))->render();
    }

    public function getSingleIdea($id)
    {
        $idea  = $this->idea_service->getSingleIdea($id);
        $getRelated = $this->idea_service->getRelated($idea);

        $boards = [];
        if (auth()->guard('user')->check()) {
            $boards = auth('user')->user()->boards;
        }

        return view('frontend.ideas.view', compact(['idea', 'boards']));
    }

    public function shareIdea($id, $provider)
    {
        $share_link = $this->idea_service->shareIdea($id, $provider);
        return redirect()->away($share_link);
    }

    public function getEmailShare($id)
    {
        $idea = $this->idea_service->getSingleIdea($id);
        return view('frontend.ideas.email', compact('idea'));
    }
    public function postEmailShare($id, shareEmailRequest $request)
    {
        $url = route('user.get.idea', $id);
        if ($url) {
            Mail::to($request->email)->send(new ShareIdeaMail($url));
        }
        return back()->with('message', 'Thanks for contacting us!');
    }

    public function advancedSearch(CategoryService $categoryService)
    {
        $categories = $categoryService->getAll();
        $ideas = $this->idea_service->getIdeas($perPage = 10);
        $keyword = request('keyword');
        if (request()->ajax()) {
            return view('frontend.ideas.advanced_ideas_data', compact(['ideas']));
        }
        return view('frontend.search_layouts.advanced_search_ideas', compact(['keyword', 'ideas', 'categories']));
    }
}
