<?php

namespace Admin\Http\Controllers;

use App\Models\Schedule;
use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Admin\Services\CalendarService;

class AdminController extends FrontendController {
    private $schedule;
    private $user;

    public function __construct(Schedule $schedule, User $user)
    {
        parent::__construct();
        $this->schedule = $schedule;
        $this->user = $user;
    }

    public function index()
    {
        $weekDays = $this->schedule->getWeek();
//        $calendarData = $calendarService->generateCalendarData($weekDays);
//        $userCheck =  $this->user->checkRole('SA');
//        if ($userCheck)
//        {

            $schedules = $this->schedule->newQuery()->with(['user', 'class', 'room'])->orderBy(DB::raw('HOUR(start_time)'))->get();
//        }
//        else
//        {
//            $scheduleDetail = $this->schedule->newQuery()->with(['user', 'class', 'room'])->get();
//            $schedules = $scheduleDetail->where('user.id','=',Auth::user()->id)->all();
//        }
        return view('backend::index', compact('weekDays', 'schedules'));
    }
}
