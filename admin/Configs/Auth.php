<?php

namespace Admin\Configs;

class Auth
{
    const MAX_ATTEMPTS = 10;
    const INCREASE_ATTEMPTS = 1;
    const CLEAR_ATTEMPTS = 0;
    const REQUIRE_CHANGE_PASSWORD = 1;

    const SYNCHRONIZED = 1;

    const TOKEN_ALIVE = 480; //minute

    const PAGE_CACHE = 36000; //10 hour

    const BKO = 1;
    //    const PORTAL_WEB = 2;
    //    const POS = 3;

    const APPLICATIONS = [
        self::BKO  => 'Back Office',
        //        self::PORTAL => 'Web Portal',
        //        self::POS    => 'POS',
    ];

    const SMS = 1;
    const EMAIL = 2;

    const NOTIFY = [
        self::SMS   => 'SMS',
        self::EMAIL => 'Email',
    ];
}
