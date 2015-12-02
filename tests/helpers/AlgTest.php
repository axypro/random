<?php
/**
 * @package axy\random
 * @author Oleg Grigoriev <go.vasac@gmail.com>
 */

namespace axy\random\tests\helpers;

/**
 * coversDefaultClass \axy\random\helpers\Alg
 */
class AlgTest extends \PHPUnit_Framework_TestCase
{
    /**
     * covers ::randomBytes
     * covers ::mcrypt
     * covers ::openssl
     * covers ::dev
     * covers ::manual
     * @dataProvider providerRandom
     * @param string $method
     * @param string $func
     */
    public function testRandom($method, $func)
    {
        $actual = call_user_func(['axy\random\helpers\Alg', $method], 100);
        if ($func) {
            $this->assertInternalType('string', $actual);
            $this->assertSame(100, strlen($actual));
            $this->assertTrue($this->checkRandom($actual), 'check random');
        } else {
            $this->assertNull($actual);
        }
    }

    /**
     * @return array
     */
    public function providerRandom()
    {
        return [
            ['randomBytes', function_exists('random_bytes')],
            ['mcrypt', function_exists('mcrypt_create_iv')],
            ['openssl', function_exists('openssl_random_pseudo_bytes')],
            ['dev', is_readable('/dev/urandom')],
            ['manually', true],
            ['random', true],
            ['random', true],
        ];
    }

    /**
     * @param string $string
     * @return bool
     */
    private function checkRandom($string)
    {
        $codes = [];
        $len = strlen($string);
        $half = (int)($len / 2);
        for ($i = 0; $i < $len; $i++) {
            $number = ord(substr($string, $i, 1));
            if (isset($codes[$number])) {
                $codes[$number]++;
                if ($codes[$number] > $half) {
                    return false;
                }
            } else {
                $codes[$number] = 1;
            }
        }
        return true;
    }
}
