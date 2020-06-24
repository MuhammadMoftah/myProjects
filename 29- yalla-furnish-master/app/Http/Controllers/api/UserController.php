<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Board\BoardResource;
use App\Http\Resources\Board\BoardSaveResource;
use App\Http\Resources\Error\ErrorResource;
use App\Http\Resources\Error\NotFoundErrorResource;
use App\Http\Resources\User\UserResource;
use App\Services\site\BoardService;
use App\Services\site\UserService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $request;
    protected $userService;

    public function __construct(Request $request, UserService $userService)
    {
        $this->request = $request;
        $this->userService = $userService;
    }

    public function getUserProfile($id, BoardService $boardService)
    {
        try {
            $user = $this->userService->view_user_profile($id);
            $boards = $boardService->getAllPublicBoards($user->id);
            return response()->json([
                'user' => new UserResource($user),
                'boards' => BoardResource::collection($boards)
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(new NotFoundErrorResource(request()), 404);
        } catch (\Exception $e) {
            return response()->json(new ErrorResource($e->getMessage()), 500);
        }
    }
}
