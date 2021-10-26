<?php
namespace mmpsdkTest\src\Common\Process;
use PHPUnit\Framework\TestCase;
use mmpsdkTest\Extensions\PropertyAccessor;
use ReflectionClass;

abstract class ProcessTestCase extends TestCase
{
    /**
     *
     * @var array
     */
    protected $constructorArgs;

    /**
     *
     * @var array
     */
    protected $mockMethods = ['makeRequest', 'parseResponse'];

    /**
     *
     * @var string
     */
    protected $requestMethod;

    /**
     *
     * @var string
     */
    protected $requestUrl;

    /**
     *
     * @var array
     */
    protected $requestOptions;

    /**
     *
     * @var array
     */
    protected $requestParams;

    /**
     *
     * @var string
     */
    protected $className;

    /**
     *
     * @var string
     */
    protected $processType;

    /**
     *
     * @var mixed
     */
    protected $reqObj;

    public function testCheckRequest()
    {
        $mockObj = $this->getMockBuilder($this->className)->onlyMethods(
            $this->mockMethods
        );
        if ($this->constructorArgs) {
            $mockObj->setConstructorArgs($this->constructorArgs);
        }
        $mockObj = $mockObj->getMock();
        $mockObj
            ->expects($this->once())
            ->method('makeRequest')
            ->will(
                $this->returnCallback(function ($request) {
                    $requestObj = PropertyAccessor::getRequestProperties(
                        $request
                    );
                    $this->assertEquals(
                        $this->requestMethod,
                        $requestObj['method'],
                        'Method must be: ' . $this->requestMethod
                    );
                    $this->assertEquals(
                        $this->requestMethod,
                        $requestObj['method'],
                        'URL must be: ' . $this->requestUrl
                    );
                    if ($this->requestParams) {
                        $this->assertEqualsCanonicalizing(
                            $this->requestParams,
                            $requestObj['params'],
                            'Params must be: ' .
                                implode(',', $this->requestParams)
                        );
                    }
                    if ($this->requestOptions) {
                        $this->assertEquals(
                            $this->requestOptions,
                            $requestObj['options'],
                            'Options must be: ' .
                                implode(',', $this->requestOptions)
                        );
                    }
                })
            );
        $mockObj->expects($this->once())->method('parseResponse');
        $response = $mockObj->execute();
    }

    protected function instantiateClass($className, $args = null)
    {
        $reflect = new ReflectionClass($className);
        if ($args !== null) {
            return $reflect->newInstanceArgs($args);
        } else {
            return $reflect->newInstance();
        }
    }

    public function testCheckInstance()
    {
        $this->assertInstanceOf(
            $this->className,
            $this->reqObj,
            'Should be of type ' . $this->className
        );
    }

    public function testCheckProcessType()
    {
        $this->assertEquals(
            $this->processType,
            $this->reqObj->getProcessType(),
            'Wrong Process Type'
        );
    }
}
