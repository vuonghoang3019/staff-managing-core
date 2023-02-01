<?php

namespace admin\Http\Controllers;

use admin\Repositories\Schedule\ScheduleRepositoryInterface;
use Illuminate\Http\Request;
use admin\Http\Requests\Schedule\ScheduleRequestAdd;
use admin\Http\Requests\Schedule\ScheduleRequestUpdate;
use function GuzzleHttp\Promise\all;

class ScheduleController extends FrontendController
{

    private $scheduleRepo;

    public function __construct(ScheduleRepositoryInterface $scheduleRepo)
    {
        parent::__construct();
        $this->scheduleRepo = $scheduleRepo;
    }

    public function index()
    {
        $weeks = $this->scheduleRepo->getWeek();
        $schedules = $this->scheduleRepo->paginate();
        return view('admin::schedule.index', compact('schedules', 'weeks'));
    }

    public function create()
    {
        $classrooms = $this->scheduleRepo->getClassrooms();
        $users = $this->scheduleRepo->getUsers();
        $weeks = $this->scheduleRepo->getWeek();
        $rooms = $this->scheduleRepo->getRooms();
        return view('admin::schedule.create', compact('classrooms', 'users', 'weeks', 'rooms'));
    }

    public function store(ScheduleRequestAdd $request)
    {
        $validate = $this->scheduleRepo->countTeacher($request);
        if ($validate >= 3) {
            return redirect()->back()->with('error', 'Môn học và thầy giáo đã quá lịch');
        } else {
            $this->scheduleRepo->create($request->all());
        }
        return redirect()->back()->with('success', 'Đặt lịch thành công');
    }

    public function edit($id)
    {
        $weeks = $this->scheduleRepo->getWeek();
        $classrooms = $this->scheduleRepo->getClassrooms();
        $users = $this->scheduleRepo->getUsers();
        $scheduleEdit = $this->scheduleRepo->detailSchedule($id);
        $rooms = $this->scheduleRepo->getRooms();
        return view('admin::schedule.edit', compact('classrooms', 'users', 'scheduleEdit', 'weeks', 'rooms'));
    }

    public function update(ScheduleRequestUpdate $request, $id)
    {
        $validate = $this->scheduleRepo->countTeacher($request);
        if ($validate >= 3) {
            return redirect()->back()->with('error', 'Môn học và thầy giáo đã quá lịch');
        } else {
            $this->scheduleRepo->update($id, $request->all());
            return redirect()->back()->with('success', 'Cập nhật thành công');
        }
    }

    public function delete($id)
    {
        return $this->scheduleRepo->delete($id);
    }

    public function ajaxGetSelect(Request $request)
    {
        return $this->scheduleRepo->getSelect($request);
    }

}
