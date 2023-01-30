<?php

namespace Admin\Http\Controllers;

use App\Models\Contact;
use Admin\Repositories\Contact\ContactRepositoryInterface;

class AdminContactController extends FrontendController
{

    private $contactRepo;

    public function __construct(ContactRepositoryInterface $contactRepo)
    {
        parent::__construct();
        $this->contactRepo = $contactRepo;
    }

    public function index()
    {
        $contactsView = $this->contactRepo->paginate();
        return view('backend::contact.index',compact('contactsView'));
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
        return view('backend::contact.view',compact('contactDetail'));
    }
}
