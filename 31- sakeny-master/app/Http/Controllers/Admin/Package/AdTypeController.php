<?php

namespace App\Http\Controllers\Admin\Package;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\Package\AdTypeRequest;
use App\Services\AdTypeService;

class AdTypeController extends Controller
{
    protected $adTypeService;

    function __construct(AdTypeService $adTypeService)
    {
        $this->adTypeService = $adTypeService;
    }

    public function getAll()
    {
        $ad_types = $this->adTypeService->getAll();
        return view('admin.package.ad_type.index', compact('ad_types'));
    }

    public function create()
    {
        return view('admin.package.ad_type.create');
    }

    public function post(AdTypeRequest $request)
    {
        $this->adTypeService->create();
        return redirect()->route('admin.ad_type.all')->withMessage("ad type Added Successfully");
    }

    public function edit($id)
    {
        $ad_type = $this->adTypeService->getSingle($id);
        return view('admin.package.ad_type.edit', compact('ad_type'));
    }


    public function delete($id)
    {

        $this->adTypeService->delete($id);
        return redirect()->route('admin.ad_type.all')->with('success', "ad type deleted Successfully");
    }

    public function update($id, AdTypeRequest $request)
    {
        $ad_type = $this->adTypeService->update($id);
        return redirect()->route('admin.ad_type.all')->with('success', "ad type Updated Successfully");
    }
}
