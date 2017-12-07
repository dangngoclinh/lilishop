<?php

namespace App\Http\Controllers\Admin;

use App\Model\Roles;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Roles::all();
        return view('adminlte.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminlte.role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
                               'name' => 'required',
                               'slug' => 'required|unique:table_role'
                           ]);
        $role = Roles::create($request->all());
        $role->save();
        return back()->with('success', __('Add new Roles Success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Roles::find($id);
        if ($role) {
            return view('adminlte.role.edit', compact('role'));
        }
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
                               'name' => 'required',
                               'slug' => 'required|unique:table_role'
                           ]);
        $role = Roles::find($id);
        if ($role) {
            $role->fill($request->all());
            $role->update();
        }
        abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Roles::find($id);
        if ($role) {
            $role_name = $role->name;
            $role->delete();
            return redirect()->route('admin.role')->with('success', __('Roles: :name has deleted', ['name' => $role_name]));
        }
        abort(404);
    }
}
