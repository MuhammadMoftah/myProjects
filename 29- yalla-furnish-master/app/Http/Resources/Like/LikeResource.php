<?php

namespace App\Http\Resources\Like;

use Illuminate\Http\Resources\Json\JsonResource;

class LikeResource extends JsonResource
{
    protected $like;

    public function __construct($like)
    {
        $this->like = $like;
    }
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        if ($this->like[0]) {
            return [
                'message' => 'You Liked Item Successfully',
                'likes_count' => $this->like[1]
            ];
        }

        return [
            'message' => 'You UnLiked Item Successfully',
            'likes_count' => $this->like[1]
        ];
    }
}
