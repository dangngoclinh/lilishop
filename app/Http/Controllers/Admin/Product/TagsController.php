<?php

namespace App\Http\Controllers\Admin\Product;

use App\Model\ProductTag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = ProductTag::paginate(25);
        return view('adminlte.product.tag.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminlte.product.tag.create');
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
                               'slug' => 'unique:table_news_tags'
                           ]);
        $product_tag = ProductTag::create($request->all());
        $product_tag->save();
        return redirect()->route('admin.product.tag.edit', $product_tag->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = ProductTag::find($id);
        if($tag) {
            return view('adminlte.product.tag.edit', compact('tag'));
        }
        abort('404');
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
        $tag = ProductTag::find($id);
        $request->validate([
                               'name' => 'required',
                               'slug' => 'required|unique:table_product_tag,slug,' . $id
                           ]);
        if($tag) {
            $tag->fill($request->all());
            $tag->update();
            return back()->with(['success' => 'Đã Lưu']);
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
        //
    }
}
