<?php
namespace mmpsdkTest\src\Common\Process;
use PHPUnit\Framework\TestCase;
use mmpsdkTest\Extensions\PropertyAccessor;
use DMS\PHPUnitExtensions\ArraySubset\ArraySubsetAsserts;
use mmpsdk\Common\Exceptions\SDKException;
use mmpsdk\Common\Models\RequestState;
use mmpsdk\Common\Models\Response;
use mmpsdk\Common\Process\BaseProcess;
use mmpsdkTest\src\mocks\MockResponse;
use ReflectionClass;

abstract class ProcessTestCase extends TestCase
{
    use ArraySubsetAsserts;

    /**
     *
     * @var array
     */
    protected $constructorArgs;

    /**
     *
     * @var array
     */
    protected $mockMethods = ['makeRequest'];

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
     * @var string
     */
    protected $mockResponseObject;

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

    /**
     * @var string
     */
    protected $responseType;

    public function testCheckSuccessResponse()
    {
        $mockObj = $this->buildMockObject(function ($request) {
            return $this->buildSuccessMockResponse(
                $request,
                $this->mockResponseObject
            );
        });
        $response = $mockObj->execute();
        if ($this->processType == BaseProcess::ASYNCHRONOUS_PROCESS) {
            $this->assertInstanceOf(RequestState::class, $response);
        } else {
            $this->assertInstanceOf($this->responseType, $response);
        }
    }

    public function testCheckFailureResponse()
    {
        $mockObj = $this->buildMockObject(function ($request) {
            return $this->buildFailureMockResponse($request);
        });
        try {
            $mockObj->execute();
            $this->expectException(SDKException::class);
        } catch (SDKException $e) {
            $this->assertNotEmpty($e->getErrorObj(), 'Error object is empty');
        }
    }

    public function testCheckRequest()
    {
        $mockObj = $this->buildMockObject(function ($request) {
            $requestObj = PropertyAccessor::getRequestProperties($request);
            $this->assertEquals(
                $this->requestMethod,
                $requestObj['method'],
                'Method must be: ' . $this->requestMethod
            );
            $this->assertEquals(
                $this->requestUrl,
                $requestObj['url'],
                'URL must be: ' . $this->requestUrl
            );
            if ($this->requestParams) {
                $this->assertEqualsCanonicalizing(
                    json_decode($this->requestParams[0], true),
                    json_decode($requestObj['params'][0], true),
                    'Params must be: ' . implode(',', $this->requestParams)
                );
            }
            if ($this->requestOptions) {
                $this->assertArraySubset(
                    $this->requestOptions,
                    $requestObj['options'],
                    'Options must be: ' . implode(',', $this->requestOptions)
                );
            }
            return $this->buildSuccessMockResponse(
                $request,
                $this->mockResponseObject
            );
        });
        $mockObj->execute();
    }

    private function buildSuccessMockResponse(
        $request,
        $mockResponse = 'RequestState.json'
    ) {
        $response = new Response();
        if ($this->processType == BaseProcess::ASYNCHRONOUS_PROCESS) {
            return $response
                ->setResult(MockResponse::get('RequestState.json'))
                ->setHttpCode(202)
                ->setClientCorrelationId('123456789')
                ->setRequestObj($request);
        } else {
            return $response
                ->setResult(MockResponse::get($mockResponse))
                ->setHttpCode(200)
                ->setRequestObj($request);
        }
    }

    private function buildFailureMockResponse($request)
    {
        $response = new Response();
        return $response
            ->setResult(MockResponse::get('Error.json'))
            ->setHttpCode(400)
            ->setRequestObj($request);
    }

    /**
     * @param callable $callback
     * @return BaseProcess
     */
    private function buildMockObject($callback)
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
            ->will($this->returnCallback($callback));
        return $mockObj;
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
