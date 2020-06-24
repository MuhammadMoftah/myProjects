<?php

namespace App\Services\site;

use App\Style;
use Illuminate\Http\Request;

class StyleService
{
    private $style_model;
    private $request;

    public function __construct(Style $style_model, Request $request)
    {
        $this->style_model = $style_model;
        $this->request = $request;
    }

    public function getAll()
    {
        return cache()->remember("styles.latest", env('LONG_TIME_CACHE'), function () {
            return $this->style_model->latest()->get();
        });
    }
}
