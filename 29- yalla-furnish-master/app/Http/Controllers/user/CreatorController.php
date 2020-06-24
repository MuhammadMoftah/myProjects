<?php

namespace App\Http\Controllers\user;

use App\Boards;
use App\Category;
use App\Http\Controllers\Controller;
use App\Idea;
use Illuminate\Http\Request;
use App\Http\Requests\AddIdeaRequest;
use App\Http\Requests\DismissRequest;
use App\Http\Requests\ParagraphRequest;
use App\Http\Requests\UpdateIdeaRequest;
use App\Services\admin\IdeaService;
use App\Services\admin\ParagraphService;
use App\Services\site\CategoryService;
use App\User;
use App\UserUpdate;
use Illuminate\Support\Facades\DB;

class CreatorController extends Controller
{

    protected $request;
    protected $ideaService;

    public function __construct(Request $request, Idea $idea_model, IdeaService $ideaService)
    {
        $this->request = $request;
        $this->ideaService = $ideaService;
    }

    public function create(CategoryService $categoryService)
    {
        $categories = $categoryService->getAll();
        return view('admin.pages.ideas.creators.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddIdeaRequest $request, UserUpdate $user_updates)
    {
        try {
            DB::beginTransaction();
            $idea_id = $this->ideaService->storeIdea(auth('user')->user()->id);
            $user_updates->create([
                'user_id' => auth()->guard('user')->user()->id,
                'idea_id' => $idea_id,
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }

        return redirect()->route('user.my.profile')->withMessage('Waiting Admin Approval.')->with(['active' => 'idea']);
    }

    public function edit($id, CategoryService $categoryService)
    {
        $idea = $this->ideaService->getIdea($id);
        if (auth()->guard('user')->user()->id == $idea->user_id) {
            $categories = $categoryService->getAll();
            return view('admin.pages.ideas.creators.edit', compact(['categories', 'idea']));
        } else {
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIdeaRequest $request, UserUpdate $user_updates)
    {
        $idea = $this->ideaService->getIdea($request->id);
        if ($idea->user_id != auth('user')->user()->id) {
            abort(404);
        }
        $this->ideaService->editIdea($idea);
        return redirect()->route('user.my.profile')->withMessage('idea updated successfully')->with(['active' => 'idea']);
    }

    public function delete($id)
    {
        $idea = $this->ideaService->getIdea($id);
        if (auth()->guard('user')->user()->id != $idea->user_id) {
            abort(404);
        }
        $this->ideaService->deleteIdea($id);
        return back()->with(['message' => 'idea deleted successfully', 'active' => 'idea']);
    }


    public function storeParagraph($idea_id, ParagraphRequest $request, ParagraphService $paragraphService)
    {
        try {
            DB::beginTransaction();
            $paragraphService->store($idea_id);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }
        return redirect()->route('user.my.profile')->withMessage('idea updated successfully')->with(['active' => 'idea']);
    }

    public function updateParagraph($id, ParagraphRequest $request, ParagraphService $paragraphService)
    {
        try {
            DB::beginTransaction();
            $paragraphService->update($id);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }
        return redirect()->route('user.my.profile')->withMessage('idea updated successfully')->with(['active' => 'idea']);
    }

    public function deleteParagraph($id, ParagraphService $paragraphService)
    {
        try {
            DB::beginTransaction();
            $paragraphService->delete($id);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }
        return redirect()->route('user.my.profile')->withMessage('idea updated successfully')->with(['active' => 'idea']);
    }
}
