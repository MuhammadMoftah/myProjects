<?php

namespace App\Services\site;

use App\Category;
use Illuminate\Http\Request;

class CategoryService
{
    private $category_model;
    private $request;

    public function __construct(Category $category_model, Request $request)
    {
        $this->category_model = $category_model;
        $this->request = $request;
    }

    public function getAll()
    {
        return  cache()->remember("categories.oldest", env('LONG_TIME_CACHE'), function () {
            return $this->category_model->get();
        });
    }
}
