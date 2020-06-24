<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VideoRequest;
use App\Models\Video;

class VideoConrtoller extends Controller
{
    function __construct(Video $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        $videos = $this->model->get();
        return view('admin.videos.all', compact('videos'));
    }

    public function getById($id)
    {
        $video = $this->model->findOrFail($id);
        return view('admin.videos.view', compact('video'));
    }

    public function edit($id)
    {
        $video = $this->model->findOrFail($id);
        return view('admin.videos.edit', compact('video'));
    }

    public function update(VideoRequest $request, $id)
    {
        // dd($request->all());
        $video = $this->model->findOrFail($id);
        $video->update([
            'active' => request('active') ? 1 : 0,
            'video' => request('video')
        ]);

        return redirect()->route('admin.videos.all')->withMessage('Video updated succesfully');
    }
}
