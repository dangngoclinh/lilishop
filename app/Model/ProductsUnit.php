<?php

namespace App\Model;

use App\Events\ProductsUnitUpdated;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ProductsUnit extends Pivot
{
    protected $table = "products_unit";

    protected $fillable = [
        'product_id', 'product_size_id', 'product_color_id', 'quantity', 'price', 'discount_price', 'discount_end'
    ];

    protected $dispatchesEvents = [
        'saved' => ProductsUnitUpdated::class
    ];

    public $timestamps = false;

    public function color()
    {
        return $this->belongsTo('App\Model\ProductsColors', 'product_color_id');
    }

    public function size()
    {
        return $this->belongsTo('App\Model\ProductsSizes', 'product_size_id');
    }
}
