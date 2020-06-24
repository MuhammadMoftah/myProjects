<?php

namespace App\Http\Resources\ProductCompare;

use Illuminate\Http\Resources\Json\JsonResource;

class CompareListResource extends JsonResource
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
            'image' => $this->product->featured_image,
            'name' => $this->product->name_en,
            'material' => $this->product->material->name_en,
            'color' => $this->product->color->name_en,
            'category_id' => isset($this->product->categories[0]) ? (int) $this->product->categories[0]->id : '',
            'category_name' => isset($this->product->categories[0]) ? $this->product->categories[0]->name_en : '',
            'material_id' => (int) $this->product->material->id,
            'material_name' => $this->product->material->name_en,
            'upholstery_id' => (int) $this->product->upholstery->id,
            'upholstery_name' => $this->product->upholstery->name_en,
            'color_id' => (int) $this->product->color->id,
            'color_name' => $this->product->color->name_en,
            'style_id' => (int) $this->product->style->id,
            'style_name' => $this->product->style->name_en,
            'height' => (int) $this->product->height,
            'width' => (int) $this->product->width,
            'depth' => (int) $this->product->depth,
            'guarantee' => (int) $this->product->guarantee,
            'price' => $this->product->price,
        ];
    }
}
