<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Colors extends Model
{
    protected $table = "colors";

    protected $fillable = [
        'name', 'slug'
    ];

    public $timestamps = false;

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = str_slug($value);
    }

    public function exist()
    {
        $color = Colors::where('slug', $this->slug)->first();
        if (!$color)
            return false;
        return true;
    }

    public static function add($name)
    {
        $color       = new Colors();
        $color->name = $name;
        $color->slug = str_slug($name);
        if (!$color->exist()) {
            $color->save();
        }
    }
}
