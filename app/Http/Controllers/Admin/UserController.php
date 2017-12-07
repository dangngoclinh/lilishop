<?php

namespace App\Http\Controllers\Admin;

use App\Model\Roles;
use App\Model\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;

class UserController extends Controller
{
    use RegistersUsers;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Users::paginate(25);
        return view('adminlte.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Roles::all();
        return view('adminlte.user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*        echo '<pre>';
                print_r($request->all());
                echo '</pre>';
                die();*/
        $request->validate([
                               'name' => 'required|string|max:191',
                               'email' => 'required|string|email|max:191|unique:table_user',
                               'password' => 'required|string|min:6|confirmed',
                           ]);
        $user           = new User();
        $user->name     = $request->input('name');
        $user->email    = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->phone    = $request->input('phone');
        $user->save();

        //Save roles
        if ($request->filled('roles')) {
            $user->roles()->sync($request->input('roles'));
        }
        return back()->with('success', __('Create a User success'));
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
        $user  = Users::find($id);
        $roles = Roles::all();
        if ($user) {
            return view('adminlte.user.edit', compact('user', 'roles'));
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
                               'name' => 'required|string|max:191',
                               'email' => 'required|string|email|max:191|unique:table_user,email,' . $id,
                               'password' => 'nullable|string|min:6|confirmed',
                           ]);
        $user        = User::find($id);
        $user->name  = $request->input('name');
        $user->email = $request->input('email');
        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }
        $user->phone = $request->input('phone');
        $user->update();

        $user->roles()->sync($request->input('roles'));
        return back()->with('success', __('User has updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user      = Users::find($id);
        if ($user) {
            $user_name = $user->name;
            $user->roles()->detach($user->roles()->pluck('user_id')->toArray());
            $user->delete();
            return redirect()->route('admin.user')->with('success', __('User: :name has deleted', ['name' => $user_name]));
        }
        abort(404);
    }
}
