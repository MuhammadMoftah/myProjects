<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Services\site\MallService;

class MallController extends Controller
{
    protected $request;
    protected $mall_service;

    public function __construct(MallService $mall_service)
    {
        $this->mall_service = $mall_service;
    }

    public function getSingleMall($id)
    {
        $mall = $this->mall_service->getSingleMall($id);
        return view('frontend.malls.mall', compact('mall'));
    }

    public function getAllMalls()
    {
        $malls = $this->mall_service->getAllMalls();

        if (request()->ajax()) {
            return view('frontend.malls.malls_data', compact('malls'))->render();
        }

        return view('frontend.malls.index', compact('malls'));
    }
}
