<?php

namespace App\Http\Controllers;

use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class BaseController extends Controller
{
    /**
     * @var User
     */
    protected $currentUser;

    public function __construct()
    {
        $this->currentUser = Auth::user();
        View::share('currentUser', $this->currentUser);
    }
}
