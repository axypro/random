<?php
/**
 * @package axy\random
 * @author Oleg Grigoriev <go.vasac@gmail.com>
 */

namespace axy\random;

use axy\random\helpers\Alg;

/**
 * Generation of random sequences
 */
class Random
{
    /**
     * Returns a binary random string
     *
     * @param int $length
     * @return string
     */
    public static function createString($length)
    {
        return Alg::random($length);
    }
}
