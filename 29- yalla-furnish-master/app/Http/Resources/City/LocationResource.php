<?php

namespace App\Http\Resources\City;

use App\Http\Resources\District\DistrictResource;
use Illuminate\Http\Resources\Json\JsonResource;

class LocationResource extends JsonResource
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
            'districts' => DistrictResource::collection($this->districtes),
        ];
    }
}
