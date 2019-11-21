<?php

namespace tests\unit;

use nms\helpers\DateHelper;

class DateHelperTest extends \Codeception\Test\Unit
{
    public function testGetYearsRange()
    {
        expect(DateHelper::getYearsRange(date('Y')))->equals(date('Y'));
        expect(DateHelper::getYearsRange(date('Y') - 1))->equals((date('Y') - 1) . '-' . date('Y'));
    }
}
