<?php

use Admin\Repos\LoginRepo;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Admin\Configs\Config;

if (!function_exists('get_token')) {
    /**
     * get token from header
     * @param string $key
     * @param string $prefix
     * @return string
     */
    function get_token(string $key = Config::AUTH_KEY, string $prefix = Config::AUTH_PREFIX): string
    {
        $authorization = request()->header($key);
        if (!Str::startsWith($authorization, $prefix)) {
            return "";
        }

        return Str::substr($authorization, Str::length($prefix));
    }
}

if (!function_exists('uuid')) {
    /**
     * get random uuid
     * @return string
     */
    function uuid(): string
    {
        return Str::uuid();
    }
}

if (!function_exists('db_begin')) {
    /**
     * database transaction begin
     */
    function db_begin(): void
    {
        DB::beginTransaction();
    }
}

if (!function_exists('db_commit')) {
    /**
     * database transaction commit
     */
    function db_commit(): void
    {
        DB::commit();
    }
}

if (!function_exists('db_rollback')) {
    /**
     * database transaction rollback
     */
    function db_rollback(): void
    {
        DB::rollBack();
    }
}

if (!function_exists('get_now')) {
    /**
     * get now by format
     * @param string $format
     * @return string
     */
    function get_now(string $format = Config::DEFAULT_DATETIME_FORMAT): string
    {
        return now()->format($format);
    }
}

if (!function_exists('random_with_time')) {
    /**
     * create random name
     * @param int $length
     * @return string
     */
    function random_with_time(int $length = Config::RANDOM_NAME): string
    {
        return sprintf('%s_%s', time(), strtolower(Str::random($length)));
    }
}

if (!function_exists('random_password')) {
    /**
     * create random password
     * @param int $length
     * @return string
     */
    function random_password(int $length = Config::PASSWORD_LENGTH): string
    {
        return Str::random($length);
    }
}

if (!function_exists('create_token')) {
    /**
     * create random token
     * @param int $length
     * @return string
     */
    function create_token(int $length = Config::TOKEN_LENGTH): string
    {
        return Str::random($length);
    }
}

if (!function_exists('get_dates_from_range')) {
    /**
     * return array range dates, begin from date to date
     * @param string $from
     * @param string $to
     * @param string $format
     * @return array
     */
    function get_dates_from_range(string $from, string $to, string $format = Config::DATE_DEFAULT): array
    {
        $dates = [];
        $current = strtotime($from);
        $last = strtotime($to);
        $stepVal = '+1 day';
        while ($current <= $last) {
            $dates[] = date($format, $current);
            $current = strtotime($stepVal, $current);
        }
        return $dates;
    }
}

if (!function_exists('hash_password')) {
    /**
     * has password with bcrypt
     * @param string $password
     * @param string $salt
     * @return string
     */
    function hash_password(string $password, string $salt = 'P&0myWHq'): string
    {
        return bcrypt($password);
    }
}

if (!function_exists('parse_date')) {
    /**
     * parse date by format
     * @param string $date
     * @param string $format
     * @return string
     */
    function parse_date(string $date, string $format = Config::DATE_DEFAULT): string
    {
        try {
            if (empty($date)) return '';

            return Carbon::parse($date)->format($format);
        } catch (Exception $ex) {
            return $date;
        }
    }
}

if (!function_exists('is_overlap')) {
    /**
     * check array time is overlap
     * @param array $periods
     * @param string $startKey
     * @param string $endKey
     * @param bool $strict
     * @return bool
     */
    function is_overlap(array $periods, string $startKey = 'FromTime', string $endKey = 'ToTime', bool $strict = false): bool
    {
        if (count($periods) <= 1) return false;

        usort($periods, function ($a, $b) use ($startKey, $endKey) {
            return strtotime($a[$startKey]) < strtotime($b[$endKey]) ? -1 : 1;
        });

        foreach ($periods as $key => $period) {
            if ($key == 0) {
                continue;
            }

            $currentStart = strtotime($period[$startKey]);
            $prevEnd = strtotime($periods[$key - 1][$endKey]);

            if ($strict ? $currentStart <= $prevEnd : $currentStart < $prevEnd) {
                return true;
            }
        }

        return false;
    }
}

if (!function_exists('action_method')) {
    /**
     * return request action method
     * @return string
     */
    function action_method(): string
    {
        return request()->route()->getActionMethod();
    }
}

if (!function_exists('execute_query')) {
    /**
     * @param string $query
     * @param array $binding
     * @return array
     */
    function execute_query(string $query, array $binding = []): array
    {
        return DB::select(DB::raw($query), $binding);
    }
}

if (!function_exists('convert_to_array')) {
    /**
     * @param string $keyword
     * @return array
     */
    function convert_to_array(string $keyword): array
    {
        try {
            $value = request($keyword, '');

            return explode(',', $value);
        } catch (Exception $ex) {
            return [];
        }
    }
}

if (!function_exists('convert_to_string')) {
    /**
     * @param string $keyword
     * @return string
     */
    function convert_to_string(string $keyword): string
    {
        try {
            $value = request($keyword, '');

            return empty($value) || !is_string($value) ? '' : $value;
        } catch (Exception $ex) {
            return '';
        }
    }
}

if (!function_exists('convert_to_date')) {
    /**
     * @param string $keyword
     * @param string $format
     * @param string $append
     * @return string
     */
    function convert_to_date(string $keyword, string $format, string $append = ''): string
    {
        try {
            $value = request($keyword, '');

            if (empty($value)) return '';

            $value = empty($append) ? $value : "$value $append";

            return Carbon::parse($value)->format($format);
        } catch (Exception $ex) {
            return '';
        }
    }
}

if (!function_exists('is_action_method')) {
    /**
     * check is current action method
     * @param mixed $method
     * @return bool
     */
    function is_action_method(mixed $method): bool
    {
        try {
            if (is_string($method)) return request()->route()->getActionMethod() == $method;

            if (is_array($method)) return in_array(request()->route()->getActionMethod(), $method);

            return false;
        } catch (Exception $ex) {
            return false;
        }
    }
}

if(!function_exists('recursive')) {
    /**
     * @param $array
     * @param string $child
     * @param string $key
     * @return array
     */
    function recursive($array, string $child = 'Children', string $key = 'Id'): array
    {
        $result = [];

        if (count($array) <= 0) return $result;

        foreach ($array as $item) {
            $result = array_merge($result, [$item[$key] => $item[$key]]);

            if (count($item[$child]) > 0) {
                $result = array_merge($result, recursive($item[$child]));
            }
        }

        return $result;
    }
}

if(!function_exists('get_ids')) {
    /**
     * @param $array
     * @param string $key
     * @return array
     */
    function get_ids($array, string $key = 'Id'): array
    {
        $result = [];

        if (count($array) <= 0) return $result;

        foreach ($array as $item) {
            $result[] = $item[$key];
        }

        return $result;
    }
}

if (!function_exists('attempt_login')) {
    function attempt_login(string $token = '', bool $pass = false)
    {
        $token = empty($token) ? get_token() : $token;

        return app(LoginRepo::class)->login($token, $pass);

    }
}

//if (!function_exists('get_account_id')) {
//    function get_account_id($key = 'AccountId')
//    {
//        return get_account()->{$key};
//    }
//}
