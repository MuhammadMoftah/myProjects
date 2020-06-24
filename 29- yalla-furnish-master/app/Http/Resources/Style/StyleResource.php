<?php

namespace App\Http\Resources\Style;

use Illuminate\Http\Resources\Json\JsonResource;

class StyleResource extends JsonResource
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
            'name' => $this->name_en
        ];
    }
}
