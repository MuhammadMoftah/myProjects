<?php

namespace App\Http\Controllers\Admin\Package;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Package\DurationRequest;
use App\Services\DurationService;

class DurationController extends Controller
{
    protected $durationService;

    function __construct(DurationService $durationService)
    {
        $this->durationService = $durationService;
    }

    public function getAll()
    {
        $durations = $this->durationService->getAll();
        return view('admin.package.duration.index', compact('durations'));
    }

    public function create()
    {
        return view('admin.package.duration.create');
    }

    public function post(DurationRequest $request)
    {
        $this->durationService->create();
        return redirect()->route('admin.durations.all')->withMessage("Duration Added Successfully");
    }

    public function edit($id)
    {
        $duration = $this->durationService->getSingle($id);
        return view('admin.package.duration.edit', compact('duration'));
    }

    public function update($id, DurationRequest $request)
    {
        $this->durationService->update($id);
        return redirect()->route('admin.durations.all')->withMessage("Duration Updated Successfully");
    }
}
