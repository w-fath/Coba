<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'whatsapp' => 'required|string|max:15',
            'comment' => 'required|string',
        ]);

        $contact = new Contact();
        $contact->first_name = $validatedData['first_name'];
        $contact->last_name = $validatedData['last_name'];
        $contact->email = $validatedData['email'];
        $contact->whatsapp = $validatedData['whatsapp'];
        $contact->comment = $validatedData['comment'];
        $contact->save();

        return redirect('/contact')->with('success','Massage sent successfully!');
    }
}
