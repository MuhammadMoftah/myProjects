<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_name' => $this->fullname,
            'followings' => $this->followings->count(),
            'followers' => $this->followers->count(),
            'user_image' => $this->image,
            'content_creator' => (bool) $this->content_creator
        ];
    }
}
