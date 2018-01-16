<?php

namespace App\Http\Controllers\Api;

use App\Model\Sizes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SizesController extends Controller
{
    public function searchSelect2(Request $request)
    {
        $result = array();
        if ($request->has('search') && $request->input('search') != '') {
            $result = Sizes::where('name', 'LIKE', '%' . $request->input('search') . '%')
                ->limit(15)->get()->map(function ($value) {
                    return array('id' => $value->id,
                                 'text' => $value->name);
                });
        } else {
            $result = Sizes::paginate(15)->map(function ($value) {
                return array('id' => $value->id,
                             'text' => $value->name);
            });
        }
        return response()->json($result);
    }
}
