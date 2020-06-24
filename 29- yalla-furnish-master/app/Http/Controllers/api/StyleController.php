<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Error\ErrorResource;
use App\Http\Resources\Style\StyleResource;
use App\Services\site\StyleService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class StyleController extends Controller
{
    protected $request;
    protected $styleService;

    public function __construct(Request $request, StyleService $styleService)
    {
        $this->request = $request;
        $this->styleService = $styleService;
    }

    public function getStyles()
    {
        try {
            $styles = $this->styleService->getAll();
            return response()->json([
                'styles' => StyleResource::collection($styles),
            ], 200);
        } catch (\Exception $e) {
            return response()->json(new ErrorResource($e->getMessage()), 500);
        }
    }
}
