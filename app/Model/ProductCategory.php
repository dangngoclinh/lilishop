<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $table = 'table_product_category';
    public $fillable = ['name', 'slug', 'parent_id', 'title', 'excerpt', 'content', 'seo_keyword', 'seo_description'];

    public function products() {
        return $this->belongsToMany('App\Model\Product');
    }
}
