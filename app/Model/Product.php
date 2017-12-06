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
        return $this->belongsToMany('App\Model\ProductTag', 'table_product_tag_list', 'product_id', 'product_tag_id');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Model\ProductCategory', 'table_product_category_list', 'product_id', 'product_category_id');
    }

    public function images()
    {
        return $this->morphMany('App\Model\Image', 'imageable');
    }

    public function featured()
    {
        return $this->belongsTo('App\Model\Image', 'image_id');
    }

    public function sizes()
    {
        return $this->belongsToMany('App\Model\Size', 'table_product_size', 'product_id', 'size_id')->withTimestamps();
    }

    public function productSizes()
    {
        return $this->hasMany('App\Model\ProductSize', 'product_id');
    }

    public function colors()
    {
        return $this->belongsToMany('App\Model\Image', 'table_product_color', 'product_id', 'image_id')->withPivot(['name'])->withTimestamps();
    }

    public function attachColor($image_id)
    {
        $cl = $this->colors()->where('image_id', $image_id)->first();
        if (!$cl) {
            $this->colors()->attach($image_id);
        }

    }

    public function detachColor($image_id)
    {
        $this->colors()->detach($image_id);
    }

    public function attachSize($size_id)
    {
        $size = $this->sizes()->where('size_id', $size_id)->first();
        if (!$size) {
            $this->sizes()->attach($size_id);
        }
    }

    public function detachSize($size_id)
    {
        $this->sizes()->detach($size_id);
    }

    public function attachTag($tag_id)
    {
        $cl = $this->tags()->where('product_tag_id', $tag_id)->first();
        if (!$cl) {
            $this->tags()->attach($tag_id);
        }
    }

    public function detachTag($tag_id)
    {
        $this->tags()->detach($tag_id);
    }

    public function attachCategory($category_id)
    {
        $cl = $this->categories()->where('product_category_id', $category_id)->first();
        if (!$cl) {
            $this->categories()->attach($category_id);
        }
    }

    public function detachCategory($category_id)
    {
        $this->categories()->detach($category_id);
    }
}
