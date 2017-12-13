<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = "news";

    protected $fillable = ['name', 'slug', 'excerpt', 'content', 'seo_title', 'seo_keywords', 'seo_description'];
    protected $guarded = ['show', 'icon', 'image_id', 'user_id', 'view'];

    public function image() {
        return $this->belongsTo('App\Model\Image', 'image_id');
    }

    public function images() {
        return $this->morphMany('App\Model\Image', 'imageable');
    }

    public function categories() {
        return $this->belongsToMany('App\Model\NewsCategory', 'news_categories', 'news_id', 'category_id');
    }
}
