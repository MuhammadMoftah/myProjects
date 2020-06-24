<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddIdeaRequest;
use App\Http\Requests\DismissRequest;
use App\Http\Requests\UpdateIdeaRequest;
use App\Idea;
use App\Services\admin\IdeaService;
use App\User;
use App\UserUpdate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IdeaController extends Controller
{
    private $ideaService;
    protected $idea_model;
    /**
     * IdeaController constructor.
     * @param $ideaService
     */
    public function __construct(IdeaService $ideaService, Idea $idea_model)
    {
        $this->middleware('permission:idea-list', ['only' => ['index', 'show']]);
        $this->middleware('permission:idea-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:idea-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:idea-delete', ['only' => ['delete', 'changeStatus', 'dismissIdea']]);

        $this->ideaService = $ideaService;
        $this->idea_model = $idea_model;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $ideas = $this->idea_model->newQuery();
        if ($request->ajax()) {
            $ideas->where(function ($query) use ($keyword) {
                $query->where('name_en', 'LIKE', '%' . $keyword . '%')->orWhere('name_ar', 'LIKE', '%' . $keyword . '%');
            })->orWhereHas('user', function ($query) use ($keyword) {
                $query->where(function ($query) use ($keyword) {
                    $query->where('first_name', 'LIKE', '%' . $keyword . '%')->orWhere('last_name', 'LIKE', '%' . $keyword . '%');
                });
            });
            $ideas = $ideas->latest()->paginate(10);
            return view('admin.pages.ideas.ideas_data', compact('ideas'));
        }
        $ideas = $ideas->latest()->paginate(10);
        return view('admin.pages.ideas.index', compact('ideas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user_model, Category $category_model)
    {
        $users = $user_model->creator()->get();
        $categories = $category_model->get();

        return view('admin.pages.ideas.create', compact('users', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddIdeaRequest $request, UserUpdate $user_updates)
    {
        try {
            DB::beginTransaction();
            $idea_id = $this->ideaService->storeIdea();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }

        return back()->withMessage('idea created successfully');
    }

    /**
     * Display the specified Idea.
     */
    public function show($id)
    {
        $idea = $this->ideaService->getIdea($id);
        return view('admin.pages.ideas.details')->with('idea', $idea);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, User $user, Category $category)
    {
        $idea = $this->ideaService->getIdea($id);
        $users = $user->creator()->get();
        $categories = $category->all();
        return view('admin.pages.ideas.edit', compact(['users', 'categories', 'idea']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIdeaRequest $request)
    {
        $idea = $this->ideaService->getIdea($request->id);
        $this->ideaService->editIdea($idea);
        return redirect()->route('admin.idea')->withMessage('idea updated successfully');
    }

    public function delete($id)
    {
        $this->ideaService->deleteIdea($id);
        return back()->withMessage('idea deleted successfully');
    }

    public function changeStatus($id)
    {
        $this->ideaService->changeStatus($id);
        return back();
    }

    public function dismissIdea($id, DismissRequest $request)
    {
        $this->ideaService->dismissIdea($id, $request->reason);
        return response()->json(['code' => 200, 'message' => 'Idea has been Suspended']);
    }
}
