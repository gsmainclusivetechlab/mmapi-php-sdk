<?php

use mmpsdk\Common\Process\BaseProcess;
use mmpsdk\Common\Constants\MobileMoney;
use mmpsdkTest\Unit\src\Common\Process\ProcessTestCase;
use mmpsdk\Common\Process\TransactionReversal;

class TransactionReversalTest extends ProcessTestCase
{
    protected function setUp(): void
    {
        $this->constructorArgs = ['REF-123', null, 'http://example.com/'];
        $this->requestMethod = 'POST';
        $this->requestUrl =
            MobileMoney::getBaseUrl() . '/transactions/REF-123/reversals';
        $this->requestParams = ['{"type":"reversal"}'];
        $this->className = TransactionReversal::class;
        $this->requestOptions = ['X-Callback-URL: http://example.com/'];
        $this->reqObj = $this->instantiateClass(
            $this->className,
            $this->constructorArgs
        );
        $this->processType = BaseProcess::ASYNCHRONOUS_PROCESS;
    }
}
