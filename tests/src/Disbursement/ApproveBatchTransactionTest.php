<?php

use mmpsdk\Common\Process\BaseProcess;
use mmpsdk\Common\Constants\MobileMoney;
use mmpsdk\Disbursement\Enums\BatchStatus;
use mmpsdk\Disbursement\Models\BatchTransaction;
use mmpsdk\Disbursement\Process\ApproveBatchTransaction;
use mmpsdkTest\src\Common\Process\ProcessTestCase;

class ApproveBatchTransactionTest extends ProcessTestCase
{
    protected function setUp(): void
    {
        $batchTransaction = new BatchTransaction();
        $batchTransaction->setBatchStatus(BatchStatus::APPROVED);

        $batchId = 'ABC123';

        $this->constructorArgs = [$batchId, $batchTransaction, 'http://example.com/'];
        $this->requestMethod = 'PATCH';
        $this->requestUrl = MobileMoney::getBaseUrl() . '/batchtransactions/' . $batchId;
        $this->requestParams = [
            '{"batchStatus": "approved"}'
        ];
        $this->className = ApproveBatchTransaction::class;
        $this->requestOptions = ['X-Callback-URL: http://example.com/'];
        $this->reqObj = $this->instantiateClass(
            $this->className,
            $this->constructorArgs
        );
        $this->processType = BaseProcess::ASYNCHRONOUS_PROCESS;
    }
}
