<?php

use mmpsdk\Common\Models\Transaction;
use mmpsdk\InternationalTransfer\InternationalTransfer;
use mmpsdk\Common\Models\Quotation;
use mmpsdkTest\src\Common\Process\WrapperTestCase;

class InternationalTransferTest extends WrapperTestCase
{
    public function testStaticFunctions()
    {
        $this->wrapperClass = InternationalTransfer::class;

        $internationalTransaction = InternationalTransfer::createInternationalTransaction(
            new Transaction()
        );
        $this->checkStaticFunctionParamCount(
            'createInternationalTransaction',
            mmpsdk\InternationalTransfer\Process\InitiateInternationalTransaction::class
        );
        $this->checkFunctionReturnInstance(
            $internationalTransaction,
            mmpsdk\InternationalTransfer\Process\InitiateInternationalTransaction::class
        );

        $requestState = InternationalTransfer::viewRequestState('ABC123');
        $this->checkStaticFunctionParamCount(
            'viewRequestState',
            mmpsdk\Common\Process\PollRequest::class
        );
        $this->checkFunctionReturnInstance(
            $requestState,
            mmpsdk\Common\Process\PollRequest::class
        );

        $response = InternationalTransfer::viewResponse('ABC123');
        $this->checkStaticFunctionParamCount(
            'viewResponse',
            mmpsdk\Common\Process\RetrieveMissingResponse::class
        );
        $this->checkFunctionReturnInstance(
            $response,
            mmpsdk\Common\Process\RetrieveMissingResponse::class
        );

        $serviceAvailability = InternationalTransfer::viewServiceAvailability(
            'ABC123'
        );
        $this->checkStaticFunctionParamCount(
            'viewServiceAvailability',
            mmpsdk\Common\Process\ServiceAvailability::class
        );
        $this->checkFunctionReturnInstance(
            $serviceAvailability,
            mmpsdk\Common\Process\ServiceAvailability::class
        );

        $accountBalance = InternationalTransfer::viewAccountBalance([
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

        $accountTransactions = InternationalTransfer::viewAccountTransactions([
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

        $retrieveTransaction = InternationalTransfer::viewTransaction('ABC123');
        $this->checkStaticFunctionParamCount(
            'viewTransaction',
            mmpsdk\Common\Process\RetrieveTransaction::class
        );
        $this->checkFunctionReturnInstance(
            $retrieveTransaction,
            mmpsdk\Common\Process\RetrieveTransaction::class
        );

        $reversalTransaction = InternationalTransfer::createReversal('ABC123');
        $this->checkStaticFunctionParamCount(
            'createReversal',
            mmpsdk\Common\Process\TransactionReversal::class
        );
        $this->checkFunctionReturnInstance(
            $reversalTransaction,
            mmpsdk\Common\Process\TransactionReversal::class
        );

        $createdQuotation = InternationalTransfer::createQuotation(
            new Quotation()
        );
        $this->checkStaticFunctionParamCount(
            'createQuotation',
            mmpsdk\Common\Process\TransferQuotation::class
        );
        $this->checkFunctionReturnInstance(
            $createdQuotation,
            mmpsdk\Common\Process\TransferQuotation::class
        );

        $quotation = InternationalTransfer::viewQuotation('REF123');
        $this->checkStaticFunctionParamCount(
            'viewQuotation',
            mmpsdk\Common\Process\ViewQuotation::class
        );
        $this->checkFunctionReturnInstance(
            $quotation,
            mmpsdk\Common\Process\ViewQuotation::class
        );
    }
}
