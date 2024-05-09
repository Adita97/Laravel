<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function showContactForm(){
        return view('contact');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|min:3',
            'last_name'=> 'required|min:3',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required|min:10',
        ]);

        Contact::create($validatedData);
        
        return redirect()->back()->with('success', 'Message sent successfully!');
}
}