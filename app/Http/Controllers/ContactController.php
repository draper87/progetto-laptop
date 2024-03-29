<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class ContactController extends Controller
{
    public function contact() {

        return view('contact');

    }

    public function contactPost(Request $request){

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'comment' => 'required'
        ]);

        // Recupero il token di Google Recaptcha
        $token_recaptcha = $request['g-recaptcha-response'];

        // Faccio chiamata alle API di Google per verificare la richiesta
        $response = Http::get('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => '6LeMES8aAAAAAJ56vOzNoORCxsDRjUYHM-ssZm7h',
            'response' => $token_recaptcha,
        ]);

        // Se $response success ritorna 1 posso inviare email
        if ($response['success']) {
            Mail::send('email', [
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'comment' => $request->get('comment') ],
                function ($message) {
                    $message->from('draper87@gmail.com');
                    $message->to('draper87@gmail.com', 'Oliver')
                        ->subject('Messaggio da Laptop-Easy');
                });

            return back()->with('success', 'Thanks for contacting us, We will get back to you soon!');
        } else {
            return back()->with('danger', 'Something went wrong!');
        }


    }
}
