<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function index() {

    }

    public function login() {
        return view('adminlte.login');
    }
}
