<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'date_post' => (string) $this->created_at->format('j F Y'),
            'showroom_id' => isset($this->showroom) ? (int) $this->showroom->id : '',
            'showroom_name' => isset($this->showroom) ? $this->showroom->name_en : '',
            'category_id' => isset($this->categories[0]) ? (int) $this->categories[0]->id : '',
            'category_name' => isset($this->categories[0]) ? $this->categories[0]->name_en : '',
            'price' => $this->price,
            'likes' => (int) $this->likes->count(),
            'comments' => (int) $this->comments->count(),
            'saves' => (int) $this->saves->count(),
            'image' => $this->featured_image,
            'rate' => $this->rate,
            'hidden_price' => (bool) $this->hidden_price
        ];
    }
}
