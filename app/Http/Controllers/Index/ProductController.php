<?php

namespace App\Http\Controllers\Index;

use App\Library\Breadcrumbs;
use App\Model\Product;
use App\Model\ProductCategory;
use App\Model\ProductSize;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index($name, $id)
    {
        $product     = Product::where('id', $id)->first();
        $categories  = ProductCategory::ancestorsAndSelf($product->categories->first()->id);
        $breadcrumbs = new Breadcrumbs();
        if ($categories->isNotEmpty()) {
            foreach ($categories as $category) {
                $breadcrumbs->addBC($category->name, route('product.category', ['name' => $category->slug, 'id' => $category->id]));
            }
        }
        $breadcrumbs->addBC($product->name, '', false);
        return view('index.product', compact('product', 'breadcrumbs'));
    }

    public function ajax(Request $request, $id)
    {
        if ($request->has('act')) {
            switch ($request->input('act')) {
                case "get_colors":
                    $size_id      = $request->input('size_id');
                    $product_size = ProductSize::where([
                                                           'size_id' => $size_id,
                                                           'product_id' => $id
                                                       ]);
                    return response()->view('index.partials.product_size', ['colors' => $product_size->productColors]);
                    break;
                case "get_quantity":
                    break;
            }
        }
        abort(404);
    }

}
