<?php

namespace mmpsdkTest\src\Integration;

use mmpsdk\Common\Process\BaseProcess;
use PHPUnit\Framework\TestCase;

abstract class IntegrationTestCase extends TestCase
{
    protected $response;
    protected $request;

    abstract protected function getProcessInstanceType();
    abstract protected function getResponseInstanceType();
    abstract protected function getRequestType();

    public function testProcessInstanceType()
    {
        $this->assertInstanceOf(
            $this->getProcessInstanceType(),
            $this->request
        );
    }

    public function testProcessFeatures()
    {
        if ($this->getRequestType() == BaseProcess::ASYNCHRONOUS_PROCESS) {
            $this->assertNotNull($this->request->getClientCorrelationId());
        } else {
            $this->assertNull($this->request->getClientCorrelationId());
        }
    }

    public function testResponse()
    {
        $this->response = $this->request->execute();

        // Test Response is not null
        $this->assertNotNull($this->response);

        // Test response type
        $this->assertInstanceOf(
            $this->getResponseInstanceType(),
            $this->response
        );

        // Test response has required values
        $this->assertNotNull($this->response->getResponseCode());
    }

    public function testPollingWorkFlow()
    {
        if ($this->getRequestType() == BaseProcess::ASYNCHRONOUS_PROCESS) {
        }
    }
}
