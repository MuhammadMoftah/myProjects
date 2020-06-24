<?php

namespace App\Http\Controllers\admin;

use App\Ad;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AdController extends Controller
{
    protected $ad_model;
    protected $request;

    public function __construct(Ad $ad_model, Request $request)
    {
        $this->request = $request;
        $this->ad_model = $ad_model;
    }

    public function getAll()
    {
        $ads = $this->ad_model->paginate(10);
        return view('admin.pages.ads.all', compact('ads'));
    }

    public function getCreate()
    {
        return view('admin.pages.ads.create');
    }

    public function postCreate()
    {
        $this->validate($this->request, $this->ad_model->getCreateRules());

        if ($this->request->hasFile('image')) {
            $imageName = $this->ad_model->uploadAdImage($this->request->image);
        }

        $this->ad_model->create([
            'body' => $this->request->body,
            'image' => $imageName
        ]);

        return redirect()->route('admin.ads')->withMessage('ad created successfully!');
    }

    public function delete($id)
    {
        $ad = $this->ad_model->findOrFail($id);
        $ad->deleteAdImage();
        return $ad->delete() ? back()->withMessage('ad has been deleted') : abort(500);
    }

    public function getView($id)
    {
        $ad = $this->ad_model->findOrFail($id);
        return view('admin.pages.ads.view', compact('ad'));
    }

    public function getEdit($id)
    {
        $ad = $this->ad_model->findOrFail($id);
        return view('admin.pages.ads.edit', compact('ad'));
    }

    public function postEdit($id)
    {
        $ad = $this->ad_model->findOrFail($id);
        $this->validate($this->request, $this->ad_model->getUpdateRules());

        if ($this->request->hasFile('image')) {
            $this->validate($this->request, $this->ad_model->validate_image());
            $imageName = $this->ad_model->uploadAdImage($this->request->image);
            $ad->deleteAdImage();
            $ad->update([
                'image' => $imageName
            ]);
        }

        $ad->update([
            'body' => $this->request->body,
        ]);

        return redirect()->route('admin.ads')->withMessage('ad updated successfully!');
    }

    public function search()
    {
        $keyword = $this->request->search;
        $ads = $this->ad_model->where('body', 'LIKE', "%" . $keyword . "%")->paginate(10);
        return view('admin.pages.ads.search', compact('ads'));
    }

    public function approve($id)
    {
        $ad = $this->ad_model->findOrFail($id);
        $ad->approved == 0 ? $ad->update(['approved' => 1]) : $ad->update(['approved' => 0]);
        return back();
    }
}
