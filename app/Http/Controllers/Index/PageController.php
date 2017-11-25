<?php

namespace App\Http\Controllers\Index;

use App\Model\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function home()
    {
        $products_new  = Product::paginate(4);
        $products_boy  = Product::paginate(4);
        $products_girl = Product::paginate(4);
        return view('index.index')
            ->with('products_new', $products_new)
            ->with('products_boy', $products_boy)
            ->with('products_girl', $products_girl);
    }

    public function products()
    {
        return view('index.page.products');
    }

    public function contact()
    {
        return view('index.page.contact');
    }
}
