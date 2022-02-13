<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $contacts=Contact::paginate(10);
        return view('admin.contacts.index',compact('contacts'));
    }

    public function submit(ContactRequest $request)
    {
        $input['name'] = $request->name;
        $input['email'] = $request->email;
        $input['subject'] = $request->subject;
        $input['message'] = $request->message;
        Contact::create($input);
        return redirect()->route('home')->with('success', 'Your Message submitted successfully');
    }

}
