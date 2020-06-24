<?php

namespace App\Http\Resources\Idea;

use Illuminate\Http\Resources\Json\JsonResource;

class IdeaResource extends JsonResource
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
            'image' => $this->idea_image,
            'likes' => $this->likes->count(),
            'saves' => $this->saves->count(),
            'comments' => $this->comments->count(),
            'description' => $this->mini_description
        ];
    }
}
