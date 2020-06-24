<?php

namespace App\Services\site;

use Illuminate\Http\Request;
use App\CompareProducts;
use App\Notifications\SendNotification;

class ProductCompareService
{
    private $compare_model;
    private $request;

    public function __construct(CompareProducts $compare_model, Request $request)
    {
        $this->compare_model = $compare_model;
        $this->request = $request;
    }

    public function checkIfProductExist($userId, $productId)
    {
        $count = $this->compare_model
            ->where(['product_id' => $productId, 'user_id' => $userId])
            ->count();

        return $count > 0 ? true : false;
    }

    public function addToCompare($userId, $productId)
    {
        $compare = $this->compare_model->create(['product_id' => $productId, 'user_id' => $userId]);
        $showroomUser = $compare->product->showroom->user;
        $compareUser = $compare->user;
        if ($showroomUser->id != $compareUser->id) {
            $product = $compare->product;
            $showroomUser->notify(new SendNotification([
                'type' => \App\Product::class,
                'typeId' => $product->id,
                'url' => route('user.product.get', $product->id),
                'text' => "$compareUser->first_name Add $product->name_en to compare List"
            ]));
        }
    }

    public function checkForCompare($userId)
    {
        $count = $this->compare_model
            ->where(['user_id' => $userId])
            ->count();

        return $count >= 4 ? false : true;
    }

    public function getUserCompares($userId)
    {
        return $this->compare_model->where('user_id', $userId)->latest()->get();
    }
}
