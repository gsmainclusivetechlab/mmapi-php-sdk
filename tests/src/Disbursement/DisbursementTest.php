<?php

use mmpsdk\Common\Models\Transaction;
use mmpsdk\Disbursement\Disbursement;
use mmpsdk\Disbursement\Models\BatchTransaction;
use mmpsdk\MerchantPayment\MerchantPayment;
use mmpsdk\MerchantPayment\Models\AuthorisationCode;
use mmpsdkTest\src\Common\Process\WrapperTestCase;

class DisbursementTest extends WrapperTestCase
{
    public function testStaticFunctions()
    {
        $this->wrapperClass = Disbursement::class;

        $disbursementTransaction = Disbursement::createDisbursementTransaction(
            new Transaction()
        );
        $this->checkStaticFunctionParamCount(
            'createDisbursementTransaction',
            mmpsdk\Disbursement\Process\InitiateDisbursement::class
        );
        $this->checkFunctionReturnInstance(
            $disbursementTransaction,
            mmpsdk\Disbursement\Process\InitiateDisbursement::class
        );

        $batchTransaction = Disbursement::createBatchTransaction(
            new BatchTransaction()
        );
        $this->checkStaticFunctionParamCount(
            'createBatchTransaction',
            mmpsdk\Disbursement\Process\InitiateBulkDisbursement::class
        );
        $this->checkFunctionReturnInstance(
            $batchTransaction,
            mmpsdk\Disbursement\Process\InitiateBulkDisbursement::class
        );

        $batchCompletion = Disbursement::viewBatchCompletions('REF123');
        $this->checkStaticFunctionParamCount(
            'viewBatchCompletions',
            mmpsdk\Disbursement\Process\CompletedBatchTransaction::class
        );
        $this->checkFunctionReturnInstance(
            $batchCompletion,
            mmpsdk\Disbursement\Process\CompletedBatchTransaction::class
        );

        $batchRejection = Disbursement::viewBatchRejections('REF123');
        $this->checkStaticFunctionParamCount(
            'viewBatchRejections',
            mmpsdk\Disbursement\Process\RejectedBatchTransaction::class
        );
        $this->checkFunctionReturnInstance(
            $batchRejection,
            mmpsdk\Disbursement\Process\RejectedBatchTransaction::class
        );

        $batchRejection = Disbursement::viewBatchTransaction('REF123');
        $this->checkStaticFunctionParamCount(
            'viewBatchTransaction',
            mmpsdk\Disbursement\Process\RetrieveBatchTransaction::class
        );
        $this->checkFunctionReturnInstance(
            $batchRejection,
            mmpsdk\Disbursement\Process\RetrieveBatchTransaction::class
        );

        $batchUpdate = Disbursement::updateBatchTransaction('REF123');
        $this->checkStaticFunctionParamCount(
            'updateBatchTransaction',
            mmpsdk\Disbursement\Process\ApproveBatchTransaction::class
        );
        $this->checkFunctionReturnInstance(
            $batchUpdate,
            mmpsdk\Disbursement\Process\ApproveBatchTransaction::class
        );
    }
}
