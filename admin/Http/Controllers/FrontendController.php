<?php

namespace admin\Http\Controllers;

use App\Models\Contact;
use Illuminate\Support\Facades\View;

class FrontendController extends BaseController
{
    public function __construct()
    {
        $contacts = Contact::all()->where('status',0);
        View::share('contacts',$contacts);
    }
}
