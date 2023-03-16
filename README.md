# axy\random

Random sequence generation in PHP.
At the moment this package doesn't make much sense.
Used by some other packages.
In old PHP versions used different methods, now uses only [random_bytes()](https://www.php.net/random_bytes).

[![Latest Stable Version](https://img.shields.io/packagist/v/axy/random.svg?style=flat-square)](https://packagist.org/packages/axy/random)
[![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D%208.1-8892BF.svg?style=flat-square)](https://php.net/)
[![Tests](https://github.com/axypro/random/actions/workflows/test.yml/badge.svg)](https://github.com/axypro/random/actions/workflows/test.yml)
[![Coverage Status](https://coveralls.io/repos/github/axypro/random/badge.svg?branch=master)](https://coveralls.io/github/axypro/random?branch=master)
[![License](https://poser.pugx.org/axy/random/license)](LICENSE)

### Documentation

```php
use axy\random\src\Random;

$string = Random::createString(10); // creates a random string of 10 chars
$bytes = Random::createBytes(100); // creates an array of 100 integers (0-255)
```
