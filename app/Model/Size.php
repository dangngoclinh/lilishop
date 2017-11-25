<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $table      = 'table_size';
    protected $fillable   = ['name'];
    public $timestamps = false;
}
