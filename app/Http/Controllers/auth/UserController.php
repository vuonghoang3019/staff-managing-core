<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\FrontendController;
use App\Models\Student;
use Illuminate\Http\Request;

class UserController extends FrontendController
{
    private $student;

    public function __construct(Student $student)
    {
        parent::__construct();
        $this->student = $student;
    }

    public function index($id)
    {
        $studentDetail = $this->student->newQuery()->findOrFail($id);
        return view('auth.userInfo',compact('studentDetail'));
    }
}
