<?php

namespace App\Http\Resources\Offer;

use App\Http\Resources\Branch\BranchResource;
use Illuminate\Http\Resources\Json\JsonResource;

class SingleOfferResource extends JsonResource
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
            'id' => (int) $this->id,
            'name' => $this->name_en,
            'showroom_id' => isset($this->showroom) ? (int) $this->showroom->id : '',
            'showroom_name' => isset($this->showroom) ? $this->showroom->name_en : '',
            'category_id' => isset($this->categories[0]) ? (int) $this->categories[0]->id : '',
            'category_name' => isset($this->categories[0]) ? $this->categories[0]->name_en : '',
            'material_id' => (int) $this->material->id,
            'material_name' => $this->material->name_en,
            'upholstery_id' => (int) $this->upholstery->id,
            'upholstery_name' => $this->upholstery->name_en,
            'color_id' => (int) $this->color->id,
            'color_name' => $this->color->name_en,
            'style_id' => (int) $this->style->id,
            'style_name' => $this->style->name_en,
            'height' => (int) $this->height,
            'width' => (int) $this->width,
            'depth' => (int) $this->depth,
            'guarantee' => (int) $this->guarantee,
            'description' => $this->description_en,
            'likes' => (int) $this->likes->count(),
            'comments' => (int) $this->comments->count(),
            'saves' => (int) $this->saves->count(),
            'image' => $this->images->pluck('image'),
            'branches' => BranchResource::collection($this->branches),
            'followers' => $this->showroom->showroom_followers->count(),
            'hidden_price' => (bool) $this->hidden_price,
            'showroom_rate' => $this->showroom->showroom_rate,
            'discount' => $this->offer->discount,
            'valid_unit' => $this->offer->expire_date,
            'saved' => ($this->price * $this->offer->discount) / 100,
            'old_price' => $this->price,
            'price' => $this->offer->offer_price,
        ];
    }
}
