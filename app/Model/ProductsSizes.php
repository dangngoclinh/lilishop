<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductsSizes extends Model
{
    protected $table    = 'products_sizes';
    protected $fillable = [
        'product_id', 'size_id'
    ];

    public $timestamps = false;

    public function products()
    {
        return $this->belongsTo('App\Model\Products', 'product_id');
    }

    public function productsColors()
    {
        return $this->belongsToMany('App\Model\ProductsColors', 'products_unit', 'product_size_id', 'product_color_id')->withPivot('quantity', 'price')->withTimestamps();
    }

    public function size()
    {
        return $this->belongsTo('App\Model\Sizes', 'size_id');
    }
}
