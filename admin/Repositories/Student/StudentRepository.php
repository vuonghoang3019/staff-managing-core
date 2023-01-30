<?php

namespace Admin\Repositories\Student;

use App\Models\Classroom;
use App\Models\Student;
use Admin\Repositories\BaseRepository;

class StudentRepository extends BaseRepository implements StudentRepositoryInterface
{

    public function getModel()
    {
        return Student::class;
    }

    public function paginate()
    {
        return $this->model->newQuery()->with(['classroom'])->orderBy('id', 'asc')->paginate(5);
    }

    public function getClassrooms()
    {
        return Classroom::all();
    }

    public function search($request)
    {
        if ($request->get('id')) {
            $id = $request->get('id');
            $students = $this->model->with(['classroom'])
                ->where('classroom_id', $id)
                ->get();
        }
        else
        {
            $query = $request->get('searchResult');
            $students = $this->model->with('classroom')
                ->where('name', 'like', '%' . $query . '%')
                ->orWhere('nation', 'like', '%' . $query . '%')
                ->get();
        }
            $output = '';
            foreach ($students as $student) {
                $output .= '<tr>
                    <td>' . $student->id . '</td>
                    <td><ul><li>' . $student->name . '</li><li>' . $student->email . '</li></ul></td>
                     <td>' . $student->code . '</td>
                     <td><ul><li>' . $student->birthday . '</li><li>' . $student->nation . '</li><li>' . $student->phone . '</li></ul></td>
                       <td>' . $student->classroom->name . '</td>
                       <td>'. $student->is_active .'</td>
                          <td><a class="btn btn-default" href="' . route('student.edit', ['id' => $student->id]) . '">Edit</a></td>
                          <td><a class="btn btn-danger action-delete" href="#" data-url="' . route('student.delete', ['id' => $student->id]) . '">Delete</a></td>
                    </tr>';
            }

            return response($output);

    }
}
