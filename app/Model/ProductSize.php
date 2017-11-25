<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ProductSize extends Pivot
{
    protected $table    = 'table_product_size';
    protected $fillable = [
        'product_id', 'size_id'
    ];

    public function products() {
        return $this->belongsTo('App\Model\Product', 'product_id');
    }
}
