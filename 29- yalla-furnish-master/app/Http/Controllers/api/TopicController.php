<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Board\BoardResource;
use Illuminate\Http\Request;
use App\Http\Resources\Error\ErrorResource;
use App\Http\Resources\Error\NotFoundErrorResource;
use App\Http\Resources\Topic\TopicResource;
use App\Services\site\TopicService;
use App\Services\site\UserService;

class TopicController extends Controller
{
    protected $request;
    protected $topicService;

    public function __construct(Request $request, topicService $topicService)
    {
        $this->request = $request;
        $this->topicService = $topicService;
    }

    public function getTopics()
    {
        try {
            $perPage = request('limit') ?: 10;
            auth('api')->check() ?
                ($boards = auth('api')->user()->boards) && ($user = auth('api')->user())
                : ($boards = collect([])) && ($user = null);

            $topics = $this->topicService->getAllTopics($perPage, $user);
            return response()->json([
                'topics' => TopicResource::collection($topics),
                'boards' => BoardResource::collection($boards),
                'more_data' => $topics->hasMorePages(),
            ], 200);
        } catch (\Exception $e) {
            return response()->json(new ErrorResource($e->getMessage()), 500);
        }
    }

    public function getUserTopics($id, UserService $userService)
    {
        try {
            $user = $userService->view_user_profile($id);
            $topics = $this->topicService->getUserTopics($id);
            $boards = auth('api')->check() ? auth('api')->user()->boards : collect([]);

            return response()->json([
                'topics' => TopicResource::collection($topics),
                'boards' => BoardResource::collection($boards),
                'more_data' => $topics->hasMorePages(),
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(new NotFoundErrorResource(request()), 404);
        } catch (\Exception $e) {
            return response()->json(new ErrorResource($e->getMessage()), 500);
        }
    }
}
