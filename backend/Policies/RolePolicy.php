<?php

namespace Backend\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    public function view(User $user)
    {
        return $user->checkPermission('List_Role');
    }

    public function create(User $user)
    {
        return $user->checkPermission('Add_Role');
    }

    public function update(User $user)
    {
        return $user->checkPermission('Update_Role');
    }

    public function delete(User $user)
    {
        return $user->checkPermission('Delete_Role');
    }
}
