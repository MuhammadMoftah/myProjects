<?php

namespace App\Http\Resources\Showroom;

use Illuminate\Http\Resources\Json\JsonResource;

class SingleShowroomResource extends JsonResource
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
            'name' => $this->name_en,
            'rate' => $this->showroom_rate,
            'is_owner' => auth('api')->check() ?
                auth('api')->user()->id == $this->user_id ? true : false
                : false,
            'is_followed' => auth('api')->check() ? $this->check_following($this->id, auth('api')->user()->id) : false,
            'image' => $this->showroom_image,
            'cover' => $this->showroom_coverImage
        ];
    }
}
