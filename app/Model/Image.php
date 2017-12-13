<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';

    protected $fillable = ['name', 'description'];
    protected $guarded  = ['file', 'medium', 'small', 'type', 'id_type'];

    public function imageable()
    {
        $this->morphTo();
    }
}
