<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use Illuminate\Http\Request;

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

    public function store(Request $request)
    {
        $this->contact->name_parent = $request->name_parent;
        $this->contact->phone = $request->phone;
        $this->contact->name_student = $request->name_student;
        $this->contact->email = $request->email;
        $this->contact->save();
        return response()->json([
            'code' => 200,
            'message' => 'success'
        ],200);
    }
}
