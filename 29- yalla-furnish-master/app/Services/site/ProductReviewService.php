<?php

namespace App\Services\site;

use Illuminate\Http\Request;
use App\ProductReview;

class ProductReviewService
{
    private $product_review_model;
    private $request;

    public function __construct(ProductReview $product_review_model, Request $request)
    {
        $this->product_review_model = $product_review_model;
        $this->request = $request;
    }

    public function rateProduct($id)
    {
        $this->product_review_model->create([
            'product_id' => $id,
            'user_id' => auth()->guard('user')->user()->id,
            'rate' => request('rate')
        ]);
    }

    public function checkReview($product_id)
    {
        return $this->product_review_model->where([
            'product_id' => $product_id,
            'user_id' => auth()->guard('user')->user()->id
        ])->first();
    }
}
