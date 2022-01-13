<?php

use mmpsdk\Common\Process\BaseProcess;
use mmpsdk\Common\Constants\MobileMoney;
use mmpsdk\Disbursement\Process\RetrieveBatchTransaction;
use mmpsdk\Disbursement\Models\BatchTransaction;
use mmpsdkTest\Unit\src\Common\Process\ProcessTestCase;

class RetrieveBatchTransactionTest extends ProcessTestCase
{
    protected function setUp(): void
    {
        $batchId = 'ABC123';
        $this->constructorArgs = [$batchId];
        $this->requestMethod = 'GET';
        $this->requestUrl =
            MobileMoney::getBaseUrl() . '/batchtransactions/' . $batchId;
        $this->className = RetrieveBatchTransaction::class;
        $this->reqObj = $this->instantiateClass(
            $this->className,
            $this->constructorArgs
        );
        $this->processType = BaseProcess::SYNCHRONOUS_PROCESS;
        $this->mockResponseObject = 'BatchTransaction.json';
        $this->responseType = BatchTransaction::class;
    }
}
