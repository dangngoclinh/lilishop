<?php

namespace App\Http\Controllers\Api;

use App\Model\Colors;
use App\Model\ProductsColors;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ColorsController extends Controller
{
    public function searchSelect2(Request $request)
    {
        $result = array();
        if ($request->has('search') && $request->input('search') != '') {
            $result = Colors::where('name', 'LIKE', '%' . $request->input('search') . '%')
                ->limit(15)->get()->map(function ($value) {
                    return $value->name;
                });
        } else {
            $result = Colors::paginate(15)->map(function ($value) {
                return $value->name;
            });
        }
        return response()->json($result);
    }
}
