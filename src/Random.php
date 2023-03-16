<?php

namespace axy\random;

use axy\binary\Binary;
use axy\random\helpers\Alg;

/** Random sequence generator */
class Random
{
    /** Returns a binary random string */
    public static function createString(int $length): string
    {
        return Alg::random($length);
    }

    /** Returns an array of bytes */
    public static function createBytes(int $count): array
    {
        return Binary::unpackBytes(self::createString($count));
    }
}
