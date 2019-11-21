<?php

namespace tests\unit;

use nms\helpers\ObjectHelper;

class ObjectHelperTest extends \Codeception\Test\Unit
{
    public function testCreateWithParams()
    {
        $object = new class {
            public $intParam;
            public $strParam;

            public function __construct($intParam = null, $strParam = null) {
                $this->intParam = $intParam;
                $this->strParam = $strParam;
            }

            public function name() {
                return self::class;
            }
        };

        $model = ObjectHelper::create($object->name(), 1, 'one');

        expect($model->intParam)->equals(1);
        expect($model->strParam)->equals('one');
    }

    public function testCreateWithoutParams()
    {
        $object = new class {
            public $param;

            public function name() {
                return self::class;
            }
        };

        $model = ObjectHelper::create($object->name());

        expect($model->param)->null();
    }

    public function testCallWithParams()
    {
        $object = new class {
            public static function method($param) {
                return $param;
            }

            public function name() {
                return self::class;
            }
        };

        expect(ObjectHelper::call($object->name(), 'method', true))->true();
    }

    public function testCallWithoutParams()
    {
        $object = new class {
            public static function method() {
                return true;
            }

            public function name() {
                return self::class;
            }
        };

        expect(ObjectHelper::call($object->name(), 'method'))->true();
    }

    public function testConfigure()
    {
        $object = new class {
            public $property = false;
        };

        $object = ObjectHelper::configure($object, ['property' => true]);

        expect($object->property)->true();
    }
}
