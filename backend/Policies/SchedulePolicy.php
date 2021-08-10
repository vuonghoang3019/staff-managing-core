<?php

namespace Backend\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SchedulePolicy
{
    use HandlesAuthorization;

    public function view(User $user)
    {
        return $user->checkPermission('List_Schedule');
    }

    public function create(User $user)
    {
        return $user->checkPermission('Add_Schedule');
    }

    public function update(User $user)
    {
        return $user->checkPermission('Update_Schedule');
    }

    public function delete(User $user)
    {
        return $user->checkPermission('Delete_Schedule');
    }
}
