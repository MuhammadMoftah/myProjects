<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Post;
use App\Company;

class PostController extends Controller
{
    protected $post_model;
    protected $request;

    public function __construct(Post $post_model, Request $request)
    {
        $this->request = $request;
        $this->post_model = $post_model;
    }

    public function getAll()
    {
        $posts = $this->post_model->paginate(10);
        return view('admin.pages.posts.all', compact('posts'));
    }

    public function getCreate(Company $company_model)
    {
        $companies = $company_model->get();
        return view('admin.pages.posts.create', compact('companies'));
    }

    public function postCreate()
    {
        $this->validate($this->request, $this->post_model->getCreateAndUpdateRules());
        // upload post image
        if ($this->request->hasFile('image')) {
            $this->validate($this->request, $this->post_model->validate_image());
            $imageName = $this->post_model->uploadPostImage($this->request->image);
        }

        $this->post_model->create([
            'body' => $this->request->body,
            'company_id' => $this->request->company_id,
            'image' => isset($imageName) ?$imageName : null,
        ]);

        return redirect()->route('admin.posts')->withMessage('post created successfully!');
    }

    public function delete($id)
    {
        $post = $this->post_model->findOrFail($id);

        if ($post->image) {
            $old_image = env('AWS_URL'). 'posts/' . $post->image;
            unlink($old_image);
        }

        return $post->delete() ?back()->withMessage('post has been deleted') : abort(500);
    }

    public function getView($id)
    {
        $post = $this->post_model->findOrFail($id);
        return view('admin.pages.posts.view', compact('post'));
    }

    public function getEdit($id, Company $company_model)
    {
        $post = $this->post_model->findOrFail($id);
        $companies = $company_model->get();
        return view('admin.pages.posts.edit', compact('post', 'companies'));
    }

    public function postEdit($id)
    {
        $post = $this->post_model->findOrFail($id);
        $this->validate($this->request, $this->post_model->getCreateAndUpdateRules());

        // upload post image
        if ($this->request->hasFile('image')) {
            $this->validate($this->request, $this->post_model->validate_image());
            $imageName = $post->uploadPostImage($this->request->image);
            $post->deletePostImage();
            $post->update([
                'image' => $imageName,
            ]);
        }

        $post->update([
            'body' => $this->request->body,
            'company_id' => $this->request->company_id,
        ]);

        return redirect()->route('admin.posts')->withMessage('post updated successfully!');
    }

    public function search()
    {
        $keyword = $this->request->search;
        $posts = $this->post_model->where('body', 'LIKE', '%' . $keyword . '%')
            ->paginate(10);
        return view('admin.pages.posts.search', compact('posts'));
    }
}
