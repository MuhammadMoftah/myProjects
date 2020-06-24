<?php

namespace App\Http\Resources\Showroom;

use App\Http\Resources\Branch\BranchResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowroomInfoResource extends JsonResource
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
            'branches' => BranchResource::collection($this->branches),
            'about' => $this->about,
            'website' => $this->website,
            'twitter' => $this->tw,
            'facebook' => $this->fb,
            'youtube' => $this->yt,
            'instgram' => $this->instgram
        ];
    }
}
