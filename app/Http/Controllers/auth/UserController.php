<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\FrontendController;
use App\Http\Requests\update\UserRequestUpdate;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Modules\Admin\Traits\StorageImageTrait;

class UserController extends FrontendController {
    private $student;
    private $course;
    use StorageImageTrait;

    public function __construct(Student $student, Course $course)
    {
        parent::__construct();
        $this->student = $student;
        $this->course = $course;
    }

    public function index($id)
    {
        $studentDetail = $this->student->findOrFail($id);
        $studentClassroom = $studentDetail->classroom;
        $courses = $this->course->newQuery()->with('classroom')->get();
        return view('auth.userInfo', compact('studentDetail', 'studentClassroom', 'courses'));
    }


}
