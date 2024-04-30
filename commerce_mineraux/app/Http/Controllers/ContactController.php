<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required|digits:10',
            'message' => 'required',
        ]);

        // Envoie de l'email
        Mail::send('emails.contact', [
            'fname' => $validatedData['first_name'],
            'lname' => $validatedData['last_name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'user_query' => $validatedData['message'],
        ], function($mail) use ($validatedData) {
            $mail->from($validatedData['email']);
            $mail->to('teito.klein@laposte.net')->subject('Nouveau message de contact');
        });

        // Rediriger vers la page d'accueil avec un message flash
        return redirect('/')->with('success', 'Votre message a été envoyé. Nous vous répondrons dans les 48 heures.');  
    }
}
