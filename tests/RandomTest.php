<?php
/**
 * @package axy\random
 * @author Oleg Grigoriev <go.vasac@gmail.com>
 */

namespace axy\random\tests;

use axy\random\Random;

/**
 * coversDefaultClass axy\random\Random
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

    /**
     * covers ::createBytes
     */
    public function testCreateBytes()
    {
        $bytes = Random::createBytes(10000);
        $this->assertInternalType('array', $bytes);
        $this->assertCount(10000, $bytes);
        $a = array_fill(0, 16, 0);
        $b = array_fill(0, 16, 0);
        foreach ($bytes as $byte) {
            if (!is_int($byte)) {
                $this->fail('not int');
            }
            if (($byte < 0) || ($byte > 255)) {
                $this->fail('byte not inside [0,255]');
            }
            $a[(int)($byte / 16)]++;
            $b[$byte % 16]++;
        }
        $this->checkResult([$a, $b]);
    }

    private function checkResult($list)
    {
        $min = null;
        $max = 0;
        foreach ($list as $arr) {
            foreach ($arr as $v) {
                if (($min === null) || ($v < $min)) {
                    $min = $v;
                }
                if ($v > $max) {
                    $max = $v;
                }
            }
        }
        if ($max > ($min * 1.5)) {
            $this->fail('max/min');
        }
    }
}
