<?php

namespace App\Http\Controllers\Admin;

use App\Model\Sizes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sizes = Sizes::all();
        return view('adminlte.size.index', compact('sizes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminlte.size.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
                               'name' => 'required|unique:' . with(new Sizes())->getTable() . '|max:191'
                           ]);
        $size = Sizes::create($request->all());
        $size->save();
        return back()->with('success', __('Create a size success'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $size = Sizes::find($id);
        if ($size) {
            return view('adminlte.size.edit', compact('size'));
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
        $size = Sizes::find($id);
        if ($size) {
            $request->validate([
                                   'name' => 'required|unique:' . $size->getTable() . ',name,' . $id . '|max:191'
                               ]);
            $size->name = $request->input('name');
            $size->update();
            return back()->with('success', __('Đã cập nhật'));
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
        $size = Sizes::find($id);
        if ($size) {
            $size->delete();
            return redirect()->route('admin.size')->with('success', __('Size: :name has deleted', ['name' => $size->name]));
        }
        abort(404);
    }
}
