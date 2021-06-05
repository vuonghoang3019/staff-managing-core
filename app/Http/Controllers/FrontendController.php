<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\View;

class FrontendController extends Controller
{
    public function __construct()
    {
        $categories = Category::with('categoryChild')->where('parent_id',0);
        View::share('categories',$categories);
    }
}
