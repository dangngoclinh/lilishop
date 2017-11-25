<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\OptionAddRequest;
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

    public function add()
    {
        return view('adminlte.option.add');
    }

    public function update(Request $request)
    {
        $data = array();
        foreach ($request['value'] as $key => $value) {
            $value = ['value' => $value];
            Option::where('key', $key)->update($value);
        }

        //Cache
        Cache::forever('option', Option::pluck('value', 'key')->all());

        //Option::update($data);
        return back()->with('success', 'Update thành công');
    }

    public function postAdd(OptionAddRequest $request)
    {
        $option = Option::create($request->all());
        $option->save();
        return back()->with('success', 'Thêm thành công');
    }
}
