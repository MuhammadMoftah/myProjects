<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\HomeBannerRequest;
use App\Models\HomeBanner;

class HomeBannerController extends Controller
{
    function __construct(HomeBanner $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        $banners = $this->model->get();
        return view('admin.homeBanners.all', compact('banners'));
    }

    public function getById($id)
    {
        $banner = $this->model->findOrFail($id);
        return view('admin.homeBanners.view', compact('banner'));
    }

    public function edit($id)
    {
        $banner = $this->model->findOrFail($id);
        return view('admin.homeBanners.edit', compact('banner'));
    }

    public function update(HomeBannerRequest $request, $id)
    {
        // dd($request->all());
        $banner = $this->model->findOrFail($id);
        $banner->update([
            'image' => request('image'),
            'active' => request('active') ? 1 : 0,
            'link' => request('link')
        ]);

        return redirect()->route('admin.home_banners.all')->withMessage('Banner updated succesfully');
    }
}
