<?php

namespace app\Observers;

use App\Model\Products;
use App\Model\ProductsSizes;

class ProductsSizesObservers
{
    public function created(ProductsSizes $productsSizes)
    {
        $product = Products::find($productsSizes->product_id);
        $product->updateUnits();
    }

    public function deleted(ProductsSizes $productsSizes)
    {
        $product = Products::find($productsSizes->product_id);
        $product->updateUnits();
    }
}