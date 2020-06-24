<?php

namespace App\Services\site;

use Illuminate\Http\Request;
use App\Material;

class MaterialService
{
    private $material_model;
    private $request;

    public function __construct(Material $material_model, Request $request)
    {
        $this->material_model = $material_model;
        $this->request = $request;
    }

    public function getAll()
    {
        return  cache()->remember("materials.latest", env('LONG_TIME_CACHE'), function () {
            return $this->material_model->latest()->get();
        });
    }
}
