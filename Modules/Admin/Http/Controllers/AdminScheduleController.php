<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Calendar;
use App\Models\Classroom;
use App\Models\Course;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Requests\ScheduleRequestAdd;
use Modules\Admin\Traits\DeleteTrait;

class AdminScheduleController extends FrontendController
{
    use DeleteTrait;

    private $classroom;
    private $user;
    private $course;
    private $calendar;
    private $schedule;

    public function __construct(Classroom $classroom, User $user, Course $course, Calendar $calendar, Schedule $schedule)
    {
        parent::__construct();
        $this->classroom = $classroom;
        $this->user = $user;
        $this->course = $course;
        $this->calendar = $calendar;
        $this->schedule = $schedule;
    }

    public function index()
    {
        $weeks = $this->schedule->getWeek();
        $schedules = $this->schedule->newQuery()->with(['calendar', 'user', 'class'])->get();
        return view('admin::schedule.index', compact('schedules','weeks'));
    }

    public function create()
    {
        $classrooms = $this->classroom->newQuery()->with(['course'])->get();
        $users = $this->user->newQuery()->with(['grades'])->get();
        $calendars = $this->calendar->newQuery()->get();
        $weeks = $this->schedule->getWeek();
        return view('admin::schedule.add', compact('classrooms', 'users', 'calendars','weeks'));
    }

    public function store(ScheduleRequestAdd $request)
    {
        $validate = $this->schedule->countNumber($request->user_id, $request->classroom_id);
        if ($validate >= 3)
        {
            return redirect()->back()->with('error', 'Môn học và thầy giáo đã quá lịch');
        }
        else
        {
            $this->schedule->calendar_id = $request->calendar_id;
            $this->schedule->user_id = $request->user_id;
            $this->schedule->classroom_id = $request->classroom_id;
            $this->schedule->date_start = $request->date_start;
            $this->schedule->date_end = $request->date_end;
            $this->schedule->save();
            return redirect()->back()->with('success', 'Đặt lịch thành công');
        }
    }

    public function edit($id)
    {
        $weeks = $this->schedule->getWeek();
        $classrooms = $this->classroom->newQuery()->with(['course'])->get();
        $users = $this->user->newQuery()->with(['grades'])->get();
        $calendars = $this->calendar->newQuery()->get();
        $scheduleEdit = $this->schedule->with(['calendar', 'user', 'class'])->findOrFail($id);
        return view('admin::schedule.edit', compact('classrooms', 'users', 'scheduleEdit','calendars','weeks'));
    }

    public function update(ScheduleRequestAdd $request, $id)
    {
        $validate = $this->schedule->countNumber($request->user_id, $request->classroom_id);
        if ($validate >= 3)
        {
            return redirect()->back()->with('error', 'Môn học và thầy giáo đã quá lịch');
        }
        else
        {
            $scheduleEdit = $this->schedule->findOrFail($id);
            $scheduleEdit->calendar_id = $request->calendar_id;
            $scheduleEdit->user_id = $request->user_id;
            $scheduleEdit->classroom_id = $request->classroom_id;
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
