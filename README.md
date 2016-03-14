# Converter and object wrapper for an boolean

[![Build Status](https://travis-ci.org/jaroslavtyc/granam-boolean.svg?branch=master)](https://travis-ci.org/jaroslavtyc/granam-boolean)

## Hint
First of all, make sure you don't need just a [simple  built-in bool validation](http://php.net/manual/en/function.filter-var.php).

Note: requires PHP 5.4+

Internally behaves same way as (bool)$value, but
- non-scalar values (arrays, resources, objects without \_\_toString etc.) raises exception
- objects with \_\_toString magic method are converted to string by that, then to bool
- null *can* be rejected by raise of an exception, *if* desired

```php
<?php
use Granam\Boolean\Boolean;
use Granam\Boolean\Tools\Exceptions\WrongParameterType;

$booleanFromInteger = new Boolean(12345);
// bool(true)
var_dump($booleanFromInteger->getValue());

$booleanFromString = new Boolean("124578");
// bool(true)
var_dump($booleanFromString->getValue());

$booleanFromFloatString = new Boolean("987.654");
// bool(true)
var_dump($booleanFromFloatString->getValue());

$booleanFromZero = new Boolean(0);
// bool(false)
var_dump($booleanFromZero->getValue());

$booleanFromNull = new Boolean(null);
// bool(false)
var_dump($booleanFromNull->getValue());
// ...

// exception is raised (\Granam\Boolean\Tools\Exceptions\WrongParameterType)
new Boolean(null, true /\* strict \*/);

```
