<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Size;

class SizeController extends Controller
{
    protected $size_model;
    protected $request;

    public function __construct(Size $size_model, Request $request)
    {
        $this->request = $request;
        $this->size_model = $size_model;
    }

    public function getAll()
    {
        $sizes = $this->size_model->paginate(10);
        return view('admin.pages.sizes.all', compact('sizes'));
    }

    public function getCreate()
    {
        return view('admin.pages.sizes.create');
    }

    public function postCreate()
    {
        $this->validate($this->request, $this->size_model->getCreateAndUpdateRules());

        if ($this->request->from >= $this->request->to) {
            return back()->withErrors('size from must be smaller than size to');
        }

        $this->size_model->create([
            'to' => $this->request->to,
            'from' => $this->request->from
        ]);

        return redirect()->route('admin.sizes')->withMessage('size created successfully!');
    }

    public function delete($id)
    {
        $size = $this->size_model->findOrFail($id);
        return $size->delete() ? back()->withMessage('size has been deleted') : abort(500);
    }

    public function getView($id)
    {
        $size = $this->size_model->findOrFail($id);
        return view('admin.pages.sizes.view', compact('size'));
    }

    public function getEdit($id)
    {
        $size = $this->size_model->findOrFail($id);
        return view('admin.pages.sizes.edit', compact('size'));
    }

    public function postEdit($id)
    {
        $size = $this->size_model->findOrFail($id);
        $this->validate($this->request, $this->size_model->getCreateAndUpdateRules());

        if ($this->request->from >= $this->request->to) {
            return back()->withErrors('size from must be smaller than size to');
        }

        $size->update([
            'to' => $this->request->to,
            'from' => $this->request->from
        ]);
        return redirect()->route('admin.sizes')->withMessage('size updated successfully!');
    }

    public function search()
    {
        $keyword = $this->request->search;
        $sizes = $this->size_model->where('to', $keyword)
            ->orWhere('from', $keyword)->paginate(10);
        return view('admin.pages.sizes.search', compact('sizes'));
    }
}
