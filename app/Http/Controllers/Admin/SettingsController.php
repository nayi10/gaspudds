<?php

namespace App\Http\Controllers\Admin;

use App\About;
use App\ContactUs;
use App\Http\Controllers\Controller;
use App\Http\Requests\AboutFormRequest;
use App\Http\Requests\MailFormRequest;

class SettingsController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function storeAbout(AboutFormRequest $request)
    {
        $about = new About(array(
            'title' => $request->get('title'),
            'content' => $request->get('content')
        ));

        $filename = 'about.json';

        $json = json_encode($about);
        file_put_contents($filename, $json);

        return redirect()->back()->with('status', "About content has been added");
    }

    public function editAbout()
    {
        $file = 'about.json';
        if(file_exists($file)){
            $json = file_get_contents($file);
            
            $contents = json_decode($json);
        } else {
            $contents = ['title' => null, 'content' => null];
        }

        return \view('admin.about.edit')->with('about', $contents);
    }

    public function updateEmail(MailFormRequest $request)
    {
        $email = $request->get('email');

        file_put_contents('mail-config.json', json_encode(['email'=>$email]));

        return redirect()->back()->with('status', "Mail preferences updated");
    }

    public function showMessage(string $slug)
    {
        $contact = ContactUs::whereSlug($slug)->firstOrFail();
        return \view('admin.contacts.show')->with('contact', $contact);
    }

    public function showMessages()
    {
        $contacts = ContactUs::all();
        return \view('admin.contacts.index')->with('contacts', $contacts);
    }

    public function deleteMessage($slug){
        $affected = ContactUs::whereSlug($slug)->delete();

        if($affected == 1){
            $status = "Message has been deleted";
            return redirect()->back()->with('status', $status);
        } else {
            $err = "Message could not be deleted";
            return \redirect()->back()->with('error', $err);
        }
    }
}
