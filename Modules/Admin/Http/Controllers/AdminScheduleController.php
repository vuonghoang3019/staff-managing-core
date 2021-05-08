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
        $schedules = $this->schedule->newQuery()->with(['calendar','teacher','class','course'])->get();
        DB::connection()->enableQueryLog();
        $this->schedule->validateTime('Monday','07:30:00');
        $queries = DB::getQueryLog();
        dd($queries);
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

    public function store(ScheduleRequestAdd $request)
    {
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

    public function edit($id)
    {
        $classrooms = $this->classroom->newQuery()->with(['course'])->get();
        $teachers = $this->teacher->newQuery()->with(['grade'])->get();
        $courses = $this->course->newQuery()->with(['course_grade'])->get();
        $scheduleEdit = $this->schedule->with(['calendar','teacher','class','course'])->findOrFail($id);
        return view('admin::schedule.edit', compact('classrooms', 'teachers', 'courses','scheduleEdit'));
    }

    public function update(ScheduleRequestAdd $request, $id)
    {
        $scheduleUpdate = $this->schedule->find($id);
        $scheduleUpdate->update([
            'teacher_id' => $request->teacher_id,
            'course_id' => $request->course_id,
            'classroom_id' => $request->classroom_id,
        ]);
        $calendarUpdate = $this->calendar->newQuery()->where('id',$scheduleUpdate->calendar_id);
        $calendarUpdate->update([
            'day'  =>  $request->day,
            'start_time'  =>  $request->start_time,
            'end_time'  =>  $request->end_time,
        ]);
        return redirect()->back()->with('success', 'Cập nhật thành công');
    }

    public function delete($id)
    {
        try
        {
            $scheduleDelete = $this->schedule->find($id);
            $scheduleDelete->delete();
            $this->calendar->newQuery()->where('id',$scheduleDelete->calendar_id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'success'
            ],200);
        }
        catch (\Exception $exception)
        {
            Log::error('Message'. $exception->getMessage(). 'Line' .$exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail'
            ],500);
        }
    }

}
