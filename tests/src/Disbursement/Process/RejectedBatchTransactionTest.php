<?php

use mmpsdk\Common\Process\BaseProcess;
use mmpsdk\Common\Constants\MobileMoney;
use mmpsdk\Disbursement\Process\RejectedBatchTransaction;
use mmpsdk\Disbursement\Models\BatchRejection;
use mmpsdkTest\src\Common\Process\ProcessTestCase;

class RejectedBatchTransactionTest extends ProcessTestCase
{
    protected function setUp(): void
    {
        $batchId = 'ABC123';
        $this->constructorArgs = [$batchId];
        $this->requestMethod = 'GET';
        $this->requestUrl =
            MobileMoney::getBaseUrl() .
            '/batchtransactions/' .
            $batchId .
            '/rejections';
        $this->className = RejectedBatchTransaction::class;
        $this->reqObj = $this->instantiateClass(
            $this->className,
            $this->constructorArgs
        );
        $this->processType = BaseProcess::SYNCHRONOUS_PROCESS;
        $this->mockResponseObject = 'BatchRejection.json';
        $this->responseType = BatchRejection::class;
        $this->arrayResponse = true;
    }
}
