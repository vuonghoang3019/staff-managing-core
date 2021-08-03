<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class FrontendController extends Controller
{
    public function __construct()
    {
        $courses = DB::table(Course::$name)->where('is_active',1)->get();
        $teachers = DB::table(User::$name)->select('is_check')->distinct()->get();
        $data = [
            'courses' => $courses,
            'teachers' => $teachers
        ];
        View::share('data',$data);
    }
}
