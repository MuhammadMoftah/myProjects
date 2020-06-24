<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Board\BoardResource;
use App\Http\Resources\Error\ErrorResource;
use App\Http\Resources\Error\NotFoundErrorResource;
use App\Services\site\BoardService;
use App\Services\site\UserService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    protected $request;
    protected $boardService;

    public function __construct(Request $request, BoardService $boardService)
    {
        $this->request = $request;
        $this->boardService = $boardService;
    }

    public function getUserBoards($id, UserService $userService)
    {
        try {
            $user = $userService->view_user_profile($id);
            $boards = $this->boardService->getAllPublicBoards($id);
            return response()->json([
                'boards' => BoardResource::collection($boards),
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(new NotFoundErrorResource(request()), 404);
        } catch (\Exception $e) {
            return response()->json(new ErrorResource($e->getMessage()), 500);
        }
    }
}
