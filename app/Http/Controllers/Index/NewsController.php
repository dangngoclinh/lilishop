<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\News;

class NewsController extends Controller
{

    public function index()
    {
        $news_list = News::where('type', 'news')->paginate(10);
        return view('index.news.index', compact('news_list'));
    }

    public function view($slug, $id)
    {
        $news = News::where('id', $id)->first();
        return view('index.news.view')
            ->with('news', $news);
    }
}
