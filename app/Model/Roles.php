<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $table    = 'roles';
    protected $fillable = [
        'name', 'slug'
    ];

    public function users() {
        return $this->belongsToMany('App\Model\Users');
    }
}
