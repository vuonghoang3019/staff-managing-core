<?php

namespace Admin\Repos;

use Admin\Models\User;
use Illuminate\Container\Container as Application;
use Prettus\Validator\Exceptions\ValidatorException;
use Admin\Configs\Config;

class UserRepo extends BaseRepo
{
    public function __construct(Application $app)
    {
        parent::__construct($app);

//        $this->deletedColumn = User::$_Deleted;

    }

    public function model(): string
    {
        return User::class;
    }

    public function getAccountByCode(string $code)
    {
        return $this->baseQuery()
            ->where(User::$_Code, $code)
            ->first();
    }

    /**
     * @throws ValidatorException
     */
    public function forgotPassword($password, $data, $code)
    {
        $user = $this->query()->where(Account::$_Code, $code)->first();

        $user->PasswordOriginal = $password;

        return $this->update($data, $user->Id) ? $user : null;
    }

    public function getAccountsForRole()
    {
        return $this->baseQuery()
            ->select(User::$_All,)
            ->join(People::$Name, People::$_Id, Account::$_PeopleId)
            ->whereNot(People::$_Deleted, Config::TRUE)
            ->where(People::$_Status, Config::ACTIVE)
            ->where(Account::$_Status, Config::ACTIVE)
            ->get();
    }

    public function getAccountsForAudits()
    {
        return $this->baseQuery()
            ->join(People::$Name, People::$_Id, Account::$_PeopleId)
            ->select([
                Account::$_Id,
                Account::$_Code,
                Account::$_Email,
                People::$_DisplayName,
            ])
            ->whereNot(People::$_Deleted,  Config::TRUE)
            ->where(People::$_Status, Config::ACTIVE)
            ->where(Account::$_Status, Config::ACTIVE)
            ->where(People::$_Type, PeopleConfig::ADMIN)
            ->get();
    }
}
