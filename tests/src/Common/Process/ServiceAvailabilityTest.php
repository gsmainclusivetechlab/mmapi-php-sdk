<?php

use mmpsdk\Common\Constants\MobileMoney;
use mmpsdk\Common\Process\ServiceAvailability;
use mmpsdk\Common\Process\BaseProcess;
use mmpsdkTest\src\Common\Process\ProcessTestCase;

class ServiceAvailabilityTest extends ProcessTestCase
{
    protected function setUp(): void
    {
        $this->requestMethod = 'GET';
        $this->requestUrl = MobileMoney::getBaseUrl() . '/heartbeat';
        $this->className = ServiceAvailability::class;
        $this->reqObj = $this->instantiateClass(
            $this->className,
            $this->constructorArgs
        );
        $this->processType = BaseProcess::SYNCHRONOUS_PROCESS;
    }
}
