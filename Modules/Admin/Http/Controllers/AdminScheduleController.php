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
use Modules\Admin\Http\Requests\ScheduleRequestAdd;

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
        dd($schedules);
        return view('admin::schedule.index', compact('schedules'));
    }

    public function create()
    {
        $classrooms = $this->classroom->newQuery()->with(['course'])->get();
        $teachers = $this->teacher->newQuery()->with(['grade'])->get();
        $courses = $this->course->newQuery()->with(['course_grade'])->get();
        return view('admin::schedule.add', compact('classrooms', 'teachers', 'courses'));
    }


    public function getTime()
    {
        return $this->schedule->newQuery()->with(['calendar' => function ($query) {
            $query->select('start_time', 'end_time');
        }])->get();
    }

    public function store(Request $request)
    {
//        $startTime = Carbon::parse($request->start_time);
//        $endTime = Carbon::parse($request->end_time);
        $calendar = $this->calendar->create([
            'day' => $request->day,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ]);
        $this->schedule->create([
            'teacher_id' => $request->teacher_id,
            'course_id' => $request->course_id,
            'classroom_id' => $request->classroom_id,
            'calendar_id' => $calendar->id
        ]);

        return redirect()->back()->with('success', 'Thêm mới thành công');
    }

}
