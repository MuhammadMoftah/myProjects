<?php

namespace App\Http\Resources\Error;

use Illuminate\Http\Resources\Json\JsonResource;

class ValidationErrorResource extends JsonResource
{
    protected $errors;

    public function __construct($errors)
    {
        $this->errors = $errors;
    }
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $transformed = [];
        foreach ($this->errors->all() as $message) {
            $transformed[] = $message;
        }

        return [
            'errors' => $transformed,
        ];
    }
}
