<?php

namespace nms\helpers;

/**
 * Collection of methods to simplify using PHP-classes and objects.
 *
 * @author Michael Naumov <vommuan@gmail.com>
 */
class ObjectHelper
{
    /**
     * Creates instance of specified class.
     *
     * @param string $className
     * @param array $params
     * @return mixed
     */
    public static function create(string $className, ...$params)
    {
        return new $className(...$params);
    }

    /**
     * Calls static method of class.
     *
     * @param string $className class name to be called
     * @param string $method method name to be called
     * @param array $params method parameters
     * @return mixed
     */
    public static function call(string $className, string $method, ...$params)
    {
        return $className::$method(...$params);
    }

    /**
     * Configures an object with the initial property values.
     *
     * @param object $object the object to be configured
     * @param array $properties the property initial values given in terms of name-value pairs.
     * @return object the object itself
     */
    public static function configure($object, $properties)
    {
        foreach ($properties as $name => $value) {
            $object->$name = $value;
        }

        return $object;
    }
}
