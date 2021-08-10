<?php

namespace Backend\Http\Controllers;

use App\Models\Contact;

class AdminContactController extends FrontendController
{
    private $contact;

    public function __construct(Contact $contact)
    {
        parent::__construct();
        $this->contact = $contact;
    }

    public function index()
    {
        $contactsView = $this->contact->paginate(5);
        return view('backend::contact.index',compact('contactsView'));
    }

    public function action($id)
    {
        $contactAction = $this->contact->findOrFail($id);
        $contactAction->is_active = $contactAction->is_active === 0 ? 1 : 0;
        $contactAction->save();
        return redirect()->back()->with('success', 'Cập nhật trạng thái thành công');
    }

    public function detail($id)
    {
        $contactDetail = $this->contact->findOrFail($id);
        $contactDetail->is_active = 1;
        $contactDetail->save();
        return view('backend::contact.view',compact('contactDetail'));
    }
}
