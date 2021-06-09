<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Course;
use App\Models\Price;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends FrontendController
{
    private $course;
    private $classroom;
    private $price;

    public function __construct(Course $course, Classroom $classroom, Price $price)
    {
        parent::__construct();
        $this->course = $course;
        $this->classroom = $classroom;
        $this->price = $price;
    }

    public function index()
    {
        $courses = $this->course->paginate(4);

        return view('course.course', compact('courses'));
    }

    public function detail($id)
    {
        $classrooms = $this->classroom
            ->newQuery()
            ->join('students', 'students.classroom_id', '=', 'classrooms.id')
            ->join('courses', 'courses.id', '=', 'classrooms.course_id')
            ->where('courses.id', $id)
            ->get();
        $prices = $this->price->newQuery()->with(['course'])->where([
            ['course_id','=',$id],
            ['price','>',0]
        ])->whereNotNull('price')->get();
        $courseDetail = $this->course->findOrFail($id);
        return view('course.courseDetail', compact('courseDetail', 'classrooms','prices'));
    }

    public function showCart($idPrice,$idCourse)
    {
        $prices = $this->price->findOrFail($idPrice);
        $courseDetail =  $this->course->findOrFail($idCourse);
        return view('cart.cart',compact('prices','courseDetail'));
    }
}
