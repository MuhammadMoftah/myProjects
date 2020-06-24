<?php

namespace App\Observers;

/**
 * Observes the Board model
 */
class ProductObserver
{

    public function deleted($product)
    {
        $product->saves()->delete();
        $product->shares()->delete();
        $product->likes()->delete();
        $product->updates()->delete();
        $product->comments()->delete();
    }
}
