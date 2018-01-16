<?php

namespace App\Listeners;

use App\Events\ProductsAttributeAdd;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProductsUpdateUnits
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
     * @param  ProductsAttributeAdd $event
     * @return void
     */
    public function handle(ProductsAttributeAdd $event)
    {
        $event->product->updateUnits();
    }
}
