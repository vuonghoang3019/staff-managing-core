<?php

namespace Admin\Configs;

class Config
{
    const ACTIVE = 1;

    const INACTIVE = 0;

    const PENDING = 2;

    public const AUTH_KEY = 'Authorization';
    public const AUTH_PREFIX = 'Bearer ';
    public const DEFAULT_DATETIME_FORMAT = 'Y-m-d H:i:s';
    public const PER_PAGE = 25;
    public const RANDOM_NAME = 16;
    public const TOKEN_LENGTH = 32;
    public const PASSWORD_LENGTH = 6;
    public const UUID_REGEX = '/^[0-9A-F]{8}-[0-9A-F]{4}-[0-9A-F]{4}-[0-9A-F]{4}-[0-9A-F]{12}$/i';
    const LOGIN_REQUEST = 'LoginRequest';

    const DATE_DEFAULT = 'Y-m-d';
    const DATETIME = 'Y-m-d H:i';
    const DATETIME_FULL = 'Y-m-d H:i:s';

    const DATE_DEFAULT_VI = 'd-m-Y';
    const DATETIME_VI = 'd-m-Y H:i';
    const DATETIME_FULL_VI = 'd-m-Y H:i:s';

    const TIME = 'H:i:s';
    const SHORT_TIME = 'H:i';

    const COMMA = ',';
    const DELETED_COLUMN = 'Deleted';
    const BLOCKED = 2;

    const TRUE = 1;
    const FALSE = 0;

    const STATUS = [
        self::ACTIVE   => 'Active',
        self::INACTIVE => 'Inactive',
    ];

    const BIT = [
        self::TRUE  => 'True',
        self::FALSE => 'False',
    ];

    const MALE = 1;
    const FEMALE = 2;

    const GENDER = [
        self::MALE   => 'Male',
        self::FEMALE => 'Female',
    ];

    const CODE_REGEX = '/^[A-Za-z0-9-._]+$/';
    const TEL_REGEX = '/^[0-9]{8,16}$/';

    const TEMP_FOLDER = 'temp';

    const MON = 'MON';
    const TUE = 'TUE';
    const WED = 'WED';
    const THU = 'THU';
    const FRI = 'FRI';
    const SAT = 'SAT';
    const SUN = 'SUN';

    const DAY_OF_WEEK = [
        self::MON => 'Thứ hai',
        self::TUE => 'Thứ ba',
        self::WED => 'Thứ tư',
        self::THU => 'Thứ năm',
        self::FRI => 'Thứ sáu',
        self::SAT => 'Thứ bảy',
        self::SUN => 'Chủ nhật',
    ];
}
