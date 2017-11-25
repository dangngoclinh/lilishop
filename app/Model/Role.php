<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table    = 'table_role';
    protected $fillable = [
        'name', 'slug'
    ];

    public function users() {
        return $this->belongsToMany('App\Model\User');
    }
}
