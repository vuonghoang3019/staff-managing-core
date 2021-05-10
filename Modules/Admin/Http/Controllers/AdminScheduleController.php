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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Modules\Admin\Http\Requests\ScheduleRequestAdd;
use Modules\Admin\Traits\DeleteTrait;

class AdminScheduleController extends Controller
{
    use DeleteTrait;

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
        $schedules = $this->schedule->newQuery()->with(['calendar', 'teacher', 'class', 'course'])->get();
        return view('admin::schedule.index', compact('schedules'));
    }

    public function create()
    {
        $classrooms = $this->classroom->newQuery()->with(['course'])->get();
        $teachers = $this->teacher->newQuery()->with(['grade'])->get();
        $courses = $this->course->newQuery()->with(['course_grade'])->get();
        $calendars = $this->calendar->newQuery()->get();
        return view('admin::schedule.add', compact('classrooms', 'teachers', 'courses', 'calendars'));
    }

    public function store(Request $request)
    {
        $validate = $this->schedule->countNumber($request->teacher_id, $request->classroom_id);
        if ($validate >= 3)
        {
            return redirect()->back()->with('error', 'Môn học và thầy giáo đã quá lịch');
        }
        else
        {
            $this->schedule->calendar_id = $request->calendar_id;
            $this->schedule->teacher_id = $request->teacher_id;
            $this->schedule->classroom_id = $request->classroom_id;
            $this->schedule->course_id = $request->course_id;
            $this->schedule->date_start = $request->date_start;
            $this->schedule->date_end = $request->date_end;
            $this->schedule->save();
            return redirect()->back()->with('success', 'Đặt lịch thành công');
        }
    }

    public function edit($id)
    {
        $classrooms = $this->classroom->newQuery()->with(['course'])->get();
        $teachers = $this->teacher->newQuery()->with(['grade'])->get();
        $courses = $this->course->newQuery()->with(['course_grade'])->get();
        $calendars = $this->calendar->newQuery()->get();
        $scheduleEdit = $this->schedule->with(['calendar', 'teacher', 'class', 'course'])->findOrFail($id);
        return view('admin::schedule.edit', compact('classrooms', 'teachers', 'courses', 'scheduleEdit','calendars'));
    }

    public function update(ScheduleRequestAdd $request, $id)
    {
        $validate = $this->schedule->countNumber($request->teacher_id, $request->classroom_id);
        if ($validate >= 3)
        {
            return redirect()->back()->with('error', 'Môn học và thầy giáo đã quá lịch');
        }
        else
        {
            $scheduleEdit = $this->schedule->findOrFail($id);
            $scheduleEdit->calendar_id = $request->calendar_id;
            $scheduleEdit->teacher_id = $request->teacher_id;
            $scheduleEdit->classroom_id = $request->classroom_id;
            $scheduleEdit->course_id = $request->course_id;
            $scheduleEdit->date_start = $request->date_start;
            $scheduleEdit->date_end = $request->date_end;
            $scheduleEdit->save();
            return redirect()->back()->with('success', 'Cập nhật thành công');
        }

    }

    public function delete($id)
    {
        return $this->deleteModelTrait($id, $this->schedule);
    }

}
