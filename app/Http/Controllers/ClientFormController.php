<?php

namespace App\Http\Controllers;

use App\ContactMessage;
use App\Http\Requests\ContactFormRequest;
use App\Mail\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ClientFormController extends Controller
{
    public function contact(ContactFormRequest $request)
    {
        $contactMessage = ContactMessage::create($request->all());

        Mail::send(new Contact($contactMessage));

        return view("pages.contact", ["isOkay" => true]);
    }

    /*
     * TODO
     */

    public function subscribe(Request $request){}
}
