<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\City\CityResource;
use App\Http\Resources\City\LocationResource;
use App\Http\Resources\Error\ErrorResource;
use App\Services\site\CityService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class CityController extends Controller
{
    protected $request;
    protected $cityService;

    public function __construct(Request $request, CityService $cityService)
    {
        $this->request = $request;
        $this->cityService = $cityService;
    }

    public function getCities()
    {
        try {
            $cities = $this->cityService->getCities(request('country_id'));
            return response()->json([
                'cities' => CityResource::collection($cities),
            ], 200);
        } catch (\Exception $e) {
            return response()->json(new ErrorResource($e->getMessage()), 500);
        }
    }

    public function getLocations()
    {
        try {
            $cities = $this->cityService->getCities(request('country_id'));
            return response()->json([
                'locations' => LocationResource::collection($cities),
            ], 200);
        } catch (\Exception $e) {
            return response()->json(new ErrorResource($e->getMessage()), 500);
        }
    }
}
