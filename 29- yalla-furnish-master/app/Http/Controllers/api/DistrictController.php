<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\District\DistrictResource;
use App\Http\Resources\Error\ErrorResource;
use App\Services\site\DistrictService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    protected $request;
    protected $districtService;

    public function __construct(Request $request, DistrictService $districtService)
    {
        $this->request = $request;
        $this->districtService = $districtService;
    }

    public function getDistricts()
    {
        try {
            $districts = $this->districtService->getDistricts(request('city_id'));
            return response()->json([
                'districts' => DistrictResource::collection($districts),
            ], 200);
        } catch (\Exception $e) {
            return response()->json(new ErrorResource($e->getMessage()), 500);
        }
    }
}
