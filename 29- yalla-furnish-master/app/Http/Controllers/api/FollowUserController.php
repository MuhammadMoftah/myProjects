<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\Error\ErrorResource;
use App\Http\Resources\Error\NotAuthorizedErrorResource;
use App\Http\Resources\Error\NotFoundErrorResource;
use App\Http\Resources\Follow\UserFollowResource;
use App\Services\site\FollowService;
use App\Services\site\UserService;

class FollowUserController extends Controller
{
    protected $request;
    protected $followService;

    public function __construct(Request $request, FollowService $followService)
    {
        $this->request = $request;
        $this->followService = $followService;
    }

    public function followUser(UserService $userService)
    {
        try {
            $user = $userService->getSingleUser($this->request->user_id);
            if (auth('api')->user()->id == $user->id) {
                return response()->json(new NotAuthorizedErrorResource(request()), 403);
            }
            $follow = $this->followService->followUser($user, auth('api')->user()->id);
            return response()->json(new UserFollowResource($follow), 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(new NotFoundErrorResource(request()), 404);
        } catch (\Exception $e) {
            return $e;
            return response()->json(new ErrorResource($e->getMessage()), 500);
        }
    }
}
