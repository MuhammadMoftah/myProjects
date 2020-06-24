<?php

namespace App\Http\Middleware\Api;

use App\Http\Resources\Error\NotAuthorizedErrorResource;
use Closure;
use JWTAuth;

class UserAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
            if (!auth('api')->check()) {
                return response()->json(new NotAuthorizedErrorResource($request), 401);
            }
            return $next($request);
        } catch (\Exception $e) {
            return response()->json(new NotAuthorizedErrorResource($request), 401);
        }
    }
}
