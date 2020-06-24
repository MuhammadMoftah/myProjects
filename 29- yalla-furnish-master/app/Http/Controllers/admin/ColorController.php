<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Services\admin\ColorService;
use App\Http\Requests\ColorRequest;

class ColorController extends Controller
{
    protected $color_service;

    public function __construct(ColorService $color_service)
    {
        $this->middleware('permission:color-list', ['only' => ['getAllColors', 'getSingleColor']]);
        $this->middleware('permission:color-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:color-edit', ['only' => ['getEdit', 'postEdit']]);
        $this->middleware('permission:color-delete', ['only' => ['delete']]);

        $this->color_service = $color_service;
    }

    public function getAllColors()
    {
        $colors = $this->color_service->getAllColors();

        if (request()->ajax()) {
            return view('admin.pages.colors.colors_data', compact('colors'))->render();
        }

        return view('admin.pages.colors.all', compact('colors'));
    }

    public function getSingleColor($id)
    {
        $color = $this->color_service->getSingleColor($id);

        return view('admin.pages.colors.view', compact('color'));
    }

    public function create()
    {
        return view('admin.pages.colors.create');
    }

    public function store(ColorRequest $request)
    {
        $this->color_service->storeColor();
        return back()->withMessage('color created successfully');
    }

    public function getEdit($id)
    {
        $color = $this->color_service->getSingleColor($id);
        return view('admin.pages.colors.edit', compact('color'));
    }

    public function postEdit($id, ColorRequest $request)
    {
        $this->color_service->updateColor($id);
        return redirect()->route('admin.colors.get')->withMessage('Color Updated Successfully');
    }

    public function delete($id)
    {
        $this->color_service->deleteColor($id);
        return back()->withMessage('color deleted successfully');
    }
}
