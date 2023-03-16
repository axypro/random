<?php

namespace axy\random\tests\helpers;

use axy\random\tests\BaseTestCase;

/**
 * coversDefaultClass \axy\random\helpers\Alg
 */
class AlgTest extends BaseTestCase
{
    /**
     * covers ::randomBytes
     * covers ::mcrypt
     * covers ::openssl
     * covers ::dev
     * covers ::manual
     * @dataProvider providerRandom
     */
    public function testRandom(string $method, bool $func): void
    {
        $actual = call_user_func(['axy\random\src\helpers\Alg', $method], 100);
        if ($func) {
            $this->assertIsString($actual);
            $this->assertSame(100, strlen($actual));
            $this->assertTrue($this->checkRandom($actual), 'check random');
        } else {
            $this->assertNull($actual);
        }
    }

    public static function providerRandom(): array
    {
        return [
            ['randomBytes', true],
        ];
    }

    private function checkRandom(string $string): bool
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
