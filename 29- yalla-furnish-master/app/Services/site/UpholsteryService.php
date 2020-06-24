<?php

namespace App\Services\site;

use App\Upholstery;
use Illuminate\Http\Request;

class UpholsteryService
{
    private $upholstery_model;
    private $request;

    public function __construct(Upholstery $upholstery_model, Request $request)
    {
        $this->upholstery_model = $upholstery_model;
        $this->request = $request;
    }

    public function getAll()
    {
        return  cache()->remember("upholsteries.latest", env('LONG_TIME_CACHE'), function () {
            return $this->upholstery_model->latest()->get();
        });
    }
}
