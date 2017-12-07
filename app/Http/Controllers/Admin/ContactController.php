<?php

namespace App\Http\Controllers\Admin;

use App\Model\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $contacts = Contact::orderBy('view')->orderBy('created_at', 'desc')->paginate(20);
        return view('adminlte.contact.index', compact('contacts'));
    }

    public function view($id)
    {
        $contact = Contact::find($id);
        if ($contact) {
            $contact->view = true;
            $contact->save();
            return view('adminlte.contact.view', compact('contact'));
        }
        abort(404);
    }

    public function reply(Request $request, $id)
    {
        $contact = Contact::find($id);
        if ($contact) {
            return back()->with('success', true);
        }
        abort(404);
    }

    public function ajax(Request $request)
    {
        if ($request->has('act')) {
            switch ($request->input('act')) {
                case "set_read":
                    $contact       = Contact::find($request->input('id'));
                    $contact->view = true;
                    $contact->save();
                    return response()->json(['status' => true]);
                    break;
                case "set_unread":
                    $contact       = Contact::find($request->input('id'));
                    $contact->view = false;
                    $contact->save();
                    return response()->json(['status' => true]);
                    break;
                case "delete":
                    break;
            }
        }
    }
}
