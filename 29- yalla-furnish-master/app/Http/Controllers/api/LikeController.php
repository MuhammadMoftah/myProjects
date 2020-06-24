<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Error\ErrorResource;
use App\Http\Resources\Error\NotFoundErrorResource;
use App\Http\Resources\Like\LikeResource;
use App\Services\site\IdeaService;
use App\Services\site\LikeService;
use App\Services\site\ProductService;
use App\Services\site\TopicService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    protected $request;
    protected $likeService;

    public function __construct(Request $request, LikeService $likeService)
    {
        $this->request = $request;
        $this->likeService = $likeService;
    }

    public function likeProduct(ProductService $productService)
    {
        try {
            $product = $productService->getSingleProduct($this->request->id);
            $like = $this->likeService->likeItem($product->id, 'product', auth('api')->user()->id);
            return response()->json(new LikeResource($like), 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(new NotFoundErrorResource(request()), 404);
        } catch (\Exception $e) {
            return response()->json(new ErrorResource($e->getMessage()), 500);
        }
    }

    public function likeIdea(IdeaService $ideaService)
    {
        try {
            $idea = $ideaService->getSingleIdea($this->request->id);
            $like = $this->likeService->likeItem($idea->id, 'idea', auth('api')->user()->id);
            return response()->json(new LikeResource($like), 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(new NotFoundErrorResource(request()), 404);
        } catch (\Exception $e) {
            return response()->json(new ErrorResource($e->getMessage()), 500);
        }
    }

    public function likeTopic(TopicService $topicService)
    {
        try {
            $topic = $topicService->getSingleTopic($this->request->id);
            $like = $this->likeService->likeItem($topic->id, 'topic', auth('api')->user()->id);
            return response()->json(new LikeResource($like), 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(new NotFoundErrorResource(request()), 404);
        } catch (\Exception $e) {
            return response()->json(new ErrorResource($e->getMessage()), 500);
        }
    }
}
