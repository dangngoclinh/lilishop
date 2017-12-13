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
}
