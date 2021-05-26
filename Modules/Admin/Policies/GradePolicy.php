<?php

namespace Modules\Admin\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class GradePolicy
{
    use HandlesAuthorization;

    public function view(User $user)
    {
        return $user->checkPermission('List_Grade');
    }

    public function create(User $user)
    {
        return $user->checkPermission('Add_Grade');
    }

    public function update(User $user)
    {
        return $user->checkPermission('Update_Grade');
    }

    public function delete(User $user)
    {
        return $user->checkPermission('Delete_Grade');
    }

}
