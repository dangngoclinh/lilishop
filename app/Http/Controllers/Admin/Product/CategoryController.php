<?php

namespace App\Http\Controllers\Admin\Product;

use App\Model\ProductsCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        ProductsCategory::fixTree();
        $categories = sort_category(ProductsCategory::all());
        return view('adminlte.product.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = sort_category(ProductsCategory::all());
        return view('adminlte.product.category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:' . with(new ProductsCategory())->getTable()
                            ]);
        $category = ProductsCategory::create($request->all());
        $category->save();
        return redirect()->route('admin.product.category.edit', $category->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = ProductsCategory::find($id);
        $categories = sort_category(ProductsCategory::where('id', '!=', $id)->get());
        if($category) {
            return view('adminlte.product.category.edit', compact('category', 'categories'));
        }
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = ProductsCategory::find($id);
        if($category) {
            $request->validate([
                                   'name' => 'required',
                                   'slug' => 'required|unique:' . $category->getTable() . ',slug,' . $category->id
                               ]);
            $category->fill($request->all());
            $category->update();
            return back()->with('success', 'Update Success');
        }
        abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort(404);
    }
}
