<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class NewsTags extends Model
{
    protected $table = 'table_news_tags';
    public $fillable = ['name', 'slug', 'title', 'excerpt', 'content', 'seo_keyword', 'seo_description'];

    public function NewsTagsList() {
        return $this->hasMany('App\Model\NewsTagsList', 'tags_id');
    }
}
