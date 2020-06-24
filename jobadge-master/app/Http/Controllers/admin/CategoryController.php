<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $category_model;
    protected $request;

    public function __construct(Category $category_model, Request $request)
    {
        $this->request = $request;
        $this->category_model = $category_model;
    }

    public function getAll()
    {
        $categories = $this->category_model->latest()->paginate(10);
        return view('admin.pages.categories.all', compact('categories'));
    }

    public function getCreate()
    {
        return view('admin.pages.categories.create');
    }

    public function postCreate()
    {
        $this->validate($this->request, $this->category_model->getCreateAndUpdateRules());

        $this->category_model->create([
            'name_en' => $this->request->name_en,
            'name_ar' => $this->request->name_ar,
            'slug' => str_slug(str_replace('/', ' ', $this->request->name_en))
        ]);

        return redirect()->route('admin.categories')->withMessage('category created successfully!');
    }

    public function delete($id)
    {
        $category = $this->category_model->findOrFail($id);
        return $category->delete() ? back()->withMessage('category has been deleted') : abort(500);
    }

    public function getView($id)
    {
        $category = $this->category_model->findOrFail($id);
        return view('admin.pages.categories.view', compact('category'));
    }

    public function getEdit($id)
    {
        $category = $this->category_model->findOrFail($id);
        return view('admin.pages.categories.edit', compact('category'));
    }

    public function postEdit($id)
    {
        $category = $this->category_model->findOrFail($id);
        $this->validate($this->request, $this->category_model->getCreateAndUpdateRules());

        $category->update([
            'name_en' => $this->request->name_en,
            'name_ar' => $this->request->name_ar,
            'slug' => str_replace('/', '', $this->request->slug)
        ]);

        return redirect()->route('admin.categories')->withMessage('category updated successfully!');
    }

    public function search()
    {
        $keyword = $this->request->search;
        $categories = $this->category_model->where('name_en', 'LIKE', "%" . $keyword . "%")
            ->orWhere('name_ar', 'LIKE', '%' . $keyword . '%')->latest()->paginate(10);
        return view('admin.pages.categories.search', compact('categories'));
    }
}
