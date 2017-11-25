<?php

namespace App\Http\Controllers\Admin\News;

use App\Model\NewsTags;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagsController extends Controller
{
    public function index()
    {
        $tags = NewsTags::paginate(15);
        return view('adminlte.news.tags.index')
            ->with('tags', $tags);
    }

    public function add()
    {
        return view('adminlte.news.tags.add');
    }

    public function edit($id)
    {
        $tag = NewsTags::where('id', $id)->first();
        return view('adminlte.news.tags.edit')
            ->with('tag', $tag);
    }

    public function postAdd(Request $request)
    {
        $request->validate([
                               'name' => 'required',
                               'slug' => 'unique:table_news_tags'
                           ]);
        $newstags = NewsTags::create($request->all());
        $newstags->save();
        return redirect()->route('admin.news.tags.edit', $newstags->id);
    }

    public function postEdit(Request $request, $id)
    {
        $tag = NewsTags::find($id);
        $request->validate([
                               'name' => 'required'
                           ]);
        $tag->fill($request->all());
        $tag->update();
        return back()->with(['success' => 'Đã Lưu']);
    }

    public function delete($id)
    {
        $tag = NewsTags::destroy($id);
        return back()->with('success', 'Đã Xóa Thành Công');
    }
}
