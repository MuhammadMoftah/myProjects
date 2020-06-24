<?php

namespace App\Http\Controllers\Admin\Package;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Package\DurationRequest;
use App\Http\Requests\Package\DurationTypeRequest;
use App\Services\DurationService;
use App\Services\DurationTypeService;

class DurationTypeController extends Controller
{
    protected $durationTypeService;

    function __construct(DurationTypeService $durationTypeService)
    {
        $this->durationTypeService = $durationTypeService;
    }

    public function getAll()
    {
        $types = $this->durationTypeService->getAll();
        return view('admin.package.durationtype.index', compact('types'));
    }

    public function create(DurationService $durationService)
    {
        $durations = $durationService->getAll();
        return view('admin.package.durationtype.create', compact('durations'));
    }

    public function post(DurationTypeRequest $request)
    {
        $this->durationTypeService->create();
        return redirect()->route('admin.durationtypes.all')->withMessage("Duration Type Added Successfully");
    }

    public function edit($id, DurationService $durationService)
    {
        $type = $this->durationTypeService->getSingle($id);
        $durations = $durationService->getAll();
        return view('admin.package.durationtype.edit', compact('durations', 'type'));
    }

    public function update($id, DurationTypeRequest $request)
    {
        $this->durationTypeService->update($id);
        return redirect()->route('admin.durationtypes.all')->withMessage("Duration Type Updated Successfully");
    }
}
