# axy\random

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
