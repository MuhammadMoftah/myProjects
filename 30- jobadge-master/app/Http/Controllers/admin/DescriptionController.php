<?php

namespace App\Http\Controllers\admin;

use App\JobDescription;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Category;

class DescriptionController extends Controller
{
    protected $description_model;
    protected $request;

    public function __construct(JobDescription $description_model, Request $request)
    {
        $this->request = $request;
        $this->description_model = $description_model;
    }

    public function getAll()
    {
        $descriptions = $this->description_model->latest()->paginate(10);
        return view('admin.pages.job_descriptions.all', compact('descriptions'));
    }

    public function getCreate(Category $category_model)
    {
        $categories = $category_model->get();
        return view('admin.pages.job_descriptions.create', compact('categories'));
    }

    public function postCreate()
    {
        $this->validate($this->request, $this->description_model->getCreateAndUpdateRules());

        $this->description_model->create([
            'description' => $this->request->description,
            'requirement' => $this->request->requirement,
            'title' => $this->request->title,
            'category_id' => $this->request->category_id
        ]);

        return redirect()->route('admin.descriptions')->withMessage('description created successfully!');
    }

    public function delete($id)
    {
        $description = $this->description_model->findOrFail($id);
        return $description->delete() ? back()->withMessage('description has been deleted') : abort(500);
    }

    public function getView($id)
    {
        $description = $this->description_model->findOrFail($id);
        return view('admin.pages.job_descriptions.view', compact('description'));
    }

    public function getEdit($id, Category $category_model)
    {
        $description = $this->description_model->findOrFail($id);
        $categories = $category_model->get();
        return view('admin.pages.job_descriptions.edit', compact('description', 'categories'));
    }

    public function postEdit($id)
    {
        $description = $this->description_model->findOrFail($id);
        $this->validate($this->request, $this->description_model->getCreateAndUpdateRules());

        $description->update([
            'description' => $this->request->description,
            'title' => $this->request->title,
            'requirement' => $this->request->requirement,
            'category_id' => $this->request->category_id
        ]);

        return redirect()->route('admin.descriptions')->withMessage('description updated successfully!');
    }

    public function search()
    {
        $keyword = $this->request->search;
        $descriptions = $this->description_model->where('description', 'LIKE', "%" . $keyword . "%")
            ->orWhere('title', 'LIKE', "%" . $keyword . "%")
            ->whereHas('category', function ($query) use ($keyword) {
                $query->where('name_en', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('name_ar', 'LIKE', '%' . $keyword . '%');
            })->latest()->paginate(10);

        return view('admin.pages.job_descriptions.search', compact('descriptions'));
    }
}
