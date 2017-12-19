<?php

namespace App\Http\Controllers\Api;

use App\Model\Tags;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagsController extends Controller
{
    public function searchSelect2(Request $request)
    {
        if ($request->has('search')) {
            $result = Tags::where('name', 'LIKE', '%' . $request->input('search') . '%')
                ->limit(15)->get()->map(function ($value) {
                    return array('id' => $value->id,
                                 'text' => $value->name);
                });
            return response()->json($result);
        }
    }
}
