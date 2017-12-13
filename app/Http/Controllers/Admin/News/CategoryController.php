<?php

namespace App\Http\Controllers\Admin\News;

use App\Model\NewsCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = NewsCategory::get()->toTree();
        return view('adminlte.news.category.index', compact('categories'));
    }

    public function create()
    {
        $categories = NewsCategory::get()->toTree();
        return view('adminlte.news.category.create')
            ->with('categories', $categories);
    }

    public function store(Request $request)
    {
        $category = new NewsCategory;
        $request->validate([
                               'name' => 'required',
                               'slug' => 'required|unique:' . $category->getTable()
                           ]);
        $category->fill($request->all());
        $category->save();
        return redirect()->route('admin.news.category.edit', ['id' => $category->id]);

    }

    public function edit($id)
    {
        $category   = NewsCategory::find($id);
        $categories = NewsCategory::getAll();
        return view('adminlte.news.category.edit')
            ->with('category', $category)
            ->with('categories', $categories);
    }

    public function update(Request $request, $id)
    {
        $category = NewsCategory::find($id);
        $request->validate([
                               'name' => 'required',
                               'slug' => 'required|unique:' . $category->getTable() . ',slug,' . $category->id
                           ]);
        $category->fill($request->all());
        $category->update();
        return back()->with('success', 'Update Success');
    }

    /*    public function getCategoryAll()
        {
            $categories = NewsCategory::all();
            $result     = array();
            foreach ($categories as $category) {
                $parent            = ($category->parent_id != null) ? $category->parent_id : 0;
                $result[$parent][] = $category;
            }
            return $result;
        }*/

    public function destroy($id)
    {

    }
}
