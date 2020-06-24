<?php

namespace App\Services\admin;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CategoryService
{
    private $category_model;
    private $request;

    public function __construct(Category $category_model, Request $request)
    {
        $this->category_model = $category_model;
        $this->request = $request;
    }

    public function getCategories()
    {
        $categories = $this->category_model->newQuery();

        if (isset($this->request->search)) {
            $keyword = $this->request->search;
            $categories->where(function ($query) use ($keyword) {
                $query->where('name_ar', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('name_en', 'LIKE', '%' . $keyword . '%');
            })->orWhere('slug', 'LIKE', '%' . $keyword . '%');
        }

        $categories = $categories->latest()->paginate(10);

        return $categories;
    }

    public function getSingleCategory($id)
    {
        return $this->category_model->findOrFail($id);
    }

    public function storeCategory()
    {
        $this->category_model->create([
            'name_en' => $this->request->name_en,
            'name_ar' => $this->request->name_ar,
            'slug' => $this->request->slug,
            'category_image' => $this->request->category_image,
        ]);
    }

    public function updateCategory($id)
    {
        $category = $this->getSingleCategory($id);
        $category->name_en = $this->request->name_en;
        $category->name_ar = $this->request->name_ar;
        $category->slug = $this->request->slug;
        if (request('category_image')) {
            $image_name = time() . uniqid() . '.' . request('category_image')->getClientOriginalExtension();
            if (!Storage::disk('public')->put($image_name, File::get(request('category_image')))) {
                throw new \Exception('error in uploading image');
            }
            $category->category_image = $image_name;
        }
        $category->update();
    }

    public function deleteCategory($id)
    {
        $category = $this->getSingleCategory($id);
        $category->delete();
    }
}
