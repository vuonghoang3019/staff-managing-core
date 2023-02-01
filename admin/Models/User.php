<?php

namespace Admin\Models;

use Admin\Databases\Factories\AccountFactory;
use Admin\Models\Attributes\AccountAttribute;
use Admin\Models\Columns\UserColumn;
use Admin\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable, HasUuid, UserColumn, AccountAttribute;

    protected $table = 'tbUser';

    public static string $Name = 'tbUser';

    protected $primaryKey = 'Id';

    protected $keyType = 'string';

    protected $casts = ['Id' => 'string'];

    protected $hidden = ['Password'];

    public $timestamps = false;

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
        'FailedLoginAttempts'
    ];

    /**
     * Create a new factory instance for the model.
     *
     * @return Factory
     */
    protected static function newFactory()
    {
        return AccountFactory::new();
    }

    public function getJWTIdentifier() {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims() {
        return [];
    }

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
