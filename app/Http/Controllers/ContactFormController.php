<?php

namespace App\Http\Controllers;

use App\Contactform;
use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
    public function create()
    {
        return view('contact.create');
    }

    public function store(Request $request)
    {

        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        //save in database
        $contactform = new Contactform();
        $contactform->name = $request->name;
        $contactform->email = $request->email;
        $contactform->message = $request->message;
        $contactform->save();

        //send an email
        Mail::to($contactform->email)->send(new ContactFormMail($data));

        return view('contact.received');

    }
}
