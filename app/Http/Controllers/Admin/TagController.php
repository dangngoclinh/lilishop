<?php

namespace App\Http\Controllers\Admin;

use App\Model\Tags;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tags::orderBy('updated_at', 'desc')->paginate(25);
        return view('adminlte.tags.index')
            ->with('tags', $tags);
    }

    public function create()
    {
        return view('adminlte.tags.create');
    }

    public function store(Request $request)
    {
        $request->validate([
                               'name' => 'required',
                               'slug' => 'unique:' . with(new Tags)->getTable()
                           ]);
        $tag = Tags::create($request->all());
        $tag->save();
        return redirect()->route('admin.tags.edit', $tag->id);
    }

    public function edit($id)
    {
        $tag = Tags::where('id', $id)->first();
        return view('adminlte.tags.edit')
            ->with('tag', $tag);
    }

    public function update(Request $request, $id)
    {
        $tag = Tags::find($id);
        $request->validate([
                               'name' => 'required',
                               'slug' => 'unique:' . with(new Tags)->getTable() . ',slug,' . $id
                           ]);
        $tag->fill($request->all());
        $tag->update();
        return back()->with(['success' => __('Đã lưu')]);
    }

    public function destroy($id)
    {
        $tag = Tags::destroy($id);
        return back()->with('success', __('Đã xóa tag'));
    }

    public function search(Request $request) {

        $result = Tags::select('id', 'name')->get()->map(function ($value) {
            return array('id' => $value->id,
                         'text' => $value->name);
        });
    }
}
