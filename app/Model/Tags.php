<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    protected $table    = 'tags';
    public    $fillable = ['name', 'slug', 'title', 'excerpt', 'content', 'keywords', 'description'];

    public function image()
    {
        return $this->belongsTo('App\Model\Image', 'image_id');
    }

    public function news()
    {
        return $this->morphedByMany('App\Model\News', 'taggable', 'taggables', 'tag_id');
    }

    public function products()
    {
        return $this->morphedByMany('App\Model\Products', 'taggable', 'taggables', 'tag_id');
    }
}
