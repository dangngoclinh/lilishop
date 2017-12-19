<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Events\ImageDeleted;

class Image extends Model
{
    protected $table = 'images';

    protected $fillable = ['name', 'description'];
    protected $guarded  = ['file', 'medium', 'small', 'type', 'id_type'];

    protected $dispatchesEvents = [
        'deleted' => ImageDeleted::class,
    ];

    public function imageable()
    {
        $this->morphTo();
    }
}
