<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Board\BoardSaveResource;
use App\Http\Resources\Branch\BranchResource;
use Illuminate\Http\Request;
use App\Http\Resources\Error\ErrorResource;
use App\Http\Resources\Error\NotFoundErrorResource;
use App\Http\Resources\Product\ProductResource;
use App\Http\Resources\Showroom\ShowroomInfoResource;
use App\Http\Resources\Showroom\ShowroomResource;
use App\Http\Resources\Showroom\SingleShowroomResource;
use App\Services\site\ProductService;
use App\Services\site\ShowroomService;

class ShowroomController extends Controller
{
    protected $request;
    protected $showroomService;

    public function __construct(Request $request, ShowroomService $showroomService)
    {
        $this->request = $request;
        $this->showroomService = $showroomService;
    }

    public function getShowrooms()
    {
        try {
            $perPage = request('limit') ?: 10;
            $showrooms = $this->showroomService->getShowrooms($perPage);
            return response()->json([
                'showrroms' => ShowroomResource::collection($showrooms),
                'more_data' => $showrooms->hasMorePages(),
            ], 200);
        } catch (\Exception $e) {
            return response()->json(new ErrorResource($e->getMessage()), 500);
        }
    }

    public function getSingleShowroom($id, ProductService $productService)
    {
        try {
            $showroom = $this->showroomService->getSingleShowroomBy(['id' => $id]);
            $boards = auth('api')->check() ? auth('api')->user()->boards : collect([]);
            $products = $productService->getShowroomProducts($showroom->id, request('limit') ?: 10);
            return response()->json([
                'showroom' => new SingleShowroomResource($showroom),
                'boards' => BoardSaveResource::collection($boards),
                'products' => ProductResource::collection($products),
                'more_data' => $products->hasMorePages()
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(new NotFoundErrorResource(request()), 404);
        } catch (\Exception $e) {
            return response()->json(new ErrorResource($e->getMessage()), 500);
        }
    }

    public function getShowroominfo($id)
    {
        try {
            $showroom = $this->showroomService->getSingleShowroomBy(['id' => $id]);
            return response()->json(new ShowroomInfoResource($showroom), 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(new NotFoundErrorResource(request()), 404);
        } catch (\Exception $e) {
            return response()->json(new ErrorResource($e->getMessage()), 500);
        }
    }
}
