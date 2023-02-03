<?php

namespace Admin\Http\Controllers;

use Admin\Models\Contact;

class ContactController extends BaseController
{

    private $contactRepo;

    public function __construct(ContactRepositoryInterface $contactRepo)
    {
        $this->contactRepo = $contactRepo;
    }

    public function index()
    {

    }

    public function action($id)
    {
        $contactAction = $this->contactRepo->detail($id);
        $contactAction->is_active = $contactAction->is_active === 0 ? 1 : 0;
        $contactAction->save();
        return redirect()->back()->with('success', 'Cập nhật trạng thái thành công');
    }

    public function detail($id)
    {
        $contactDetail = $this->contactRepo->detail($id);
        $contactDetail->is_active = 1;
        $contactDetail->save();
        return view('admin::contact.view',compact('contactDetail'));
    }
}
