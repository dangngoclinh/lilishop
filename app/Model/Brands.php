<?php

namespace App\model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Brands extends Model
{
    protected $table = 'brands';

    protected $fillable = [
        'name', 'acronym', 'excerpt', 'content', 'title', 'keywords', 'description', 'founded_at'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'founded_at'
    ];

    public function image()
    {
        $this->belongsTo('App\Model\Image', 'image_id');
    }

    public function setFoundedAtAttribute($value)
    {
        $this->attributes['founded_at'] = Carbon::createFromFormat('d-m-Y', $value);
    }
}
