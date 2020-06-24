<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpholsteryRequest;
use App\Services\admin\UpholsteryService;
use App\Upholstery;
use Illuminate\Http\Request;

class UpholsteryController extends Controller
{
    protected $upholstery_service;
    protected $upholsteries_model;

    public function __construct(UpholsteryService $upholstery_service, Upholstery $upholsteries_model)
    {
        $this->middleware('permission:upholstery-list', ['only' => ['getAllUpholsteries', 'getSingleUpholstery']]);
        $this->middleware('permission:upholstery-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:upholstery-edit', ['only' => ['getEdit', 'postEdit']]);
        $this->middleware('permission:upholstery-delete', ['only' => ['delete']]);
        $this->upholstery_service = $upholstery_service;
        $this->upholsteries_model = $upholsteries_model;
    }

    public function getAllUpholsteries(Request $request)
    {

        $keyword = $request->keyword;
        $upholsteries = $this->upholsteries_model->newQuery();
        if ($request->ajax()) {
            $upholsteries->where(function ($query) use ($keyword) {
                $query->where('name_ar', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('name_en', 'LIKE', '%' . $keyword . '%');
            });
            $upholsteries = $upholsteries->latest()->paginate(10);
            // return view('admin.pages.upholosteries.all', compact('upholsteries'));

            return view('admin.pages.upholosteries.upholosteries_data', compact('upholsteries'))->render();
        }
        $upholsteries = $upholsteries->latest()->paginate(10);
        return view('admin.pages.upholosteries.all', compact('upholsteries'));
    }

    public function getSingleUpholstery($id)
    {
        $upholstery = $this->upholstery_service->getSingleUpholstery($id);

        return view('admin.pages.upholosteries.view', compact('upholstery'));
    }

    public function create()
    {
        return view('admin.pages.upholosteries.create');
    }

    public function store(UpholsteryRequest $request)
    {
        $this->upholstery_service->storeUpholstery();
        return back()->withMessage('upholstery material created successfully');
    }

    public function getEdit($id)
    {
        $upholstery = $this->upholstery_service->getSingleUpholstery($id);

        return view('admin.pages.upholosteries.edit', compact('upholstery'));
    }

    public function postEdit($id, UpholsteryRequest $request)
    {
        $this->upholstery_service->updateUpholstery($id);
        return redirect()->route('admin.upholsteries.get')->withMessage('upholstery material updated successfully');
    }

    public function delete($id)
    {
        $this->upholstery_service->deleteUpholstery($id);

        return back()->withMessage('upholstery material deleted successfully');
    }
}
