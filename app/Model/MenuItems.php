<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class MenuItems extends Model
{
    use NodeTrait;
    protected $table = "menu_items";

}
