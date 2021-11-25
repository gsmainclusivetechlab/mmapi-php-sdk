<?php

use mmpsdk\Common\Models\Transaction;
use mmpsdk\P2PTransfer\P2PTransfer;
use mmpsdk\Common\Models\Quotation;
use mmpsdkTest\src\Common\Process\WrapperTestCase;

class P2PTransferTest extends WrapperTestCase
{
    public function testStaticFunctions()
    {
        $this->wrapperClass = P2PTransfer::class;

        $requestState = P2PTransfer::viewRequestState('ABC123');
        $this->checkStaticFunctionParamCount(
            'viewRequestState',
            mmpsdk\Common\Process\PollRequest::class
        );
        $this->checkFunctionReturnInstance(
            $requestState,
            mmpsdk\Common\Process\PollRequest::class
        );

        $response = P2PTransfer::viewResponse('ABC123');
        $this->checkStaticFunctionParamCount(
            'viewResponse',
            mmpsdk\Common\Process\RetrieveMissingResponse::class
        );
        $this->checkFunctionReturnInstance(
            $response,
            mmpsdk\Common\Process\RetrieveMissingResponse::class
        );

        $serviceAvailability = P2PTransfer::viewServiceAvailability('ABC123');
        $this->checkStaticFunctionParamCount(
            'viewServiceAvailability',
            mmpsdk\Common\Process\ServiceAvailability::class
        );
        $this->checkFunctionReturnInstance(
            $serviceAvailability,
            mmpsdk\Common\Process\ServiceAvailability::class
        );

        $accountBalance = P2PTransfer::viewAccountBalance([
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

        $accountTransactions = P2PTransfer::viewAccountTransactions([
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

        $retrieveTransaction = P2PTransfer::viewTransaction('ABC123');
        $this->checkStaticFunctionParamCount(
            'viewTransaction',
            mmpsdk\Common\Process\RetrieveTransaction::class
        );
        $this->checkFunctionReturnInstance(
            $retrieveTransaction,
            mmpsdk\Common\Process\RetrieveTransaction::class
        );

        $reversalTransaction = P2PTransfer::createReversal('ABC123');
        $this->checkStaticFunctionParamCount(
            'createReversal',
            mmpsdk\Common\Process\TransactionReversal::class
        );
        $this->checkFunctionReturnInstance(
            $reversalTransaction,
            mmpsdk\Common\Process\TransactionReversal::class
        );

        $createdQuotation = P2PTransfer::createQuotation(new Quotation());
        $this->checkStaticFunctionParamCount(
            'createQuotation',
            mmpsdk\Common\Process\TransferQuotation::class
        );
        $this->checkFunctionReturnInstance(
            $createdQuotation,
            mmpsdk\Common\Process\TransferQuotation::class
        );

        $quotation = P2PTransfer::viewQuotation('REF123');
        $this->checkStaticFunctionParamCount(
            'viewQuotation',
            mmpsdk\Common\Process\ViewQuotation::class
        );
        $this->checkFunctionReturnInstance(
            $quotation,
            mmpsdk\Common\Process\ViewQuotation::class
        );

        $accountName = P2PTransfer::viewAccountName(['accountid' => 2000]);
        $this->checkStaticFunctionParamCount(
            'viewAccountName',
            mmpsdk\Common\Process\RetrieveAccountName::class
        );
        $this->checkFunctionReturnInstance(
            $accountName,
            mmpsdk\Common\Process\RetrieveAccountName::class
        );

        $transferTransaction = P2PTransfer::createTransferTransaction(
            new Transaction()
        );
        $this->checkStaticFunctionParamCount(
            'createTransferTransaction',
            mmpsdk\Common\Process\InitiateTransferTransaction::class
        );
        $this->checkFunctionReturnInstance(
            $transferTransaction,
            mmpsdk\Common\Process\InitiateTransferTransaction::class
        );
    }
}
