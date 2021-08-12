<?php

namespace Backend\Repositories\Schedule;

use App\Models\Classroom;
use App\Models\Room;
use App\Models\Schedule;
use App\Models\User;
use Backend\Repositories\BaseRepository;

class ScheduleRepository extends BaseRepository implements ScheduleRepositoryInterface
{
    public function getModel()
    {
        return Schedule::class;
    }

    public function paginate()
    {
        return $this->model->newQuery()->with(['room', 'user', 'class'])->orderBy('weekday', 'asc')->paginate(10);
    }

    public function getWeek()
    {
        return $this->model->getWeek();
    }

    public function getClassrooms()
    {
        return Classroom::with(['course'])->get();
    }

    public function getUsers()
    {
        return User::with(['grades'])->get();
    }

    public function getRooms()
    {
        return Room::where('is_active', 0)->get();
    }

    public function countTeacher($request)
    {
        return $this->model->countNumber($request->user_id, $request->classroom_id, $request->weekday);
    }

    public function getSelect($request)
    {
        if ($request->get('id'))
        {
            $id = $request->get('id');
            $classrooms = Classroom::with('course')->findOrFail($id);
            $classroomGrade = $classrooms->course->course_grade;
            $users = User::with('grades')->get();
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

    public function detailSchedule($id)
    {
        return $this->model->with(['room', 'user', 'class'])->findOrFail($id);
    }
}
