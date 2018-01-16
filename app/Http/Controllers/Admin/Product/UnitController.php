<?php

namespace App\Http\Controllers\Admin\Product;

use App\Model\Products;
use App\Model\ProductsColors;
use App\Model\ProductsSizes;
use App\Model\ProductsUnit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UnitController extends Controller
{
    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($id)
    {
        $product = Products::find($id);
        $units   = $product->units()->orderBy('product_size_id')->orderBy('product_color_id')->get();
        if ($product) {
            return view('adminlte.product.quantity', compact('product', 'units'));
        }
        abort(404);
    }

    public function update(Request $request, $id)
    {
        $quantity = $request->input('quantity');
        $price    = $request->input('price');
        $sku    = $request->input('sku');

        $product = Products::find($id);
        $units   = $product->units;
        //dd($quantity);
        /*dd($units);*/
        foreach ($units as $unit) {
            $unit->price    = $price[$unit->id];
            $unit->quantity = $quantity[$unit->id];
            $unit->sku = $sku[$unit->id];
            $unit->update();
        }
        return back()->with('success', __('Số lượng và giá đã được cập nhật'));
    }

    public function storeGeneral(Request $request, $id)
    {
        $request->validate([
                               'quantity' => 'required',
                               'price.*' => 'required|integer'
                           ]);
        $quantity = $request->input('quantity');
        $price    = $request->input('price');

        $product = Products::find($id);
        $sizes   = $product->productSizes;
        $data    = array();
        foreach ($sizes as $size) {
            $colors = $size->productColors;
            foreach ($colors as $color) {
                if ($price[$size->id] > 0)
                    $data[$color->id]['price'] = $price[$size->id];
                if ($quantity > 0)
                    $data[$color->id]['quantity'] = $quantity;
                $data[$color->id]['product_id'] = $id;
            }
            //$size->productColors()->sync($data);
        }
        return back()->with('success', __('Update Success'));
    }
}
