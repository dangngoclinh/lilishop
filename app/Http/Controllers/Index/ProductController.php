<?php

namespace App\Http\Controllers\Index;

use App\Model\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index($name, $id) {
        $product = Product::where('id', $id)->first();
        $product_ralated = Product::where('id_list', $product->id_list)->limit(5)->get();
        return view('index.product')->with('product', $product)
            ->with('product_related', $product_ralated);
    }

}
