<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Error\ErrorResource;
use App\Http\Resources\Error\NotFoundErrorResource;
use App\Http\Resources\Offer\OfferResource;
use App\Http\Resources\Offer\SingleOfferResource;
use App\Services\site\OfferService;
use App\Services\site\ProductService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Http\Resources\Board\BoardSaveResource;
use App\Services\site\ShowroomService;

class OfferController extends Controller
{
    protected $request;
    protected $offerService;

    public function __construct(Request $request, OfferService $offerService)
    {
        $this->request = $request;
        $this->offerService = $offerService;
    }

    public function getOffers()
    {
        try {
            $perPage = request('limit') ?: 10;
            $offers = $this->offerService->getOffers($perPage, request('sort_by'));
            $loadMore = $offers->hasMorePages();
            return response()->json(['offers' => OfferResource::collection($offers), 'loadMore' => $loadMore], 200);
        } catch (\Exception $e) {
            return response()->json(new ErrorResource($e->getMessage()), 500);
        }
    }

    public function getSingleOffer($id, ProductService $productService)
    {
        try {
            $offer = $productService->getSingleProduct($id);
            $boards = auth('api')->check() ? auth('api')->user()->boards : collect([]);
            return response()->json([
                'offer' => new SingleOfferResource($offer),
                'boards' => BoardSaveResource::collection($boards)
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(new NotFoundErrorResource(request()), 404);
        } catch (\Exception $e) {
            return response()->json(new ErrorResource($e->getMessage()), 500);
        }
    }

    public function getShowroomOffers($id, ShowroomService $showroomService)
    {
        try {
            $showroom = $showroomService->getSingleShowroomBy(['id' => $id]);
            $offers = $this->offerService->getOffersByShowroom($id);
            return response()->json([
                'offers' => OfferResource::collection($offers),
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(new NotFoundErrorResource(request()), 404);
        } catch (\Exception $e) {
            return response()->json(new ErrorResource($e->getMessage()), 500);
        }
    }
}
