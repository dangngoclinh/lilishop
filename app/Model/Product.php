<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "table_product";

    protected $fillable = [
        'SKU', 'name', 'slug', 'price_original', 'price', 'price_sale', 'excerpt', 'content', 'title', 'description', 'keywords', 'new', 'top_selling', 'highlight'
    ];

    protected $guarded = [
        'quantity', 'view'
    ];

    public function tags()
    {
        return $this->belongsToMany('App\Model\ProductTag', 'table_product_tag_list', 'product_tag_id', 'product_id');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Model\ProductCategory', 'table_product_category_list', 'product_category_id', 'product_id');
    }

    public function images()
    {
        return $this->morphMany('App\Model\Image', 'imageable');
    }

    public function sizes()
    {
        return $this->belongsToMany('App\Model\Size', 'table_product_size', 'product_id', 'size_id')->withTimestamps();
    }

    public function units()
    {
        return $this->hasManyThrough('App\Model\ProductUnit', 'App\Model\ProductSize');
    }

    public function colors()
    {
        return $this->belongsToMany('App\Model\Image', 'table_product_color', 'product_id', 'image_id')->withTimestamps();
    }

    public function attachColor($image_id)
    {
        $cl = $this->colors()->where('image_id', $image_id)->first();
        if (!$cl) {
            $this->colors()->attach($image_id);
        }

    }

    public function detachColor($image_id) {
        $this->colors()->detach($image_id);
    }
}
