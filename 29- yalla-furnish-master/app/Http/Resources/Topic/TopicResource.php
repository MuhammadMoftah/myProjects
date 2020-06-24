<?php

namespace App\Http\Resources\Topic;

use App\Http\Resources\Category\CategoryMiniInfoResource;
use Illuminate\Http\Resources\Json\JsonResource;

class TopicResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $isFollowed = true;

        if ($this->user) {
            $isFollowed = auth('api')->check() && auth('api')->user()->id != $this->user_id ?
                $this->user->check_following($this->user_id, auth('api')->user()->id) : true;
        }

        return [
            'id' => $this->id,
            'user_name' => $this->user_name,
            'user_id' => $this->user_id,
            'user_image' => $this->user_image,
            'categories' => CategoryMiniInfoResource::collection($this->categories),
            'post_date' => $this->created_at->format('j F Y'),
            'body' => $this->body,
            'images' => $this->images->pluck("image"),
            'is_followed' => $isFollowed,
        ];
    }
}
