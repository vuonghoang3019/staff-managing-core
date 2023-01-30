<?php

namespace admin\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClassroomPolicy
{
    use HandlesAuthorization;
    public function view(User $user)
    {
        return $user->checkPermission('List_Classroom');
    }

    public function create(User $user)
    {
        return $user->checkPermission('Add_Classroom');
    }

    public function update(User $user)
    {
        return $user->checkPermission('Update_Classroom');
    }

    public function delete(User $user)
    {
        return $user->checkPermission('Delete_Classroom');
    }
}
