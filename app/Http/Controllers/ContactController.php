<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show()
    {
        $email = null;
        if (Auth::check()) {
            $email = Auth::user()->email;
        }
        return view('contact', ['email' => $email]);
    }

    public function send(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'message' => 'required',
        ]);

        if (Auth::check()) {
            $validatedData['email'] = Auth::user()->email;
        } else {
            $validatedData['email'] = $request->input('email');
            $validatedData['email'] = 'required|email';
        }

        $contact = Contact::create($validatedData);

        if (Mail::to('yohivana2377@gmail.com')->send(new ContactMail($validatedData))) {
            return redirect()->route('contact.show')->with('success', 'Votre message a été envoyé avec succès');
        } else {
            return redirect()->route('contact.show')->with('error', 'Une erreur s\'est produite lors de l\'envoi du message. Veuillez réessayer plus tard.');
        }
    }
}
