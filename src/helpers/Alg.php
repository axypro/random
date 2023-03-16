<?php

namespace axy\random\src\helpers;

use axy\binary\Binary;

/** Different algorithms to generate random numbers. Since PHP 7 only random_bytes() */
class Alg
{
    public static function randomBytes(int $length): string
    {
        return random_bytes($length);
    }

    public static function random(int $length): string
    {
        return self::randomBytes($length);
    }
}
