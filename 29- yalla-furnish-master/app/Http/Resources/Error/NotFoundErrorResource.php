<?php

namespace App\Http\Resources\Error;

use Illuminate\Http\Resources\Json\JsonResource;

class NotFoundErrorResource extends JsonResource
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
            'message' => 'Not Found'
        ];
    }
}
