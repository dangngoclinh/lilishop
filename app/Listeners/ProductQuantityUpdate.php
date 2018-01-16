<?php

namespace App\Listeners;

use App\Events\ProductsUnitUpdated;
use App\Model\Products;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProductQuantityUpdate
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ProductsUnitUpdated $event
     * @return void
     */
    public function handle(ProductsUnitUpdated $event)
    {
        $product = Products::find($event->unit->product_id);
        $product->updateQuantity();

    }
}
