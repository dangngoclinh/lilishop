<?php

namespace App\Http\Controllers\Admin\News;

use App\Model\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AddController extends Controller
{
    public function index()
    {
        return view('adminlte.news.add');
    }

    public function postAdd(Request $request)
    {
        $request->validate([
                               'name' => 'required',
                               'slug' => 'required|unique:' . (new News())->getTable(),
                           ]);
        $news = new News();
        $news->fill($request->all());
        $news->save();
        return redirect()->route('admin.news.edit', $news->id);
    }
}
