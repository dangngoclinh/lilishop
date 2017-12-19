<?php

namespace App\Http\Controllers\Admin\Product;

use App\Model\Products;
use App\Model\ProductColor;
use App\Model\ProductSize;
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
        $this->updateUnit($id);
        $product = Products::find($id);
        if ($product) {
            return view('adminlte.product.quantity', compact('product'));
        }
        abort(404);
    }

    public function store(Request $request, $id)
    {
        $quantity = $request->input('quantity');
        $price    = $request->input('price');

        $product = Products::find($id);
        $sizes   = $product->productSizes;
        foreach ($sizes as $size) {
            $colors = $size->productColors;
            $data    = array();
            foreach ($colors as $color) {
                if ($price[$size->id][$color->id] >= 0)
                    $data[$color->id]['price'] = $price[$size->id][$color->id];
                if ($quantity[$size->id][$color->id] >= 0)
                    $data[$color->id]['quantity'] = $quantity[$size->id][$color->id];
                $data[$color->id]['product_id'] = $id;
            }
            $size->productColors()->sync($data);
        }
        return back()->with('success', __('Update Success'));
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
            $size->productColors()->sync($data);
        }
        return back()->with('success', __('Update Success'));
    }

    private function updateUnit($id)
    {
        $productColor = ProductColor::where('product_id', $id)->get();
        $productSize  = ProductSize::where('product_id', $id)->get();
        foreach ($productSize as $size) {
            $data = array();
            foreach ($productColor as $color) {
                $data[$color->id] = ['product_id' => $id];
            }
            $size->productColors()->sync($data);
        }
    }
}
