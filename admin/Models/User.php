<?php

namespace Admin\Models;

use Admin\Models\Columns\UserColumn;
use Admin\Traits\HasUuid;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, HasUuid, UserColumn;

    protected $table = 'tbUser';

    public static string $Name = 'user';

    protected $primaryKey = 'Id';

    protected $fillable = [
        'Id',
        'DisplayName',
        'Code',
        'Email',
        'Password',
        'ImagePath',
        'Status',
        'Remark',
        'CodeReset',
        'CodeTime',
        'CreatedDate',
        'CreatedBy',
        'ChangedDate',
        'ChangedBy',
    ];

    public function grades()
    {
        return $this->belongsToMany(Grade::class, 'user_grade', 'user_id', 'grade_id');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
    }

    //check one role (check user one role)
    public function hasRole($role)
    {
        return null !== $this->roles()->where('name', $role)->first();
    }

    //check multiple role (check user one-to-many role)
    public function hasAnyRole($roles)
    {
        return null !== $this->roles()->whereIn('code', $roles)->first();
    }

    public function authorizeRoles($roles)
    {
        if (is_array($roles)) {
            return $this->hasAnyRole($roles) || abort(401, 'This action is unauthorized.');
        }
        return $this->hasRole($roles) || abort(401, 'This action is unauthorized.');
    }

    public function checkPermission($permissionCheck)
    {
        $roles = auth()->user()->roles;
        foreach ($roles as $role)
        {
            $permission = $role->permission_role;
            if ($permission->contains('value', $permissionCheck)) {
                return true;
            }
        }
        return false;
    }

    public function checkRole($roleCheck)
    {
        $roles = auth()->user()->roles;
        foreach ($roles as $role)
        {
            if ($role->code == $roleCheck) {
                return true;
            }
        }
        return false;
    }

}
