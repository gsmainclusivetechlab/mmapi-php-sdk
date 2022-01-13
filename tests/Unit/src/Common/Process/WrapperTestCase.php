<?php
namespace mmpsdkTest\Unit\src\Common\Process;
use ReflectionClass;
use ReflectionMethod;
use PHPUnit\Framework\TestCase;

class WrapperTestCase extends TestCase
{
    protected $wrapperClass;

    public function checkStaticFunctionParamCount($methodName, $type)
    {
        $class = new ReflectionClass($type);
        $method = new ReflectionMethod($this->wrapperClass, $methodName);
        $this->assertEquals(
            $class->getConstructor()->getNumberOfParameters(),
            $method->getNumberOfParameters(),
            'Number of params should be: ' .
                $class->getConstructor()->getNumberOfParameters()
        );
        $this->assertEquals(
            $class->getConstructor()->getNumberOfRequiredParameters(),
            $method->getNumberOfRequiredParameters(),
            'Number of required params should be: ' .
                $class->getConstructor()->getNumberOfParameters()
        );
    }

    public function checkFunctionReturnInstance($obj, $type)
    {
        $this->assertInstanceOf($type, $obj);
    }
}
