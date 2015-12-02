<?php
/**
 * @package axy\random
 * @author Oleg Grigoriev <go.vasac@gmail.com>
 */

namespace axy\random\helpers;

use axy\binary\Binary;

/**
 * Different algorithms to generate random numbers
 */
class Alg
{
    /**
     * @param int $length
     * @return string|null
     */
    public static function randomBytes($length)
    {
        if (!function_exists('random_bytes')) {
            return null;
        }
        return random_bytes($length);
    }

    /**
     * @param int $length
     * @return string|null
     */
    public static function mcrypt($length)
    {
        if (!function_exists('mcrypt_create_iv')) {
            return null;
        }
        return mcrypt_create_iv($length, MCRYPT_DEV_URANDOM);
    }

    /**
     * @param int $length
     * @return string|null
     */
    public static function openssl($length)
    {
        if (!function_exists('openssl_random_pseudo_bytes')) {
            return null;
        }
        $result = openssl_random_pseudo_bytes($length, $strong);
        if (!$strong) {
            return null;
        }
        return $result;
    }

    /**
     * @param int $length
     * @return string|null
     */
    public static function dev($length)
    {
        if (!is_readable('/dev/urandom')) {
            return null;
        }
        $fp = fopen('/dev/urandom', 'r');
        $left = $length;
        $result = [];
        do {
            $buffer = fread($fp, $left);
            $lBuffer = strlen($buffer);
            if ($lBuffer === 0) {
                return null;
            }
            $result[] = $buffer;
            $left -= $lBuffer;
        } while ($left > 0);
        fclose($fp);
        return implode('', $result);
    }

    /**
     * @param int $length
     * @return string|null
     */
    public static function manually($length)
    {
        $result = [];
        for ($i = 0; $i < $length; $i++) {
            $result[] = chr(mt_rand(0, 255));
        }
        return implode('', $result);
    }

    /**
     * @param int $length
     * @return string
     */
    public static function random($length)
    {
        if (self::$working) {
            return call_user_func(self::$working, $length);
        }
        foreach (self::$versions as $method) {
            $callback = [__CLASS__, $method];
            $result = call_user_func($callback, $length);
            if ($result !== null) {
                self::$working = $callback;
                return $result;
            }
        }
        return null;
    }

    /**
     * @var string[]
     */
    private static $versions = ['randomBytes', 'mcrypt', 'openssl', 'dev', 'manually'];

    /**
     * @var string
     */
    private static $working;
}