<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequestAdd;
use App\Models\Contact;

class ContactController extends FrontendController
{
    private $contact;

    public function __construct(Contact $contact)
    {
        parent::__construct();
        $this->contact = $contact;
    }

    public function index()
    {
        return view('contact');
    }

    public function store(ContactRequestAdd $request)
    {
        $this->contact->name_parent = $request->name_parent;
        $this->contact->phone = $request->phone;
        $this->contact->name_student = $request->name_student;
        $this->contact->email = $request->email;
        $this->contact->content = $request->Content;
        $this->contact->save();
        return redirect()->back()->with('success', 'Thao tác thành công');
    }

}
