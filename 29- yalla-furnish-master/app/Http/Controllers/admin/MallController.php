<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Services\admin\MallService;
use App\Http\Requests\MallRequest;
use Illuminate\Support\Facades\DB;

class mallController extends Controller
{
    protected $request;
    protected $mall_service;

    public function __construct(MallService $mall_service)
    {
        $this->mall_service = $mall_service;
    }

    public function getAllMalls()
    {
        $malls = $this->mall_service->getAllMalls();

        if (request()->ajax()) {
            return view('admin.pages.malls.malls_data', compact('malls'))->render();
        }

        return view('admin.pages.malls.all', compact('malls'));
    }

    public function getSingleMall($id)
    {
        $mall = $this->mall_service->getSingleMall($id);

        return view('admin.pages.malls.view', compact('mall'));
    }

    public function create()
    {
        return view('admin.pages.malls.create');
    }

    public function store(MallRequest $request)
    {
        try {
            DB::beginTransaction();

            $this->mall_service->storeMall();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }
        return back()->withMessage('Mall created successfully');
    }

    public function getEdit($id)
    {
        $mall = $this->mall_service->getSingleMall($id);
        return view('admin.pages.malls.edit', compact('mall'));
    }

    public function postEdit($id, MallRequest $request)
    {
        try {
            DB::beginTransaction();
            $this->mall_service->updateMall($id);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }

        return redirect()->route('admin.malls.get')->withMessage('Mall updated successfully');
    }

    public function delete($id)
    {
        $this->mall_service->deleteMall($id);
        return back()->withMessage('Mall deleted successfully');
    }
}
