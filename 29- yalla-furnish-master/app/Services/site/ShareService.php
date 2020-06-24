<?php

namespace App\Services\site;

use App\Notifications\SendNotification;
use App\Share;
use Illuminate\Http\Request;

class ShareService
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function storeShare($item_id, $type)
    {
        $share_model = new Share;
        $share = $share_model->create([
            'item_id' => $item_id,
            'user_id' => auth()->guard('user')->user()->id,
            'type' => $type,
        ]);

        $shareUser = $share->user;
        if ($type == "product" && $shareUser->id != $share->product->showroom->user->id) {
            $showroomUser = $share->product->showroom->user;
            $shareProduct = $share->product;

            $showroomUser->notify(new SendNotification([
                'type' => \App\Product::class,
                'typeId' => $product->id,
                'url' => route('user.product.get', $product->id),
                'text' => "$shareUser->first_name Share $product->name_en"
            ]));
        }
    }
}
