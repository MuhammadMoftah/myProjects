<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\Error\ErrorResource;
use App\Http\Resources\Error\NotAuthorizedErrorResource;
use App\Http\Resources\Error\NotFoundErrorResource;
use App\Http\Resources\Follow\ShowroomFollowerResource;
use App\Services\site\ShowroomFollowerService;
use App\Services\site\ShowroomService;

class ShowroomFollowerController extends Controller
{
    protected $request;
    protected $showroomFollowerService;

    public function __construct(Request $request, ShowroomFollowerService $showroomFollowerService)
    {
        $this->request = $request;
        $this->showroomFollowerService = $showroomFollowerService;
    }

    public function followShowroom(ShowroomService $showroomService)
    {
        try {
            $showroom = $showroomService->getSingleShowroomBy(['id' => $this->request->showroom_id]);
            if ($showroom->user_id == auth('api')->user()->id) {
                return response()->json(new NotAuthorizedErrorResource(request()), 403);
            }
            $follow = $this->showroomFollowerService->followShowroom($showroom, auth('api')->user()->id);
            return response()->json(new ShowroomFollowerResource($follow), 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(new NotFoundErrorResource(request()), 404);
        } catch (\Exception $e) {
            return response()->json(new ErrorResource($e->getMessage()), 500);
        }
    }
}
