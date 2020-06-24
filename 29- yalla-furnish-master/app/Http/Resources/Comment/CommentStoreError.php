<?php

namespace App\Http\Resources\Comment;

use Illuminate\Http\Resources\Json\JsonResource;
// comment polymorphic store Error response 
class CommentStoreError extends JsonResource
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
            'status' => 404, 
            'message' => 'Comment Store Error'
        ];
    }
}
