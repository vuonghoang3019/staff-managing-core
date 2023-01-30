<?php

namespace Admin\Repositories\Teacher;

use App\Models\Grade;
use App\Models\Role;
use App\Models\User;
use Admin\Repositories\BaseRepository;

class TeacherRepository extends BaseRepository implements TeacherRepositoryInterface
{

    public function getModel()
    {
        return User::class;
    }

    public function paginate()
    {
        return $this->model->newQuery()->with(['grades', 'roles'])->orderBy('id', 'asc')->paginate(5);
    }

    public function getGrades()
    {
        return Grade::all();
    }

    public function getRoles()
    {
        return Role::all();
    }
}
