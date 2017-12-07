<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class ProductCategory extends Model
{
    use NodeTrait;
    protected $table = 'table_product_category';
    public $fillable = ['name', 'slug', 'parent_id', 'title', 'excerpt', 'content', 'seo_keyword', 'seo_description'];

    public function products() {
        return $this->belongsToMany('App\Model\Product');
    }
}
