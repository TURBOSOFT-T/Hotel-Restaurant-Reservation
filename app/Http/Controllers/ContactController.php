<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact');
    }
    public function submit(Request $request)
    {
         // Valider les données du formulaire
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $maillable = new ContactMessageCreated($request->name,
        $request->subject,
        $request->email,
        $request->message);
        Mail::to('resetpassword@turbosoft-freelancer.com')->send($maillable);
return redirect()->route('contact.show')->with('success', 'Your message has been sent!');
    }
}
