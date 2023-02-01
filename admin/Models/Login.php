<?php

namespace Admin\Models;

use Admin\Models\Attributes\LoginAttribute;
use Admin\Models\Columns\LoginColumn;
use Admin\Traits\HasUuid;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property string $ValidTo
 * @property mixed $AccountDeleted
 * @property mixed $PeopleDeleted
 * @property mixed $AccountStatus
 * @property mixed $PeopleStatus
 * @property mixed $Platform
 * @property mixed $Password
 */
class Login extends BaseModel
{
    use HasUuid, LoginColumn, LoginAttribute;

    public $table = "tbLogin";

    public static string $Name = "tbLogin";

    protected $primaryKey = 'Id';

    protected $keyType = 'string';

    protected $casts = [
        'Id' => 'string'
    ];

    protected $fillable = [
        'Id',
        'SiteId',
        'UserId',
        'Token',
        'ValidFrom',
        'ValidTo',
        'IP',
        'Agent',
        'Value',
        'Value1',
        'Value2',
        'Value3',
        'Value4',
        'Value5',
    ];

    public function Account(): BelongsTo
    {
        return $this->belongsTo(User::class, \Admin\Databases\Models\Login::$AccountId, Account::$Id);
    }
}
