<?php

namespace Modules\Admin\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class StudentPolicy
{
    use HandlesAuthorization;

    public function view(User $user)
    {
        return $user->checkPermission('List_Student');
    }

    public function create(User $user)
    {
        return $user->checkPermission('Add_Student');
    }

    public function update(User $user)
    {
        return $user->checkPermission('Update_Student');
    }

    public function delete(User $user)
    {
        return $user->checkPermission('Delete_Student');
    }
}
