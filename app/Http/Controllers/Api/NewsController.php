<?php

namespace App\Http\Controllers\Api;

use App\Model\NewsTags;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    public function tags()
    {
        $result = NewsTags::select('id', 'name')->get()->map(function($value) {
            return array('id' => $value->id,
                         'text' => $value->name);
        });
        return response()->json($result);
    }
}
