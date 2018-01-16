<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Sizes extends Model
{
    protected $table      = 'sizes';
    protected $fillable   = ['name'];
    public $timestamps = false;
}
