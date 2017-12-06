<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    protected $table      = 'table_product_color';
    protected $fillable   = [
        'product_id', 'image_id', 'name'
    ];
    public    $timestamps = false;

    public function product()
    {
        return $this->belongsTo('App\Model\Product', 'product_id');
    }

    /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function image()
    {
        return $this->belongsTo('App\Model\Image', 'image_id');
    }

    public function productSizes()
    {
        return $this->belongsToMany('App\Model\productSize');
    }
}
