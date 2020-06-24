<?php

namespace App\Services\site;

use App\Notifications\SendNotification;
use App\SavedItem;
use Illuminate\Http\Request;

class SavedItemService
{
    protected $request;
    protected $saved_item_model;

    public function __construct(Request $request, SavedItem $saved_item_model)
    {
        $this->saved_item_model = $saved_item_model;
        $this->request = $request;
    }

    public function save_product($board_id, $product_id)
    {
        $count = $this->saved_item_model->where(['board_id' => $board_id, 'product_id' => $product_id])->count();
        if ($count > 0) {
            return false;
        } else {
            $saved_item = $this->saved_item_model->create([
                'board_id' => $board_id,
                'product_id' => $product_id,
            ]);
            $showroomUser = $saved_item->product->showroom->user;
            $boardUser = $saved_item->board->user;
            $product = $saved_item->product;

            if ($showroomUser->id != $boardUser->id) {
                $showroomUser->notify(new SendNotification([
                    'type' => \App\Product::class,
                    'typeId' => $product_id,
                    'url' => route('user.product.get', $product_id),
                    'text' => "$boardUser->first_name Added $product->name_en To his/her Board"
                ]));
            }
            return true;
        }
    }

    public function save_idea($board_id, $idea_id)
    {
        $count = $this->saved_item_model->where(['board_id' => $board_id, 'idea_id' => $idea_id])->count();
        if ($count > 0) {
            return false;
        } else {
            $this->saved_item_model->create([
                'board_id' => $board_id,
                'idea_id' => $idea_id,
            ]);
            return true;
        }
    }

    public function save_topic($board_id, $topic_id)
    {
        $count = $this->saved_item_model->where(['board_id' => $board_id, 'topic_id' => $topic_id])->count();
        if ($count) {
            return false;
        } else {
            $this->saved_item_model->create([
                'board_id' => $board_id,
                'topic_id' => $topic_id,
            ]);
            return true;
        }
    }

    public function save_offer($board_id, $topic_id)
    {
        $count = $this->saved_item_model->where(['board_id' => $board_id, 'offer_id' => $topic_id])->count();
        if ($count) {
            return false;
        } else {
            $this->saved_item_model->create([
                'board_id' => $board_id,
                'offer_id' => $topic_id,
            ]);
            return true;
        }
    }

    public function getSingleItem($id)
    {
        return $this->saved_item_model->findOrFail($id);
    }

    public function delete($id)
    {
        $item = $this->getSingleItem($id);
        $item->delete();
    }
}
