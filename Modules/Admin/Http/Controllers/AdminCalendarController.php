<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Calendar;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Requests\CalendarRequestAdd;
use Modules\Admin\Traits\DeleteTrait;

class AdminCalendarController extends Controller
{
    use DeleteTrait;
    private $schedule;
    private $calendar;
    public function __construct(Calendar $calendar, Schedule $schedule)
    {
        $this->calendar = $calendar;
        $this->schedule = $schedule;
    }

    public function index()
    {
        $weeks = $this->schedule->getWeek();
        $calendars = $this->calendar->paginate(5);
        return view('admin::calendar.index',compact('calendars','weeks'));
    }

    public function create()
    {
        $weeks = $this->schedule->getWeek();
        return view('admin::calendar.add',compact('weeks'));
    }

    public function store(CalendarRequestAdd $request)
    {

        $this->calendar->day = $request->day;
        $this->calendar->start_time = $request->start_time;
        $this->calendar->end_time = $request->end_time;
        $this->calendar->save();
        return redirect()->back()->with('success','Thêm thành công');
    }

    public function edit($id)
    {
        $weeks = $this->schedule->getWeek();
        $calendarUpdate = $this->calendar->findOrFail($id);
        return view('admin::calendar.edit',compact('calendarUpdate','weeks'));
    }

    public function update(CalendarRequestAdd $request, $id)
    {
        $calendarUpdate = $calendarUpdate = $this->calendar->findOrFail($id);
        $calendarUpdate->day = $request->day;
        $calendarUpdate->start_time = $request->start_time;
        $calendarUpdate->end_time = $request->end_time;
        $calendarUpdate->save();
        return redirect()->back()->with('success','Thêm thành công');
    }

    public function delete($id)
    {
        return $this->deleteModelTrait($id, $this->calendar);
    }


}
