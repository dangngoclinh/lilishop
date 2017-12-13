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

    }

    public function store()
    {

    }

    public function edit($id)
    {
        $news          = News::find($id);
        $categories    = NewsCategory::getAll();
        $category_list = $news->categories()->pluck('id')->toArray();
        $tags_list     = NewsTagsList::where('news_id', $id)->get();
        $images        = Media::where('imageable_id', $id)->get();;
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
