<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Services\site\SavedItemService;
use Illuminate\Http\Request;

class SavedItemController extends Controller
{
    protected $request;
    protected $saved_item_service;

    public function __construct(Request $request, SavedItemService $saved_item_service)
    {
        $this->request = $request;
        $this->saved_item_service = $saved_item_service;
    }

    public function save_item(Request $request)
    {
        $type = $request->type;
        if ($type == 'product') {
            $flag = $this->saved_item_service->save_product($request->board_id, $request->product_id);
            if ($flag) {
                return "ok";
            } else {
                return "no";
            }
        } elseif ($type == 'idea') {
            $flag = $this->saved_item_service->save_idea($request->board_id, $request->idea_id);
            if ($flag) {
                return "ok";
            } else {
                return "no";
            }
        } elseif ($type == 'topic') {
            $flag = $this->saved_item_service->save_topic($request->board_id, $request->topic_id);
            if ($flag) {
                return "ok";
            } else {
                return "no";
            }
        } elseif ($type == 'offer') {
            $flag = $this->saved_item_service->save_offer($request->board_id, $request->offer_id);
            if ($flag) {
                return "ok";
            } else {
                return "no";
            }
        }
    }

    public function deleteItem($id)
    {
        $this->saved_item_service->delete($id);
        return redirect()->back();
    }
}
