<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\Error\ErrorResource;
use App\Http\Resources\Error\NotAuthorizedErrorResource;
use App\Http\Resources\Error\NotFoundErrorResource;
use App\Http\Resources\Follow\ShowroomFollowerResource;
use App\Http\Resources\ProductCompare\CompareListResource;
use App\Http\Resources\ProductCompare\ProductCompareResource;
use App\Services\site\ProductCompareService;
use App\Services\site\ProductService;

class ProductCompareController extends Controller
{
    protected $request;
    protected $productCompareService;

    public function __construct(Request $request, ProductCompareService $productCompareService)
    {
        $this->request = $request;
        $this->productCompareService = $productCompareService;
    }

    public function compareProduct(ProductService $productService)
    {
        try {
            $product = $productService->getSingleProduct($this->request->product_id);
            if (!$this->productCompareService->checkForCompare(auth('api')->user()->id)) {
                return response()->json(new NotAuthorizedErrorResource(request()), 403);
            }
            if ($this->productCompareService->checkIfProductExist(auth('api')->user()->id, $this->request->product_id)) {
                return response()->json(new ProductCompareResource('The Product Already Added To Your Compare List'), 200);
            }
            $this->productCompareService->addToCompare(auth('api')->user()->id, $product->id);
            return response()->json(new ProductCompareResource('The Product Added Successfully To Your Compare List'), 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(new NotFoundErrorResource(request()), 404);
        } catch (\Exception $e) {
            return response()->json(new ErrorResource($e->getMessage()), 500);
        }
    }

    public function getCompareList()
    {
        try {
            $compares = $this->productCompareService->getUserCompares(auth('api')->user()->id);
            return response()->json(['products' => CompareListResource::collection($compares)], 200);
        } catch (\Exception $e) {
            return response()->json(new ErrorResource($e->getMessage()), 500);
        }
    }
}
