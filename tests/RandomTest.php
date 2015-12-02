<?php
/**
 * @package axy\random
 * @author Oleg Grigoriev <go.vasac@gmail.com>
 */

namespace axy\random\tests;

use axy\random\Random;

/**
 * coversDefaultClass \axy\random\Random
 */
class RandomTest extends \PHPUnit_Framework_TestCase
{
    /**
     * covers ::createString
     */
    public function testCreateString()
    {
        $string = Random::createString(10);
        $this->assertInternalType('string', $string);
        $this->assertSame(10, strlen($string));
    }
}
