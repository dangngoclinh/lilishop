<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductTag extends Model
{
    protected $table = 'table_product_tag';
    public $fillable = ['name', 'slug', 'title', 'excerpt', 'content', 'seo_keyword', 'seo_description'];

    public function products() {
        return $this->belongsToMany('App\Model\Product');
    }
}
