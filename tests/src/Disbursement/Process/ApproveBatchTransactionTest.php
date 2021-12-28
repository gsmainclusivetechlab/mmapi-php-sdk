<?php

use mmpsdk\Common\Process\BaseProcess;
use mmpsdk\Common\Constants\MobileMoney;
use mmpsdk\Disbursement\Process\ApproveBatchTransaction;
use mmpsdkTest\src\Common\Process\ProcessTestCase;
use mmpsdk\Common\Models\PatchData;
class ApproveBatchTransactionTest extends ProcessTestCase
{
    protected function setUp(): void
    {
        $batchId = 'ABC123';

        $patchRequest = new PatchData();
        $patchRequest
            ->setOp(PatchData::REPLACE)
            ->setPath('/batchStatus')
            ->setValue('approved');

        $this->constructorArgs = [[$patchRequest], $batchId, 'http://example.com/'];
        $this->requestMethod = 'PATCH';
        $this->requestUrl =
            MobileMoney::getBaseUrl() . '/batchtransactions/' . $batchId;
        $this->requestParams = [
            '[{"op":"replace","value":"approved","path":"/batchStatus"}]'
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
