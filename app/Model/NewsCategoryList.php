<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class NewsCategoryList extends Model
{
    protected $table = 'table_news_category_list';

    protected $fillable = ['news_id', 'category_id'];
    protected $guarded  = ['primary'];

    public function NewsCategory()
    {
        return $this->hasOne('App\Model\NewsCategory');
    }
}
