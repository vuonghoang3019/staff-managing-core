<?php

namespace Modules\Admin\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CalendarPolicy
{
    use HandlesAuthorization;

    public function view(User $user)
    {
        return $user->checkPermission('List_Calendar');
    }

    public function create(User $user)
    {
        return $user->checkPermission('Add_Calendar');
    }

    public function update(User $user)
    {
        return $user->checkPermission('Update_Calendar');
    }

    public function delete(User $user)
    {
        return $user->checkPermission('Delete_Calendar');
    }
}
