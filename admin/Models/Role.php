<?php

namespace Admin\Models;

use Admin\Databases\Factories\RoleFactory;
use Admin\Models\Columns\RoleColumn;
use Admin\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\Factory;

class Role extends BaseModel
{
    use HasUuid, RoleColumn;

    protected $table = 'tbRole';

    public static string $Name = 'tbRole';

    protected $primaryKey = 'Id';

    protected $fillable = [
        'Id',
        'Code',
        'DisplayName',
        'Remark',
        'SortOrder'
    ];

    /**
     * Create a new factory instance for the model.
     *
     * @return Factory
     */
    protected static function newFactory()
    {
        return RoleFactory::new();
    }

    public function permission_role()
    {
        return $this->belongsToMany(Permission::class,'permission_role','role_id','permission_id');
    }

}
