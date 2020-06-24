<?php

namespace App\Http\Resources\Offer;

use Illuminate\Http\Resources\Json\JsonResource;

class OfferResource extends JsonResource
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
            'id' => $this->product->id,
            'name' => $this->product->name_en,
            'discount' => $this->discount,
            'image' => $this->product->featured_image,
            'valid_unit' => $this->expire_date->format('j F Y'),
            'saved' => ($this->product->price * $this->discount) / 100,
            'old_price' => $this->product->price,
            'price' => $this->offer_price,
        ];
    }
}
