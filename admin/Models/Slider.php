<?php

namespace Admin\Models;

use Admin\Models\Columns\SliderColumn;
use Admin\Traits\HasUuid;

class Slider extends BaseModel
{
    use HasUuid, SliderColumn;

    protected $table = 'tbSlider';

    public static string $Name  = 'tbSlider';

    protected $primaryKey = 'Id';

    protected $fillable = [
        'Id',
        'DisplayName',
        'Remark',
        'ImagePath',
        'Status',
    ];
}
