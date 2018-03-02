<?php

namespace App\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{
    use SoftDeletes;

    protected $table = "products";

    protected $fillable = [
        'SKU', 'name', 'slug', 'price_original', 'price', 'discount_price', 'discount_end', 'excerpt', 'content', 'title', 'description', 'keywords', 'new', 'top_selling', 'highlight', 'published_at', 'status'
    ];

    protected $guarded = [
        'quantity', 'view'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'published_at',
        'deleted_at',
        'discount_end'
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function setPublishedAtAttribute($value)
    {
        if ($value != null)
            $this->attributes['published_at'] = Carbon::createFromFormat('d-m-Y H:i:s', $value);
        else
            $this->attributes['published_at'] = $value;
    }

    public function setDiscountEndAttribute($value)
    {
        if ($value != null)
            $this->attributes['discount_end'] = Carbon::createFromFormat('d-m-Y', $value);
        else
            $this->attributes['discount_end'] = $value;
    }

    public function units()
    {
        return $this->hasMany('App\Model\ProductsUnit', 'product_id');
    }

    public function unit()
    {
        return $this->belongsTo('App\Model\ProductsUnit', 'unit_id');
    }

    public function brand()
    {
        return $this->belongsTo('App\Model\Brands', 'brand_id');
    }

    public function tags()
    {
        return $this->morphToMany('App\Model\Tags', 'taggable', 'taggables', 'taggable_id', 'tag_id');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Model\ProductsCategory', 'products_categories', 'product_id', 'product_category_id');
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
        return $this->belongsToMany('App\Model\Sizes', 'products_sizes', 'product_id', 'size_id')->withPivot(['id']);
    }

    public function productsSizes()
    {
        return $this->hasMany('App\Model\ProductsSizes', 'product_id');
    }

    public function colors()
    {
        return $this->belongsToMany('App\Model\Image', 'products_colors', 'product_id', 'image_id')->withPivot(['name']);
    }

    public function productsColors()
    {
        return $this->hasMany('App\Model\ProductsColors', 'product_id');
    }

    public function attachColor($image_id)
    {
        $cl = $this->colors()->where('image_id', $image_id)->first();
        if (!$cl) {
            $this->colors()->attach($image_id);
            $this->updateUnits();
        }

    }

    public function detachColor($image_id)
    {
        $this->colors()->detach($image_id);
        $this->updateUnits();
    }

    public function attachSize($size_id)
    {
        $size = $this->sizes()->where('size_id', $size_id)->first();
        if (!$size) {
            $this->sizes()->attach($size_id);
            $this->updateUnits();
        }
    }

    public function detachSize($size_id)
    {
        $this->sizes()->detach($size_id);
        $this->updateUnits();
    }

    public function attachTag($tag_id)
    {
        $tag_exists = $this->tags()->where('tag_id', $tag_id)->first();
        $tag        = Tags::find($tag_id);
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

    public function updateQuantity()
    {
        $this->quantity = $this->units->sum('quantity');
        $this->update();
    }

    public function updateUnitId()
    {
        $unit                 = $this->units()->where('quantity', '>', 0)->orderBy('price')->first();
        $this->price          = $unit->price;
        $this->discount_price = $unit->discount_price;
        $this->unit()->associate($unit);
        $this->save();
    }

    public function updateUnits()
    {
        $product = Products::find($this->id);
        $colors  = $product->productsColors;
        $sizes   = $product->productsSizes;

        $data = array();
        foreach ($colors as $color) {
            $data[$color->id] = ['product_id' => $product->id];
        }
        //dd($data);
        foreach ($sizes as $size) {
            $size->productsColors()->sync($data);
        }
    }
}
