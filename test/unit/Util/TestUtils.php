<?php

namespace NklKst\TheSportsDb\Util;

use Closure;
use NklKst\TheSportsDb\Client\Client;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\MockObject\Rule\InvokedCount as InvokedCountMatcher;
use ReflectionClass;
use ReflectionException;
use ReflectionObject;
use ReflectionProperty;

class TestUtils
{
    /**
     * Expect an endpoint URL to be set in the mocked request builder.
     *
     * @param MockObject $requestBuilderMock Mocked request builder
     * @param string     $endpoint           Expected endpoint
     */
    public static function expectEndpoint(MockObject $requestBuilderMock, string $endpoint): void
    {
        $requestBuilderMock
            ->expects(new InvokedCountMatcher(1))
            ->method('setEndpoint')
            ->with($endpoint);
    }

    /**
     * @param object $object   Object to get property from
     * @param string $property Property to get
     *
     * @return mixed|null
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
     * @param string $class    Class to get static property from
     * @param string $property Property to get
     *
     * @return mixed|null
     */
    public static function getHiddenStaticProperty(string $class, string $property)
    {
        try {
            return (new ReflectionClass($class))->getStaticPropertyValue($property);
        } catch (ReflectionException $e) {
            return null;
        }
    }

    /**
     * @param string $class    Class to set static property
     * @param string $property Property to change
     * @param mixed  $value    Value to set
     */
    public static function setHiddenStaticProperty(string $class, string $property, $value): void
    {
        try {
            (new ReflectionClass($class))->setStaticPropertyValue($property, $value);
        } catch (ReflectionException $e) {
            // Shit happens
        }
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

    /**
     * @param string $class  Class to get static method from
     * @param string $method Method to get
     */
    public static function getHiddenStaticMethod(string $class, string $method): ?Closure
    {
        try {
            $meth = (new ReflectionClass($class))->getMethod($method);
        } catch (ReflectionException $e) {
            return null;
        }
        $meth->setAccessible(true);

        return $meth->getClosure(null);
    }

    /**
     * Checks if all properties of the given object or iterable of objects are initialized correctly.
     *
     * @param object|iterable<object> $objects Object or list of objects to check
     *
     * @throws ReflectionException
     */
    public static function assertThatAllPropertiesAreInitialized($objects): void
    {
        // Convert variable to iterable if necessary
        if (!is_iterable($objects)) {
            $objects = [$objects];
        }

        // Check all objects
        foreach ($objects as $object) {
            $class = get_class($object);

            // Get properties by class name, because get_object_vars() doesn't return uninitialized properties
            $properties = array_keys(get_class_vars($class));
            foreach ($properties as $property) {
                $reflectionProperty = new ReflectionProperty($class, $property);

                // Don't check property if null is allowed
                if ($reflectionProperty->getType()->allowsNull()) {
                    continue;
                }

                // Check if property is initialized on the given object
                Assert::assertTrue(
                    $reflectionProperty->isInitialized($object),
                    sprintf('Property %s on class %s should be initialized.', $property, $class),
                );
            }
        }
    }

    /**
     * Set an API key provided by the PATREON_KEY environment variable.
     *
     * @param Client $client Used client to set API key
     */
    public static function setPatreonKey(Client $client): void
    {
        $client->configure()->setKey(getenv('PATREON_KEY'));
    }
}
