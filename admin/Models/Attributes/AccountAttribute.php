<?php

namespace Admin\Models\Attributes;

use Admin\Configs\Auth;
use Illuminate\Support\Facades\Hash;
use Admin\Configs\Config;

trait AccountAttribute
{
    public function removed(): bool
    {
        return $this->Deleted == Config::TRUE;
    }

    public function disabled(): bool
    {
        return $this->Status == Config::BLOCKED;
    }

    public function maxAttempts(): bool
    {
        return $this->FailedLoginAttempts >= Auth::MAX_ATTEMPTS;
    }

    public function lock(): bool
    {
        $this->Status = Config::BLOCKED;

        return $this->save();
    }

    public function increaseAttempts(): bool
    {
        $this->FailedLoginAttempts += Auth::INCREASE_ATTEMPTS;

        return $this->save();
    }

    public function clearAttempts(): bool
    {
        $this->FailedLoginAttempts = Auth::CLEAR_ATTEMPTS;

        return $this->save();
    }

    public function synced(): bool
    {
        return intval($this->Sync) === Auth::SYNCHRONIZED;
    }

    public function notifyEmail(): bool
    {
        return in_array(AUTH::EMAIL, explode(Config::COMMA, $this->Notifications));
    }

    public function notifySMS(): bool
    {
        return in_array(AUTH::SMS, explode(Config::COMMA, $this->Notifications));
    }

    public function requireNotify(): bool
    {
        return $this->notifyEmail() || $this->notifySMS();
    }

    public function loginDB($password): bool
    {
        return Hash::check($password, $this->Password);
    }
}
