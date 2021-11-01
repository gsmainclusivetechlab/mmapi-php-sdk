<?php

use mmpsdk\Common\Process\BaseProcess;
use mmpsdk\Common\Constants\MobileMoney;
use mmpsdk\Disbursement\Process\RetrieveCompletedBatchTransaction;
use mmpsdkTest\src\Common\Process\ProcessTestCase;

class RetrieveCompletedBatchTransactionTest extends ProcessTestCase
{
    protected function setUp(): void
    {
        $batchId = 'ABC123';
        $this->constructorArgs = [
            $batchId
        ];
        $this->requestMethod = 'GET';
        $this->requestUrl =
            MobileMoney::getBaseUrl() . '/batchtransactions/' . $batchId . '/completions';
        $this->className = RetrieveCompletedBatchTransaction::class;
        $this->reqObj = $this->instantiateClass(
            $this->className,
            $this->constructorArgs
        );
        $this->processType = BaseProcess::SYNCHRONOUS_PROCESS;
    }
}
