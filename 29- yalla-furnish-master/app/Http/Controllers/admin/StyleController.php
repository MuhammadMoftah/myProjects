<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Services\admin\StyleService;
use App\Http\Requests\StyleRequest;

class StyleController extends Controller
{

    protected $request;
    protected $style_service;

    public function __construct(StyleService $style_service)
    {
        $this->middleware('permission:style-list', ['only' => ['getAllstyles', 'getSingleStyle']]);
        $this->middleware('permission:style-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:style-edit', ['only' => ['getEdit', 'postEdit']]);
        $this->middleware('permission:style-delete', ['only' => ['delete']]);

        $this->style_service = $style_service;
    }

    public function getAllStyles()
    {
        $styles = $this->style_service->getAllStyles();

        if (request()->ajax()) {
            return view('admin.pages.styles.styles_data', compact('styles'))->render();
        }

        return view('admin.pages.styles.all', compact('styles'));
    }

    public function getSingleStyle($id)
    {
        $style = $this->style_service->getSingleStyle($id);

        return view('admin.pages.styles.view', compact('style'));
    }

    public function create()
    {
        return view('admin.pages.styles.create');
    }

    public function store(StyleRequest $request)
    {
        $this->style_service->storeStyle();
        return back()->withMessage('Style created successfully');
    }

    public function getEdit($id)
    {
        $style = $this->style_service->getSingleStyle($id);
        return view('admin.pages.styles.edit', compact('style'));
    }

    public function postEdit($id, StyleRequest $request)
    {
        $this->style_service->updateStyle($id);
        return redirect()->route('admin.styles.get')->withMessage('Style updated successfully');
    }

    public function delete($id)
    {
        $this->style_service->deleteStyle($id);
        return back()->withMessage('Style deleted successfully');
    }
}
