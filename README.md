# axy\random

[![Latest Stable Version](https://img.shields.io/packagist/v/axy/random.svg?style=flat-square)](https://packagist.org/packages/axy/random)
[![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D%205.4-8892BF.svg?style=flat-square)](https://php.net/)
[![Build Status](https://img.shields.io/travis/axypro/random/master.svg?style=flat-square)](https://travis-ci.org/axypro/random)

Generates pseudo-random

* GitHub: [axypro/random](https://github.com/axypro/random)
* Composer: [axy/random](https://packagist.org/packages/axy/random)

PHP 5.4+

Library does not require any dependencies (except composer packages).

```php
use axy\random\Random;

$string = Random::createString(10); // creates a random string of 10 chars

$bytes = Random::createBytes(100); // creates an array of 100 integers (0-255)
```
