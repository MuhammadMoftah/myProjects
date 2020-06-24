<?php

namespace App\Http\Resources\ShowroomReview;

use Illuminate\Http\Resources\Json\JsonResource;

class ShowroomReviewResource extends JsonResource
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
            'rate' => $this->rate,
            'user_name' => $this->user->fullname,
            'review' => $this->review,
            'review_date' => $this->created_at->format('j F Y')
        ];
    }
}
