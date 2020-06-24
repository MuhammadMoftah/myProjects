<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\storeReviewRequest;
use Illuminate\Http\Request;
use App\Http\Resources\Error\ErrorResource;
use App\Http\Resources\Error\NotAuthorizedErrorResource;
use App\Http\Resources\Error\NotFoundErrorResource;
use App\Http\Resources\Follow\ShowroomFollowerResource;
use App\Http\Resources\ShowroomReview\ShowroomReviewResource;
use App\Http\Resources\ShowroomReview\StoreReviewResource;
use App\Services\site\ShowroomReviewService;
use App\Services\site\ShowroomService;

class ShowroomReviewController extends Controller
{
    protected $request;
    protected $showroomReviewService;

    public function __construct(Request $request, ShowroomReviewService $showroomReviewService)
    {
        $this->request = $request;
        $this->showroomReviewService = $showroomReviewService;
    }

    public function getShowroomReviews($id)
    {
        try {
            $reviews = $this->showroomReviewService->getShowroomReviews($id, request('limit') ?: 5);
            return response()->json([
                'reviews' => ShowroomReviewResource::collection($reviews),
                'more_data' => $reviews->hasMorePages()
            ], 200);
        } catch (\Exception $e) {
            return response()->json(new ErrorResource($e->getMessage()), 500);
        }
    }

    public function storeReview(storeReviewRequest $request)
    {
        try {
            $review = $this->showroomReviewService->checkReview($request->showroom_id, auth('api')->user()->id);
            if ($review) {
                return response()->json(new StoreReviewResource('You Already Added Review'), 200);
            }
            $this->showroomReviewService->storeReview(auth('api')->user()->id);
            return response()->json(new StoreReviewResource('Your Review Added Successfully'), 200);
        } catch (\Exception $e) {
            return response()->json(new ErrorResource($e->getMessage()), 500);
        }
    }
}
