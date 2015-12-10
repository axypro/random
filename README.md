# axy\random

[![Latest Stable Version](https://img.shields.io/packagist/v/axy/random.svg?style=flat-square)](https://packagist.org/packages/axy/random)
[![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D%205.4-8892BF.svg?style=flat-square)](https://php.net/)
[![Build Status](https://img.shields.io/travis/axypro/random/master.svg?style=flat-square)](https://travis-ci.org/axypro/random)
[![Coverage Status](https://coveralls.io/repos/axypro/random/badge.svg?branch=master&service=github)](https://coveralls.io/github/axypro/random?branch=master)
[![License](https://poser.pugx.org/axy/random/license)](LICENSE)

* The library does not require any dependencies (except composer packages).
* Tested on PHP 5.4+, PHP 7, HHVM (on Linux), PHP 5.5 (on Windows).
* Install: `composer require axy/random`.
* License: [MIT](LICENSE).

### Documentation

```php
use axy\random\Random;

$string = Random::createString(10); // creates a random string of 10 chars

$bytes = Random::createBytes(100); // creates an array of 100 integers (0-255)
```
