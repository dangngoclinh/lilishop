<?php

namespace App\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = "news";

    protected $fillable = ['name', 'slug', 'excerpt', 'content', 'title', 'keywords', 'description', 'status', 'publish_date'];
    protected $guarded  = ['show', 'icon', 'image_id', 'user_id', 'view'];

    protected $dates = [
        'created_at',
        'updated_at',
        'publish_date'
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function setPublishDateAttribute($value)
    {
        $this->attributes['publish_date'] = Carbon::createFromFormat('d-m-Y H:i:s', $value);
    }

    public function featured()
    {
        return $this->belongsTo('App\Model\Image', 'image_id');
    }

    public function images()
    {
        return $this->morphMany('App\Model\Image', 'imageable');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Model\NewsCategory', 'news_categories', 'news_id', 'category_id');
    }

    public function tags()
    {
        return $this->morphToMany('App\Model\Tags', 'taggable', 'taggables', 'taggable_id', 'tag_id');
    }

    public function attachTag($tag_id)
    {
        $cl  = $this->tags()->where('tag_id', $tag_id)->first();
        $tag = Tags::find($tag_id);
        if (!$cl) {
            $this->tags()->attach($tag);
        }
    }

    public function detachTag($tag_id)
    {
        $this->tags()->detach($tag_id);
    }

    public function attachCategory($category_id)
    {
        $cl = $this->categories()->where('category_id', $category_id)->first();
        if (!$cl) {
            $this->categories()->attach($category_id);
        }
    }

    public function detachCategory($category_id)
    {
        $this->categories()->detach($category_id);
    }
}
