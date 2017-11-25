<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = "table_news";

    protected $fillable = ['name', 'slug', 'excerpt', 'content', 'seo_title', 'seo_keywords', 'seo_description'];
    protected $guarded = ['show', 'icon', 'image_id', 'user_id', 'view'];

    public function media() {
        return $this->belongsTo('App\Model\Media', 'image_id');
    }
}
