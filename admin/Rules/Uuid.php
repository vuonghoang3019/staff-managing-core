<?php

namespace Admin\Rules;

use Illuminate\Contracts\Validation\Rule;
use Admin\Configs\Config;

class Uuid implements Rule
{
    public function passes($attribute, $value): bool
    {
        return preg_match(Config::UUID_REGEX, strtoupper($value));
    }

    public function message(): string
    {
        return __('Common.Uuid');
    }
}
