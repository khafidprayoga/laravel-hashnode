<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $page = $request->query('page', 1);

        return Contact::paginate($page);
    }

    public function show(Contact $contact){
        return view('asdasd')->with();
    }
}
