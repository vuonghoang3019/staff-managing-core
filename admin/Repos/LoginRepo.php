<?php

namespace Admin\Repos;

use Admin\Models\Login;
use Admin\Models\User;
use Illuminate\Container\Container as Application;

class LoginRepo extends BaseRepo
{
    public function __construct(Application $app)
    {
        parent::__construct($app);
    }

    public function model(): string
    {
        return Login::class;
    }

    public function login(string $token, bool $pass = false)
    {
        $select = [
            Login::$_All,
            User::$_All
        ];

        $query = $this->query();

        if ($pass) $select[] = User::$_Password;

        return $query
            ->join(User::$Name, Login::$_UserId, User::$_Id)
            ->where(Login::$_Token, $token)
            ->select($select)
            ->first();
    }
}
