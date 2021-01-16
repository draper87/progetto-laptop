<?php

namespace App\Http\Controllers;

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

    }
}
