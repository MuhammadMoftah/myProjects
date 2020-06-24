<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\Error\ErrorResource;
use App\Http\Resources\Error\NotFoundErrorResource;
use App\Http\Resources\Idea\IdeaResource;
use App\Http\Resources\Showroom\ShowroomResource;
use App\Services\site\IdeaService;
use App\Services\site\UserService;

class IdeaController extends Controller
{
    protected $request;
    protected $ideaService;

    public function __construct(Request $request, IdeaService $ideaService)
    {
        $this->request = $request;
        $this->ideaService = $ideaService;
    }

    public function getIdeas()
    {
        try {
            $perPage = request('limit') ?: 10;
            $ideas = $this->ideaService->getIdeas($perPage);
            return response()->json([
                'ideas' => IdeaResource::collection($ideas),
                'more_data' => $ideas->hasMorePages(),
            ], 200);
        } catch (\Exception $e) {
            return response()->json(new ErrorResource($e->getMessage()), 500);
        }
    }

    public function getUserIdeas($id, UserService $userService)
    {
        try {
            $user = $userService->view_user_profile($id);
            $ideas = $this->ideaService->getUserIdeas($id);
            return response()->json([
                'ideas' => IdeaResource::collection($ideas),
                'more_data' => $ideas->hasMorePages(),
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(new NotFoundErrorResource(request()), 404);
        } catch (\Exception $e) {
            return response()->json(new ErrorResource($e->getMessage()), 500);
        }
    }
}
