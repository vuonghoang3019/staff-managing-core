<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Calendar;
use App\Models\Classroom;
use App\Models\Course;
use App\Models\Schedule;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Carbon;

class AdminScheduleController extends Controller
{
    private $classroom;
    private $teacher;
    private $course;
    private $calendar;
    private $schedule;

    public function __construct(Classroom $classroom, Teacher $teacher, Course $course, Calendar $calendar, Schedule $schedule)
    {
        $this->classroom = $classroom;
        $this->teacher = $teacher;
        $this->course = $course;
        $this->calendar = $calendar;
        $this->schedule = $schedule;
    }

    public function index()
    {
        $schedules = $this->schedule->newQuery()->with(['calendar'])->get();
        return view('admin::schedule.index');
    }

    public function create()
    {
        $classrooms = $this->classroom->newQuery()->with(['course'])->get();
        $teachers = $this->teacher->newQuery()->with(['grade'])->get();
        $courses = $this->course->newQuery()->with(['course_grade'])->get();
        return view('admin::schedule.add', compact('classrooms', 'teachers', 'courses'));
    }

    public function store(Request $request)
    {
        if ($request->start_time < $request->end_time)
        {
            $schedule = $this->schedule->newQuery()->where('start_time', '<')->create([
                'teacher_id' => $request->teacher_id,
                'course_id' => $request->course_id,
                'classroom_id' => $request->classroom_id
            ]);
            $this->calendar->create([
                'day' => $request->day,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
                'schedule_id' => $schedule->id
            ]);
            return redirect()->back()->with('success', 'Thêm mới thành công');
        }
        else
        {
            return redirect()->back()->with('error', 'End time không được nhỏ hơn Start time');
        }

    }

}
