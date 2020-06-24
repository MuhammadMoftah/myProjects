<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Resources\User\UserLoginFail;
use App\Http\Resources\User\UserLoginSuccess;
use App\Services\site\UserService;
use Illuminate\Http\Request;
use App\Http\Resources\Error\ErrorResource;

class UserAuthConrtoller extends Controller
{
    protected $request;
    protected $userService;

    public function __construct(Request $request, UserService $userService)
    {
        $this->request = $request;
        $this->userService = $userService;
    }

    public function login(UserLoginRequest $request)
    {
        try {
            $token = $this->userService->loginUserApi();

            if (!$token) {
                return response()->json(new UserLoginFail($request), 401);
            }
            return response()->json(new UserLoginSuccess($token), 200);
        } catch (\Exception $e) {
            return response()->json(new ErrorResource($e->getMessage()), 500);
        }
    }

    public function register(UserRegisterRequest $request)
    {
        try {
            $user = $this->userService->registerUser();
            $token = auth('api')->login($user);
            return response()->json(new UserLoginSuccess($token), 200);
        } catch (\Exception $e) {
            return response()->json(new ErrorResource($e->getMessage()), 500);
        }
    }
}
