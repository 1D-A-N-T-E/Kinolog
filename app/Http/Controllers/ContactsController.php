<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;

class ContactsController extends Controller
{
    // Kontaktu lapas attēlošana
    public function index()
    {
        return view('contacts');
    }

    // E-pasta sūtīšanas apstrāde
    public function send(Request $request)
    {
        // Validācija
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        // Nosūtām e-pastu
        Mail::to('mgraudins5@gmail.com')->send(new ContactFormMail($validatedData));

        // Atgriežam atpakaļ ar success ziņu
        return back()->with('success', 'Ziņa nosūtīta veiksmīgi!');
    }
}