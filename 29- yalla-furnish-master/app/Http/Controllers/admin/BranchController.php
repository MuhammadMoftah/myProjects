<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Services\admin\BranchService;
use Illuminate\Http\Request;
use App\Branch;
use App\Http\Requests\EditBranchRequest;

class BranchController extends Controller
{
    private $branchService;
    protected $model;

    /**
     * BranchController constructor.
     * @param BranchService $branchService
     */
    public function __construct(BranchService $branchService,Branch $model)
    {
        $this->branchService = $branchService;
        $this->model=$model;
        $this->middleware('permission:showroom-list', ['only' => ['index', 'show']]);
    }

    /**
     * Display a listing of the Branches.
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {

        $keyword=$request->keyword;
        $branches = $this->model->newQuery();
        if ($request->ajax()) {
            $branches->where(function ($query) use ($keyword) {
                $query->where('address_ar', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('address_en', 'LIKE', '%' . $keyword . '%');
            });
    
            $branches = $branches->latest()->paginate(10);
            return view('admin.pages.branches.branches_data', compact('branches'))->render();
        }
        $branches = $branches->latest()->paginate(10);
        return view('admin.pages.branches.index', compact('branches'));
    }

   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
       $branch = $this->model->findOrFail($id);
       $branch->delete();
       $branch->info()->delete();

       return redirect()->back()->withMessage('branch deleted successfully');
    }
    public function show($id)
    {
        $branch = $this->model->findOrFail($id);
        // return $branch->info[0]->to;
        return view('admin.pages.branches.details', compact('branch'));


    }
    public function edit($id)
    {
        $branch = $this->model->findOrFail($id);
        return view('admin.pages.branches.edit', compact('branch'));

    }
    public function update(EditBranchRequest $request,$id)
    {
        $this->branchService->update($id);
        return redirect()->back()->withMessage('edit successfuly');

    }
}
