<?php

namespace App\Http\Controllers\admin;

use App\Districtes;
use App\Mall;
use App\Http\Controllers\Controller;
use App\Http\Requests\DismissRequest;
use App\Http\Requests\UpdateShowroomRequest;
use App\Http\Requests\AdminStoreShowroomRequest;
use App\Services\admin\ShowroomService;
use App\Showroom;
use App\Style;
use App\Category;
use App\City;
use App\User;
use DB;
use Illuminate\Http\Request;

class ShowroomController extends Controller
{
    protected $showroom_service;
    protected $request;
    protected $showroom_model;

    public function __construct(Request $request, Showroom $showroom_model, ShowroomService $showroom_service)
    {
        $this->middleware('permission:showroom-list', ['only' => ['all_showrooms', 'showroom_details']]);
        $this->middleware('permission:showroom-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:showroom-edit', ['only' => ['edit_showroom', 'update_showroom']]);
        $this->middleware('permission:showroom-delete', ['only' => ['delete']]);
        $this->middleware('permission:approve-showroom', ['only' => ['changeStatus', 'dismissShowroom']]);

        $this->showroom_model = $showroom_model;
        $this->request = $request;
        $this->showroom_service = $showroom_service;
    }

    // all showroom and filteration
    public function all_showrooms(Request $request)
    {
        $showrooms = $this->showroom_model->newQuery();
        $keyword = $this->request->value;
        if ($request->ajax()) {
            $showrooms->where(function ($query) use ($keyword) {
                $query->where('name_ar', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('name_en', 'LIKE', '%' . $keyword . '%');
            });

            $showrooms = $showrooms->latest()->with(['branches', 'followers', 'user'])->latest()->paginate(15);
            $showrooms_count = $this->showroom_service->getShowroomsCount();
            return view('admin.pages.showrooms.showrooms_data', compact('showrooms', 'showrooms_count'));
        }
        $showrooms = $this->showroom_model->latest()->with(['branches', 'followers', 'user'])->paginate(15);
        // $showrooms_count = $this->showroom_service->getShowroomsCount();
        return view('admin.pages.showrooms.showrooms', compact('showrooms'));
    }

    // single showroom details
    public function showroom_details($id)
    {
        $showroom = $this->showroom_model->findOrFail($id);
        return view('admin.pages.showrooms.showroom_details', compact('showroom'));
    }
    // load showroom form
    public function create(Style $style, Mall $mall_model, Districtes $district, City $city, User $user, Category $category_model)
    {
        $styles = $style->all();
        $districts = $district->all();
        $cities = $city->all();
        $categories = $category_model->all();
        $users = $user->all();
        $malls = $mall_model->all();
        return view('admin.pages.showrooms.create', compact(['malls', 'styles', 'cities', 'categories', 'districts', 'users']));
    }

    // store new showroom
    public function store(AdminStoreShowroomRequest $request)
    {
        try {
            DB::beginTransaction();
            $this->showroom_service->storeShowroom();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }
        return back()->with(['success' => 'success']);
    }

    public function getBranches($id)
    {
        $showroom = $this->showroom_model->findOrFail($id);
        $branches = $showroom->branches;
        return response()->json(compact('branches'));
    }

    public function edit_showroom($id, Style $style, Mall $mall_model, Districtes $district, User $user, Category $category_model)
    {
        $showroom = $this->showroom_model->find($id);
        $styles = $style->all();
        $districts = $district->all();
        $categories = $category_model->all();
        $malls = $mall_model->all();
        $users = $user->all();

        return view('admin.pages.showrooms.update_showroom', compact(['malls', 'showroom', 'categories', 'styles', 'districts', 'users']));
    }

    public function update_showroom(UpdateShowroomRequest $request)
    {
        $this->showroom_service->update(request('id'));
        return redirect()->route('admin.showrooms')->withMessage('showroom Updated successfully');
    }

    public function delete($id)
    {
        $this->showroom_service->deleteShowroom($id);
        return redirect()->route('admin.showrooms')->withMessage('Showroom Deleted Successfully');
    }

    public function changeStatus($id)
    {
        $this->showroom_service->changeStatus($id);
        return redirect()->route('admin.showrooms')->withMessage('Showroom Status Changed Successfully');
    }

    public function changeApproval($id)
    {
        $this->showroom_service->changeApproval($id);
        return redirect()->route('admin.showrooms')->withMessage('Showroom Approved Successfully');
    }

    public function dismissShowroom($id, DismissRequest $request)
    {
        $this->showroom_service->dismissShowroom($id, $request->reason);
        return response()->json(['code' => 200, 'message' => 'showroom has been dismissed']);
    }
}
