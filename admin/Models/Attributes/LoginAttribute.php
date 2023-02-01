<?php

namespace Admin\Models\Attributes;

use Admin\Configs\Auth;
use Carbon\Carbon;
use Admin\Configs\Config;

trait LoginAttribute
{
    public function validDate(): bool
    {
        return Carbon::parse($this->ValidTo)->greaterThanOrEqualTo(Carbon::now());
    }

    public function increaseValidDate(): bool
    {
        $this->ValidTo = Carbon::now()->addMinutes(Auth::TOKEN_ALIVE)->format(Config::DATETIME_FULL);

        return $this->save();
    }

    public function removed(): bool
    {
        return $this->AccountDeleted == Config::TRUE || $this->PeopleDeleted == Config::TRUE;
    }

    public function disabled(): bool
    {
        return $this->AccountStatus == Config::BLOCKED || $this->PeopleStatus == Config::BLOCKED;
    }

    public function isValidPlatform($platform): bool
    {
        return in_array($platform, explode(Config::COMMA, $this->Platform));
    }
}
