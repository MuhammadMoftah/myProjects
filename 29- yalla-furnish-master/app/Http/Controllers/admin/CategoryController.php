<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Services\admin\CategoryService;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{

    protected $category_service;

    public function __construct(CategoryService $category_service)
    {
        $this->middleware('permission:category-list', ['only' => ['getAllCategories', 'getSingleCategory']]);
        $this->middleware('permission:catgeory-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:category-edit', ['only' => ['getEdit', 'postEdit']]);
        $this->middleware('permission:category-delete', ['only' => ['delete']]);

        $this->category_service = $category_service;
    }

    public function getAllCategories()
    {
        $categories = $this->category_service->getCategories();

        if (request()->ajax()) {
            return view('admin.pages.categories.categories_data', compact('categories'))->render();
        }

        return view('admin.pages.categories.all', compact('categories'));
    }

    public function getSingleCategory($id)
    {
        $category = $this->category_service->getSingleCategory($id);

        return view('admin.pages.categories.view', compact('category'));
    }

    public function create()
    {
        return view('admin.pages.categories.create');
    }

    public function store(CategoryRequest $request)
    {
        // return $request->category_image;
        $this->category_service->storeCategory();
        return back()->withMessage('category created successfully');
    }

    public function getEdit($id)
    {
        $category = $this->category_service->getSingleCategory($id);

        return view('admin.pages.categories.edit', compact('category'));
    }

    public function postEdit($id, CategoryRequest $request)
    {
        $this->category_service->updateCategory($id);

        return redirect()->route('admin.categories.get')->withMessage('category Updated Successfully');
    }

    public function delete($id)
    {
        $this->category_service->deleteCategory($id);

        return back()->withMessage('category deleted successfully');
    }
}
