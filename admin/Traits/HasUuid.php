<?php

namespace Admin\Traits;

use Illuminate\Support\Str;

/**
 * @method static creating(\Closure $param)
 */
trait HasUuid
{
    /**
     * Generate uuid on creating model event
     * @return void
     */
    protected static function bootHasUuid(): void
    {
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = Str::uuid()->toString();
            }
        });
    }
}
