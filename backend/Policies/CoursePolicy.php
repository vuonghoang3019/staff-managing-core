<?php

namespace Backend\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CoursePolicy
{
    use HandlesAuthorization;

    public function view(User $user)
    {
        return $user->checkPermission('List_Course');
    }

    public function create(User $user)
    {
        return $user->checkPermission('Add_Course');
    }

    public function update(User $user)
    {
        return $user->checkPermission('Update_Course');
    }

    public function delete(User $user)
    {
        return $user->checkPermission('Delete_Course');
    }
}
