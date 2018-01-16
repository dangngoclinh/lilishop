<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    protected $table    = 'contacts';
    protected $fillable = [
        'name', 'phone', 'email', 'title', 'content'
    ];

    protected $casts = [
        'view' => 'boolean'
    ];

    protected $guarded = [
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\Model\Users', 'user_id');
    }

    public static function getCountUnRead() {
        return self::where('view', false)->count();
    }

    public static function getContactUnRead() {
        return self::where('view', false)->get();
    }
}
