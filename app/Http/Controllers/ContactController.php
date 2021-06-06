<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequestAdd;
use App\Models\Category;
use App\Models\Contact;

class ContactController extends Controller
{
    private $category;
    private $contact;

    public function __construct(Category $category, Contact $contact)
    {
        $this->category = $category;
        $this->contact = $contact;
    }

    public function index()
    {
        $categories = $this->category->newQuery()->with(['categoryChild'])->where('parent_id', 0)->limit(6)->get();
        return view('contact', compact('categories'));
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
