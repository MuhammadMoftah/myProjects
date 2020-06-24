<?php

namespace App\Services\site;

use App\Color;
use Illuminate\Http\Request;

class ColorService
{
    private $color_model;
    private $request;

    public function __construct(Color $color_model, Request $request)
    {
        $this->color_model = $color_model;
        $this->request = $request;
    }

    public function getAll()
    {
        return  cache()->remember("colors.latest", env('LONG_TIME_CACHE'), function () {
            return $this->color_model->latest()->get();
        });
    }
}
