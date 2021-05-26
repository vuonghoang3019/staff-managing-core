<?php

namespace Modules\Admin\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TeacherPolicy
{
    use HandlesAuthorization;

    public function view(User $user)
    {
        return $user->checkPermission('List_Teacher');
    }

    public function create(User $user)
    {
        return $user->checkPermission('Add_Teacher');
    }

    public function update(User $user)
    {
        return $user->checkPermission('Update_Teacher');
    }

    public function delete(User $user)
    {
        return $user->checkPermission('Delete_Teacher');
    }
}
