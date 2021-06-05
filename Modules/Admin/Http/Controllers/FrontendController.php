<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Contact;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\View;

class FrontendController extends Controller
{
    public function __construct()
    {
        $contacts = Contact::all()->where('status',0);
        View::share('contacts',$contacts);
    }
}
