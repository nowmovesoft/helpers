<?php

namespace nms\helpers;

/**
 * Collection of methods to work with dates.
 *
 * @author Michael Naumov <vommuan@gmail.com>
 */
class DateHelper
{
    /**
     * Gets years range or one year if specified year is current.
     *
     * @param integer $startFrom
     * @return string
     */
    public static function getYearsRange($startFrom)
    {
        return $startFrom . (date('Y') > $startFrom ? '-' . date('Y') : '');
    }
}
