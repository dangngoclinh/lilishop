<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Products;

class CategoryController extends Controller
{
    //
    public function index($name, $id)
    {
        $products = Products::where('id_list', $id)->paginate(15);
        return view('index.category', ['products' => $products]);
    }
}
