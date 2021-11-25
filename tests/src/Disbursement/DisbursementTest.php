<?php

use mmpsdk\Common\Models\Transaction;
use mmpsdk\Disbursement\Disbursement;
use mmpsdk\Disbursement\Models\BatchTransaction;
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

        $requestState = Disbursement::viewRequestState('ABC123');
        $this->checkStaticFunctionParamCount(
            'viewRequestState',
            mmpsdk\Common\Process\PollRequest::class
        );
        $this->checkFunctionReturnInstance(
            $requestState,
            mmpsdk\Common\Process\PollRequest::class
        );

        $response = Disbursement::viewResponse('ABC123');
        $this->checkStaticFunctionParamCount(
            'viewResponse',
            mmpsdk\Common\Process\RetrieveMissingResponse::class
        );
        $this->checkFunctionReturnInstance(
            $response,
            mmpsdk\Common\Process\RetrieveMissingResponse::class
        );

        $serviceAvailability = Disbursement::viewServiceAvailability('ABC123');
        $this->checkStaticFunctionParamCount(
            'viewServiceAvailability',
            mmpsdk\Common\Process\ServiceAvailability::class
        );
        $this->checkFunctionReturnInstance(
            $serviceAvailability,
            mmpsdk\Common\Process\ServiceAvailability::class
        );

        $accountBalance = Disbursement::viewAccountBalance([
            'accountid' => 2000
        ]);
        $this->checkStaticFunctionParamCount(
            'viewAccountBalance',
            mmpsdk\Common\Process\AccountBalance::class
        );
        $this->checkFunctionReturnInstance(
            $accountBalance,
            mmpsdk\Common\Process\AccountBalance::class
        );

        $accountTransactions = Disbursement::viewAccountTransactions([
            'accountid' => 2000
        ]);
        $this->checkStaticFunctionParamCount(
            'viewAccountTransactions',
            mmpsdk\Common\Process\RetrieveAccountTransactions::class
        );
        $this->checkFunctionReturnInstance(
            $accountTransactions,
            mmpsdk\Common\Process\RetrieveAccountTransactions::class
        );

        $retrieveTransaction = Disbursement::viewTransaction('ABC123');
        $this->checkStaticFunctionParamCount(
            'viewTransaction',
            mmpsdk\Common\Process\RetrieveTransaction::class
        );
        $this->checkFunctionReturnInstance(
            $retrieveTransaction,
            mmpsdk\Common\Process\RetrieveTransaction::class
        );

        $reversalTransaction = Disbursement::createReversal('ABC123');
        $this->checkStaticFunctionParamCount(
            'createReversal',
            mmpsdk\Common\Process\TransactionReversal::class
        );
        $this->checkFunctionReturnInstance(
            $reversalTransaction,
            mmpsdk\Common\Process\TransactionReversal::class
        );
    }
}
