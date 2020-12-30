<?php

namespace NklKst\TheSportsDb\Util;

use Closure;
use ReflectionException;
use ReflectionObject;

class TestUtils
{
    /**
     * @param object $object   Object to get property from
     * @param string $property Property to get
     *
     * @return array|object
     */
    public static function getHiddenProperty(object $object, string $property)
    {
        $ref = new ReflectionObject($object);

        try {
            $prop = $ref->hasProperty($property) ?
                $ref->getProperty($property) :
                $ref->getParentClass()->getProperty($property);
        } catch (ReflectionException $e) {
            return null;
        }
        $prop->setAccessible(true);

        return $prop->getValue($object);
    }

    /**
     * @param object $object Object to get method from
     * @param string $method Method to get
     *
     * @return Closure
     */
    public static function getHiddenMethod(object $object, string $method): ?Closure
    {
        $ref = new ReflectionObject($object);

        try {
            $meth = $ref->hasMethod($method) ?
                $ref->getMethod($method) :
                $ref->getParentClass()->getMethod($method);
        } catch (ReflectionException $e) {
            return null;
        }
        $meth->setAccessible(true);

        return $meth->getClosure($object);
    }
}
