<?php

namespace App\Http\Controllers\Admin;

use App\model\Brands;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brands::orderBy('id', 'desc')->paginate(15);
        return view('adminlte.brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminlte.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $brands = new Brands();
        $request->validate([
                               'name' => 'required',
                               'acronym' => 'required|unique:' . $brands->getTable()
                           ]);
        $brands->fill($request->all());
        $brands->save();
        return redirect()->route('admin.brands.edit', ['id' => $brands->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brands = Brands::find($id);
        if ($brands) {
            return view('adminlte.brands.edit', compact('brands'));
        }
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $brands = Brands::find($id);
        if ($brands) {
            $request->validate([
                                   'name' => 'required',
                                   'acronym' => 'required|unique:' . $brands->getTable() . ',acronym,' . $id
                               ]);
            $brands->fill($request->all());
            $brands->update();
            return back()->with(['success' => __('Thương hiệu đã được lưu')]);
        }
        abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
