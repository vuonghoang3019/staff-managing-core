<?php

namespace admin\Policies;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;

    public function view(User $user)
    {
        return $user->checkPermission('List_Category');
    }

    public function create(User $user)
    {
        return $user->checkPermission('Add_Category');
    }

    public function update(User $user)
    {
        return $user->checkPermission('Update_Category');
    }

    public function delete(User $user)
    {
        return $user->checkPermission('Delete_Category');
    }


}
