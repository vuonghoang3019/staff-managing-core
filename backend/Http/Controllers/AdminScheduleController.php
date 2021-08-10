<?php

namespace Backend\Http\Controllers;

use App\Models\Classroom;
use App\models\Room;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;
use Backend\Http\Requests\Schedule\ScheduleRequestAdd;
use Backend\Http\Requests\Schedule\ScheduleRequestUpdate;
use Backend\Traits\DeleteTrait;

class AdminScheduleController extends FrontendController {

    use DeleteTrait;

    private $classroom;

    private $user;

    private $schedule;

    private $room;

    public function __construct(Classroom $classroom, User $user, Schedule $schedule, Room $room)
    {
        parent::__construct();
        $this->classroom = $classroom;
        $this->user = $user;
        $this->schedule = $schedule;
        $this->room = $room;
    }

    public function index()
    {
        $weeks = $this->schedule->getWeek();
        $schedules = $this->schedule->newQuery()->with(['room', 'user', 'class'])->orderBy('weekday', 'asc')->paginate(10);
        return view('backend::schedule.index', compact('schedules', 'weeks'));
    }

    public function create()
    {
        $classrooms = $this->classroom->newQuery()->with(['course'])->get();
        $users = $this->user->newQuery()->with(['grades'])->get();
        $weeks = $this->schedule->getWeek();
        $rooms = $this->room->where('is_active', 0)->get();
        return view('backend::schedule.create', compact('classrooms', 'users', 'weeks', 'rooms'));
    }

    public function store(ScheduleRequestAdd $request)
    {
        $validate = $this->schedule->countNumber($request->user_id, $request->classroom_id, $request->weekday);
        if ($validate >= 3) {
            return redirect()->back()->with('error', 'Môn học và thầy giáo đã quá lịch');
        } else {
            $this->schedule->weekday = $request->weekday;
            $this->schedule->room_id = $request->room_id;
            $this->schedule->user_id = $request->user_id;
            $this->schedule->classroom_id = $request->classroom_id;
            $this->schedule->start_time = $request->start_time;
            $this->schedule->end_time = $request->end_time;
            $this->schedule->save();
        }

        return redirect()->back()->with('success', 'Đặt lịch thành công');
    }

    public function edit($id)
    {
        $weeks = $this->schedule->getWeek();
        $classrooms = $this->classroom->newQuery()->with(['course'])->get();
        $users = $this->user->newQuery()->with(['grades'])->get();
        $scheduleEdit = $this->schedule->with(['room', 'user', 'class'])->findOrFail($id);
        $rooms = $this->room->where('is_active', 0)->get();
        return view('backend::schedule.edit', compact('classrooms', 'users', 'scheduleEdit', 'weeks', 'rooms'));
    }

    public function update(ScheduleRequestUpdate $request, $id)
    {
        $validate = $this->schedule->countNumber($request->user_id, $request->classroom_id, $request->weekday);
        if ($validate >= 3) {
            return redirect()->back()->with('error', 'Môn học và thầy giáo đã quá lịch');
        } else {
            $scheduleEdit = $this->schedule->findOrFail($id);
            $scheduleEdit->weekday = $request->weekday;
            $scheduleEdit->room_id = $request->room_id;
            $scheduleEdit->user_id = $request->user_id;
            $scheduleEdit->classroom_id = $request->classroom_id;
            $scheduleEdit->start_time = $request->start_time;
            $scheduleEdit->end_time = $request->end_time;
            $scheduleEdit->save();
            return redirect()->back()->with('success', 'Cập nhật thành công');
        }
    }

    public function delete($id)
    {
        return $this->deleteModelTrait($id, $this->schedule);
    }

    public function ajaxGetSelect(Request $request)
    {
        if ($request->get('id')) {
            $id = $request->get('id');
            $classrooms = $this->classroom->newQuery()->with('course')->findOrFail($id);
            $classroomGrade = $classrooms->course->course_grade;
            $users = $this->user->newQuery()->with(['grades'])->get();
            $output = '';
            foreach ($classroomGrade as $classroom) {
                foreach ($users as $user) {
                    foreach ($user->grades as $item) {
                        if ($item->name == $classroom->name) {
                            $output .= '<option value="' . $user->id . '">' . $user->name . '</option>';
                        }
                    }
                }
                return response($output);
            }
        }
    }

}
