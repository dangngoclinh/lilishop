<?php

namespace App\Http\Controllers\Index;

use App\Model\Contact;
use App\Model\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('index.page.contact');
    }

    public function store(Request $request)
    {
        if (!Auth::check()) {
            $request->validate([
                                   'name' => 'required',
                                   'phone' => 'required',
                                   'email' => 'email',
                                   'title' => 'required',
                                   'content' => 'required',
                                   'g-recaptcha-response' => 'required|captcha'
                               ]);
        } else {
            $request->validate([
                                   'title' => 'required',
                                   'content' => 'required',
                                   'g-recaptcha-response' => 'required|captcha'
                               ]);
        }
        $contact = Contact::create($request->all());
        if (Auth::check()) {
            $contact->user()->associate(Users::find(Auth::user()->id));
        }
        $contact->save();
        return back()->with('status', 'true');
    }
}
