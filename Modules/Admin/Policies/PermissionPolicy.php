<?php

namespace Modules\Admin\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PermissionPolicy
{
    use HandlesAuthorization;

    public function view(User $user)
    {
        return $user->checkPermission('List_Permission');
    }

    public function create(User $user)
    {
        return $user->checkPermission('Add_Permission');
    }

    public function update(User $user)
    {
        return $user->checkPermission('Update_Permission');
    }

    public function delete(User $user)
    {
        return $user->checkPermission('Delete_Permission');
    }
}
