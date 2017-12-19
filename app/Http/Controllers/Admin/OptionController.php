<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Option;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class OptionController extends Controller
{
    public function index()
    {
        $options = Option::all();
        return view('adminlte.option.index')
            ->with('options', $options);
    }

    public function create()
    {
        return view('adminlte.option.create');
    }

    public function store(Request $request)
    {
        $request->validate([
                               'key' => 'required|unique:' . with(new Option)->getTable()
                           ]);
        $option = Option::create($request->all());
        $option->save();
        $this->cache();

        return back()->with('success', __('Thiết lập đã được thêm'));
    }


    public function update(Request $request)
    {
        foreach ($request['value'] as $key => $value) {
            $value = ['value' => $value];
            Option::where('key', $key)->update($value);
        }
        $this->cache();

        //Option::update($data);
        return back()->with('success', __('Cập nhật thành công'));
    }

    public function cache()
    {
        Cache::forever('option', Option::pluck('value', 'key')->all());
    }
}
