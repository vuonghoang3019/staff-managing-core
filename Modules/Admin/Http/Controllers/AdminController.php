<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Services\CalendarService;

class AdminController extends Controller
{
    private $schedule;

    public function __construct(Schedule $schedule)
    {
        $this->schedule = $schedule;
    }

    public function index(CalendarService $calendarService)
    {
        $weekDays = $this->schedule->getWeek();
        $calendars = $calendarService->generateCalendarData($weekDays);
        return view('admin::index', compact('weekDays','calendars'));
    }

}
