<?php

namespace mmpsdkTest\Extensions;

use ReflectionClass;

class PropertyAccessor
{
    /**
     * getHiddenProperty
     *
     * @param 	string $className
     * @param 	string $propertyName
     * @return	ReflectionProperty
     */
    public static function getProperty($className, $propertyName)
    {
        $reflector = new ReflectionClass($className);
        $property = $reflector->getProperty($propertyName);
        $property->setAccessible(true);

        return $property;
    }
}
