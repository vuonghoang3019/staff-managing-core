<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Routing\Controller;
use Modules\Admin\Services\CalendarService;

class AdminController extends FrontendController
{
    private $schedule;

    public function __construct(Schedule $schedule)
    {
        parent::__construct();
        $this->schedule = $schedule;
    }

    public function index(CalendarService $calendarService)
    {
        $weekDays = $this->schedule->getWeek();
        $calendarData = $calendarService->generateCalendarData($weekDays);
        return view('admin::index', compact('weekDays', 'calendarData'));
    }


}
