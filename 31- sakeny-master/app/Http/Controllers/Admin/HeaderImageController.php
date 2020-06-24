<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\HeaderImage;

class HeaderImageController extends CoreController
{
    function __construct(HeaderImage $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        $covers = $this->model->get();
        return view('admin.covers.all', compact('covers'));
    }

    public function getById($id)
    {
        $cover = $this->model->findOrFail($id);
        return view('admin.covers.view', compact('cover'));
    }

    public function getCreate()
    {
        return view('admin.covers.add');
    }

    public function postCreate(Request $request)
    {
        $this->validate($request, $this->model->getCreateAndUpdateRules());

        $image = $this->model->upload_image($request->image);

        $this->model->create([
            'image' => $image,
            'active' => isset($request->active) ? 1 : 0,
        ]);

        return redirect()->route('admin.covers.all')->withMessage('cover created succesfully');
    }

    public function delete($id)
    {
        $cover = $this->model->findOrFail($id);
        $cover->delete_image();
        $cover->delete();
        return back()->withMessage('cover deleted successfully');
    }

    public function changeStatus($id)
    {
        $cover = $this->model->findOrFail($id);

        $cover->update([
            'active' => $cover->active == 1 ? 0 : 1,
        ]);

        return back()->withMessage('cover photo status changed');
    }
}
