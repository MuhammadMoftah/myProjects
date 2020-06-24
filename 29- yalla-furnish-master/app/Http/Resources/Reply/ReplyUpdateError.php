<?php

namespace App\Http\Resources\Reply;

use Illuminate\Http\Resources\Json\JsonResource;

class ReplyUpdateError extends JsonResource
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
            'message' => "Reply couldn't be update", 
            'status'  => 'error' ,
            'code'    => 404 
        ];
    }
}
