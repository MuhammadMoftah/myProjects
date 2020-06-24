<?php
namespace App\Http\Controllers\admin;

use App\Content;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ContentController extends Controller
{
    protected $content_model;
    protected $request;

    public function __construct(Content $content_model, Request $request)
    {
        $this->request = $request;
        $this->content_model = $content_model;
    }

    public function getAll()
    {
        $contents = $this->content_model->get();
        return view('admin.pages.contents.all', compact('contents'));
    }

    public function getView($id)
    {
        $content = $this->content_model->findOrFail($id);
        return view('admin.pages.contents.view', compact('content'));
    }

    public function getEdit($id)
    {
        $content = $this->content_model->findOrFail($id);
        return view('admin.pages.contents.edit', compact('content'));
    }

    public function postEdit($id)
    {
        $content = $this->content_model->findOrFail($id);
        $this->validate($this->request, $this->content_model->getUpdateRules());
        $content->update([
            'body_en' => $this->request->body_en,
            'body_ar' => $this->request->body_ar,
        ]);
        return redirect()->route('admin.contents')->withMessage('content updated successfully!');
    }
}
