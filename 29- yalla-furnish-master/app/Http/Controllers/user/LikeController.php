<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Services\site\LikeService;
use Illuminate\Support\Facades\DB;

class LikeController extends Controller
{
    protected $like_service;

    public function __construct(LikeService $like_service)
    {
        $this->like_service = $like_service;
    }

    public function likeItem($id, $type)
    {
        try {
            DB::beginTransaction();
            $like = $this->like_service->likeItem($id, $type, auth('user')->user()->id);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }
        return response()->json(['like' => $like, 'type' => $type, 'item_id' => $id, 'code' => 200]);
    }
}
