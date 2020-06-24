<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserLoginSuccess extends JsonResource
{
    protected $token;

    public function __construct($token)
    {
        $this->token = $token;
    }
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'token' => $this->token,
            'token_type'   => 'bearer',
            // 'expires_in'   => auth('api')->factory()->getTTL() * 60,
        ];
    }
}
