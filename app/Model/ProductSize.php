<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    protected $table    = 'table_product_size';
    protected $fillable = [
        'product_id', 'size_id'
    ];

    public function products()
    {
        return $this->belongsTo('App\Model\Products', 'product_id');
    }

    public function productColors()
    {
        return $this->belongsToMany('App\Model\ProductColor', 'table_product_unit', 'product_size_id', 'color_id')->withPivot('quantity', 'price')->withTimestamps();
    }

    public function size()
    {
        return $this->belongsTo('App\Model\Size', 'size_id');
    }
}
