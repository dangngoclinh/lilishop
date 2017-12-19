<?php

namespace App\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = "products";

    protected $fillable = [
        'SKU', 'name', 'slug', 'price_original', 'price', 'price_sale', 'excerpt', 'content', 'title', 'description', 'keywords', 'new', 'top_selling', 'highlight', 'published_at', 'status'
    ];

    protected $guarded = [
        'quantity', 'view'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'published_at'
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function setPublishedAtAttribute($value)
    {
        $this->attributes['published_at'] = Carbon::createFromFormat('d-m-Y H:i:s', $value);
    }

    public function tags()
    {
        return $this->morphToMany('App\Model\Tags', 'taggable', 'taggables', 'taggable_id', 'tag_id');
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
        $tag_exists  = $this->tags()->where('tag_id', $tag_id)->first();
        $tag = Tags::find($tag_id);
        if (!$tag_exists) {
            $this->tags()->attach($tag_exists);
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
