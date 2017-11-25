<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class NewsCategory extends Model
{
    use NodeTrait;

    public $table = 'table_news_category';

    public $fillable = ['name', 'slug', 'parent_id', 'title', 'excerpt', 'content', 'seo_keyword', 'seo_description'];

    public function NewsCategoryList() {
        return $this->belongsTo('App\Model\NewsCategoryList', 'category_id');
    }

    public static function getAll() {
        $categories = self::all();
        $result     = array();
        foreach ($categories as $category) {
            $parent            = ($category->parent_id != null) ? $category->parent_id : 0;
            $result[$parent][] = $category;
        }
        return $result;
    }
}
