<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Country\CountryResource;
use App\Http\Resources\Error\ErrorResource;
use App\Services\site\CountryService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class CountryConrtoller extends Controller
{
    protected $request;
    protected $counrtyService;

    public function __construct(Request $request, CountryService $counrtyService)
    {
        $this->request = $request;
        $this->counrtyService = $counrtyService;
    }

    public function getCountries()
    {
        try {
            $countries = $this->counrtyService->getAll();
            return response()->json([
                'countries' => CountryResource::collection($countries),
            ], 200);
        } catch (\Exception $e) {
            return response()->json(new ErrorResource($e->getMessage()), 500);
        }
    }
}
