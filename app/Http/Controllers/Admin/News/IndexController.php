<?php

namespace App\Http\Controllers\Admin\News;

use App\Model\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $news_list = News::paginate(15);
        return view('adminlte.news.index')
            ->with('news_list', $news_list);
    }

    public function edit() {

    }
}
