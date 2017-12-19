<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $table    = 'options';
    protected $fillable = ['key', 'value', 'input', 'description'];
}
