<?php
declare(strict_types=1);

namespace Tests\EoneoPay\BankFiles\Parsers;

use PHPUnit\Framework\TestCase as PHPUnitTestCase;
use ReflectionClass;
use ReflectionMethod;
use ReflectionProperty;

class TestCase extends PHPUnitTestCase
{
    /**
     * Set the protected/private function to accessible and return reflection method
     *
     * @param string $class
     * @param string $method
     *
     * @return ReflectionMethod
     */
    protected function getProtectedMethod(string $class, string $method): ReflectionMethod
    {
        $reflectionClass = new ReflectionClass($class);

        $function = $reflectionClass->getMethod($method);
        $function->setAccessible(true);

        return $function;
    }

    /**
     * Set property to accessible and return reflection property
     *
     * @param string $class
     * @param string $property
     *
     * @return ReflectionProperty
     */
    protected function getProtectedProperty(string $class, string $property): ReflectionProperty
    {
        $reflectionClass = new ReflectionClass($class);

        $prop = $reflectionClass->getProperty($property);
        $prop->setAccessible(true);

        return $prop;
    }
}
