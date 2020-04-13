# Collection of PHP helpers

## Installation

### Install via Composer

If you do not have [Composer](http://getcomposer.org/), you may install it by following the instructions
at [getcomposer.org](http://getcomposer.org/doc/00-intro.md#installation-nix).

You can then install this library using the following command:

~~~
composer require nowmovesoft/helpers
~~~

## Basic usage

### DateHelper

```php
use nms\helpers\DateHelper;

/*
 * Gets years range or one year if specified year is current.
 * For example, in 2019 it returns "2019", but in 2020 it returns "2019-2020"
 */
echo DateHelper::getYearsRange(2019);
```

### ObjectHelper

If you have a method, which returns a class name, you can use ObjectHelper instead of this construction:

```php
use nms\helpers\ObjectHelper;

// instead of using tempotary variable...
$className = Module::getInstance()->useClass;
$model = new $className($paramOne, $paramTwo /* Other parameters */);

// ...you can use ObjectHelper
$model = ObjectHelper::create(Module::getInstance()->useClass, $paramOne, $paramTwo /* Other parameters */);
```

If you want to call static method, you can use ObjectHelper instead of this construction:

```php
use nms\helpers\ObjectHelper;

// instead of this...
$result = Module::getInstance()->useClass::staticMethod($paramOne, $paramTwo /* Other parameters */);

// ...you can use ObjectHelper
$result = ObjectHelper::call(Module::getInstance()->useClass, 'staticMethod', $paramOne, $paramTwo /* Other parameters */);
```

If you want to populate your public class properties you can do it this way:

```php
use nms\helpers\ObjectHelper;

$object = new class {
    public $property = false;
};

$object = ObjectHelper::configure($object, ['property' => true]); // name-value pairs

var_dump($object->property); // true
```
