<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Error\ErrorResource;
use App\Services\site\CategoryService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class CategoryConrtoller extends Controller
{
    protected $request;
    protected $categoryService;

    public function __construct(Request $request, CategoryService $categoryService)
    {
        $this->request = $request;
        $this->categoryService = $categoryService;
    }

    public function getCategories()
    {
        try {
            $categories = $this->categoryService->getAll();
            return response()->json([
                'categories' => CategoryResource::collection($categories),
            ], 200);
        } catch (\Exception $e) {
            return response()->json(new ErrorResource($e->getMessage()), 500);
        }
    }
}
