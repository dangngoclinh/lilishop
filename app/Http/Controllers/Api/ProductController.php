<?php

namespace App\Http\Controllers\Api;

use App\Model\ProductTag;
use App\Model\Sizes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function tags()
    {
        $result = ProductTag::select('id', 'name')->get()->map(function ($value) {
            return array('id' => $value->id,
                         'text' => $value->name);
        });
        return response()->json($result);
    }

    public function sizes()
    {
        $result = Sizes::select('id', 'name')->get()->map(function ($value) {
            return array('id' => $value->id,
                         'text' => $value->name);
        });
        return response()->json($result);
    }
}
