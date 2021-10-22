<?php

use mmpsdk\Common\Constants\MobileMoney;
use PHPUnit\Framework\TestCase;

use mmpsdk\Common\Process\BaseProcess;

class BaseProcessTest extends TestCase
{
    protected function setUp(): void
    {
        MobileMoney::setCallbackUrl(null);
    }

    protected function tearDown(): void
    {
        MobileMoney::setCallbackUrl(null);
    }

    public function testSynchronousProcess()
    {
        $stub = $this->getMockForAbstractClass(BaseProcess::class, [BaseProcess::SYNCHRONOUS_PROCESS]);
        $this->assertNull($stub->getClientCorrelationId(), 'Should return null');
    }

    public function testAsynchronousProcessWithCallback()
    {
        $stub = $this->getMockForAbstractClass(BaseProcess::class, [BaseProcess::ASYNCHRONOUS_PROCESS, 'https://example.com/']);
        $this->assertNotNull($stub->getCallBackUrl(), 'Should not return null');
        $this->assertEquals($stub->getCallBackUrl(), 'https://example.com/');
    }

    public function testAsynchronousProcessWithoutCallback()
    {
        $stub = $this->getMockForAbstractClass(BaseProcess::class, [BaseProcess::ASYNCHRONOUS_PROCESS, false]);
        $this->assertNull($stub->getCallBackUrl(), 'Should return null');
    }

    public function testAsynchronousProcessWithCallbackButValueNull()
    {
        $stub = $this->getMockForAbstractClass(BaseProcess::class, [BaseProcess::ASYNCHRONOUS_PROCESS, null]);
        $this->assertNull($stub->getCallBackUrl(), 'Should return null');
    }

    public function testAsynchronousProcessWithoutCallbackButWithCommonCallBackUrl()
    {
        MobileMoney::setCallbackUrl('https://example.com/');
        $stub = $this->getMockForAbstractClass(BaseProcess::class, [BaseProcess::ASYNCHRONOUS_PROCESS, false]);
        $this->assertNotNull($stub->getCallBackUrl(), 'Should not return null');
        $this->assertEquals($stub->getCallBackUrl(), 'https://example.com/', 'Should return the callback url from SDK Initialization.');
    }

    public function testAsynchronousProcessClientCorrelationIdGeneration()
    {
        $stub = $this->getMockForAbstractClass(BaseProcess::class, [BaseProcess::ASYNCHRONOUS_PROCESS, null]);
        $this->assertNotNull($stub->getClientCorrelationId(), 'Should not return null');
    }
}
