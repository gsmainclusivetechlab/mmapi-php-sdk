<?php

use mmpsdk\Common\Constants\MobileMoney;
use mmpsdk\Common\Process\PollRequest;
use mmpsdk\Common\Process\BaseProcess;
use mmpsdkTest\src\Common\Process\ProcessTestCase;

class PollRequestTest extends ProcessTestCase
{
    private $serverCorrelationId = 'abcd123';

    protected function setUp(): void
    {
        $this->constructorArgs = [$this->serverCorrelationId];
        $this->requestMethod = 'GET';
        $this->requestUrl =
            MobileMoney::getBaseUrl() .
            '/requeststates/' .
            $this->serverCorrelationId;
        $this->className = PollRequest::class;
        $this->reqObj = $this->instantiateClass(
            $this->className,
            $this->constructorArgs
        );
        $this->processType = BaseProcess::SYNCHRONOUS_PROCESS;
    }
}
