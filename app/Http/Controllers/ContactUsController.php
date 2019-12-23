<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactUsFormRequest;
use Illuminate\Http\Request;
use App\ContactUs;

class ContactUsController extends Controller
{
    
    public function create()
    {
        return \view("misc.contact");
    }

    public function store(ContactUsFormRequest $request)
    {
        $contact = new ContactUs(array(
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'username' => $request->get('username')
        ));

        $contact->save();

        return \redirect('/contact')->with('status', __('alerts.message_submitted'));
    }
}
