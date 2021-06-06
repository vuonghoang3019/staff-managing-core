<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Support\Facades\View;

class FrontendController extends Controller
{
    public function __construct()
    {
        $courses = Course::all()->where('status',1);
        View::share('courses',$courses);
    }
}
