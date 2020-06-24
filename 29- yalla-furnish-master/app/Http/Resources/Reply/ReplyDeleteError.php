<?php

namespace App\Http\Resources\Reply;

use Illuminate\Http\Resources\Json\JsonResource;

class ReplyDeleteError extends JsonResource
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
            'message' => "Reply couldn't be delete", 
            'status'  => 'error' ,
            'code'    => 404 
        ];
    }
}
