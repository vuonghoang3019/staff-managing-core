<?php

namespace Modules\Admin\Policies;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;

    public function view(User $user)
    {
        return $user->checkPermission('list_Category');
    }

    public function create(User $user)
    {
        return $user->checkPermission('add_Category');
    }

    public function update(User $user)
    {
        return $user->checkPermission('update_Category');
    }

    public function delete(User $user)
    {
        return $user->checkPermission('delete_Category');
    }


}
