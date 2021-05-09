<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Calendar;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Requests\CalendarRequestAdd;
use Modules\Admin\Traits\DeleteTrait;

class AdminCalendarController extends Controller
{
    use DeleteTrait;
    private $calendar;
    public function __construct(Calendar $calendar)
    {
        $this->calendar = $calendar;
    }

    public function index()
    {
        $calendars = $this->calendar->paginate(5);
        return view('admin::calendar.index',compact('calendars'));
    }

    public function create()
    {
        return view('admin::calendar.add');
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
        $calendarUpdate = $this->calendar->findOrFail($id);
        return view('admin::calendar.edit',compact('calendarUpdate'));
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
