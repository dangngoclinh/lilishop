<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $table    = 'table_option';
    protected $fillable = ['key', 'value', 'input', 'description'];
}
