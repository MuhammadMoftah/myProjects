<?php

namespace App\Http\Resources\Branch;

use Illuminate\Http\Resources\Json\JsonResource;

class BranchResource extends JsonResource
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
            'title' => (string) $this->title,
            'lat' => (float) $this->lat,
            'long' => (float) $this->lang,
            'mob1' => $this->mob1,
            'mob2' => $this->mob2,
            'schedules' => $this->info->map(function ($info) {
                return [
                    'day' => $info['day'],
                    'from' => $info['from'],
                    'to' => $info['to'],
                ];
            }),
        ];
    }
}
