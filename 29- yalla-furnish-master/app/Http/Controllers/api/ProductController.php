<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Board\BoardSaveResource;
use App\Http\Resources\Product\ProductResource;
use App\Services\site\CategoryService;
use App\Services\site\ProductService;
use App\Services\site\StyleService;
use Illuminate\Http\Request;
use App\Http\Resources\Error\ErrorResource;
use App\Http\Resources\Error\NotFoundErrorResource;
use App\Http\Resources\Product\SingleProductResource;
use App\Services\site\ShowroomService;

class ProductController extends Controller
{
    protected $request;
    protected $productService;

    public function __construct(Request $request, ProductService $productService)
    {
        $this->request = $request;
        $this->productService = $productService;
    }

    public function getHomeProducts()
    {
        try {
            $perPage = request('limit') ?: 10;
            $productsData = $this->productService->getHomeProducts($perPage);
            $boards = auth('api')->check() ? auth('api')->user()->boards : collect([]);

            return response()->json([
                'products' => ProductResource::collection(collect($productsData['products'])),
                'more_data' => $productsData['load_more'],
                'boards' => BoardSaveResource::collection($boards),
            ], 200);
        } catch (\Exception $e) {
            return response()->json(new ErrorResource($e->getMessage()), 500);
        }
    }

    public function getSingleProduct($id)
    {
        try {
            $product = $this->productService->getSingleProduct($id);
            $boards = auth('api')->check() ? auth('api')->user()->boards : collect([]);

            return response()->json([
                'product' => new SingleProductResource($product),
                'boards' => BoardSaveResource::collection($boards)
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(new NotFoundErrorResource(request()), 404);
        } catch (\Exception $e) {
            return response()->json(new ErrorResource($e->getMessage()), 500);
        }
    }

    public function getProducts()
    {
        try {
            $perPage = request('limit') ?: 10;
            $products = $this->productService->getProducts($perPage);
            $boards = auth('api')->check() ? auth('api')->user()->boards : collect([]);
            return response()->json([
                'products' => ProductResource::collection($products),
                'more_data' => $products->hasMorePages(),
                'boards' => BoardSaveResource::collection($boards),
            ], 200);
        } catch (\Exception $e) {
            return response()->json(new ErrorResource($e->getMessage()), 500);
        }
    }

    public function getShowroomproducts($id, ShowroomService $showroomService)
    {
        try {
            $showroom = $showroomService->getSingleShowroomBy(['id' => $id]);
            $products = $this->productService->getShowroomProducts($showroom->id, request('limit') ?: 10);
            return response()->json([
                'products' => ProductResource::collection($products),
                'more_data' => $products->hasMorePages()
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(new NotFoundErrorResource(request()), 404);
        } catch (\Exception $e) {
            return response()->json(new ErrorResource($e->getMessage()), 500);
        }
    }
}
