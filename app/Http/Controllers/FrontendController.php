<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class FrontendController extends Controller
{
    public function __construct()
    {
        $abouts = About::all();
        $categories = Category::with('categoryChild')->where('parent_id',0);
        View::share('abouts',$abouts);
    }
}
