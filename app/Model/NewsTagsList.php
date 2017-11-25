<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class NewsTagsList extends Model
{
    protected $table = 'table_news_tags_list';

    protected $fillable = ['news_id', 'tags_id'];

    public function NewsTags()
    {
        return $this->belongsTo('App\Model\NewsTags', 'tags_id');
    }
}
