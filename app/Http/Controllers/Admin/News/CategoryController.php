<?php

namespace App\Http\Controllers\Admin\News;

use App\Model\NewsCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kalnoy\Nestedset\Collection;

/*use Kalnoy\Nestedset\QueryBuilder;*/

class CategoryController extends Controller
{
    public function index()
    {
        $categories = NewsCategory::getAll();
        return view('adminlte.news.category.index')
            ->with('categories', $categories);
    }

    public function add()
    {
        $categories = $this->getCategoryAll();
        return view('adminlte.news.category.add')
            ->with('categories', $categories);
    }

    public function postAdd(Request $request)
    {
        $category = NewsCategory::create($request->all());
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

    public function postEdit(Request $request, $id)
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
}
