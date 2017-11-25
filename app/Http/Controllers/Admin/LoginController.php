<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
                               'email' => 'required',
                               'password' => 'required'
                           ]);
        $login = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];
        if (Auth::attempt($login)) {
            return redirect()->route('admin.home');
        }
        return back()->withErrors('Email và Mật khẩu chưa đúng');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
