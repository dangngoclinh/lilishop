<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductsColors extends Model
{
    protected $table    = 'products_colors';
    protected $fillable = [
        'product_id', 'image_id', 'name'
    ];

    public function image()
    {
        return $this->belongsTo('App\Model\Image', 'image_id');
    }
}
