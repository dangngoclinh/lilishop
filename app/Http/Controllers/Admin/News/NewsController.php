<?php

namespace App\Http\Controllers\Admin\News;

use App\Model\News;
use App\Model\NewsCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    public function index()
    {
        $news_list = News::paginate(15);
        return view('adminlte.news.index')
            ->with('news_list', $news_list);
    }

    public function create()
    {
        return view('adminlte.news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
                               'name' => 'required',
                               'slug' => 'required|unique:' . (new News())->getTable(),
                           ]);
        $news = News::create($request->all());
        $news->save();
        return redirect()->route('admin.news.edit', $news->id);
    }

    public function edit($id)
    {
        $news          = News::find($id);
        $categories    = NewsCategory::get()->toTree();
        //dd($news->categories);

        $category_list = $news->categories()->pluck('id')->toArray();
        //dd($category_list);
        //$tags_list     = NewsTagsList::where('news_id', $id)->get();
        //$images        = Media::where('imageable_id', $id)->get();;
        if ($news) {
            return view('adminlte.news.edit', compact('news', 'categories', 'category_list', 'tags_list', 'images'));
        }
    }

    public function update(Request $request, $id)
    {

    }

    public function destroy()
    {

    }

    public function ajax()
    {

    }
}
