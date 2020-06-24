<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Activity\ActivityResource;
use App\Http\Resources\Error\ErrorResource;
use App\Http\Resources\Error\NotFoundErrorResource;
use App\Services\site\ActivityService;
use App\Services\site\UserService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    protected $request;
    protected $activityService;

    public function __construct(Request $request, ActivityService $activityService)
    {
        $this->request = $request;
        $this->activityService = $activityService;
    }

    public function getUserActivities($id, UserService $userService)
    {
        try {
            $user = $userService->view_user_profile($id);
            $activities = !$user->hidden ? $this->activityService->getUserActivities($id) : collect([]);
            return response()->json([
                'activities' => ActivityResource::collection($activities),
                'more_data' => $activities->hasMorePages(),
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(new NotFoundErrorResource(request()), 404);
        } catch (\Exception $e) {
            return response()->json(new ErrorResource($e->getMessage()), 500);
        }
    }
}
