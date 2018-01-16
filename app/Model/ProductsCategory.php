<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class ProductsCategory extends Model
{
    use NodeTrait;
    protected $table = 'products_category';
    public $fillable = ['name', 'slug', 'parent_id', 'title', 'excerpt', 'content', 'keywords', 'description'];

    public function products() {
        return $this->belongsToMany('App\Model\Products');
    }


}
