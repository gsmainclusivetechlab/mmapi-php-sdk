<?php

use mmpsdk\Common\Models\Transaction;
use mmpsdk\AccountLinking\AccountLinking;
use mmpsdk\AccountLinking\Models\Link;
use mmpsdkTest\src\Common\Process\WrapperTestCase;

class AccountLinkingTest extends WrapperTestCase
{
    public function testStaticFunctions()
    {
        $this->wrapperClass = AccountLinking::class;

        $initiateAccountLink = AccountLinking::createAccountLink(
            ['accountid' => 2000],
            new Link()
        );
        $this->checkStaticFunctionParamCount(
            'createAccountLink',
            mmpsdk\AccountLinking\Process\InitiateAccountLink::class
        );
        $this->checkFunctionReturnInstance(
            $initiateAccountLink,
            mmpsdk\AccountLinking\Process\InitiateAccountLink::class
        );

        $retrieveAccountLink = AccountLinking::ViewAccountLink(
            ['accountid' => 2000],
            'REF123'
        );
        $this->checkStaticFunctionParamCount(
            'ViewAccountLink',
            mmpsdk\AccountLinking\Process\ViewAccountLink::class
        );
        $this->checkFunctionReturnInstance(
            $retrieveAccountLink,
            mmpsdk\AccountLinking\Process\ViewAccountLink::class
        );

        $requestState = AccountLinking::viewRequestState('ABC123');
        $this->checkStaticFunctionParamCount(
            'viewRequestState',
            mmpsdk\Common\Process\PollRequest::class
        );
        $this->checkFunctionReturnInstance(
            $requestState,
            mmpsdk\Common\Process\PollRequest::class
        );

        $response = AccountLinking::viewResponse('ABC123');
        $this->checkStaticFunctionParamCount(
            'viewResponse',
            mmpsdk\Common\Process\RetrieveMissingResponse::class
        );
        $this->checkFunctionReturnInstance(
            $response,
            mmpsdk\Common\Process\RetrieveMissingResponse::class
        );

        $serviceAvailability = AccountLinking::viewServiceAvailability(
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

        $accountBalance = AccountLinking::viewAccountBalance([
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

        $accountTransactions = AccountLinking::viewAccountTransactions([
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

        $retrieveTransaction = AccountLinking::viewTransaction('ABC123');
        $this->checkStaticFunctionParamCount(
            'viewTransaction',
            mmpsdk\Common\Process\RetrieveTransaction::class
        );
        $this->checkFunctionReturnInstance(
            $retrieveTransaction,
            mmpsdk\Common\Process\RetrieveTransaction::class
        );

        $reversalTransaction = AccountLinking::createReversal('ABC123');
        $this->checkStaticFunctionParamCount(
            'createReversal',
            mmpsdk\Common\Process\TransactionReversal::class
        );
        $this->checkFunctionReturnInstance(
            $reversalTransaction,
            mmpsdk\Common\Process\TransactionReversal::class
        );

        $transferTransaction = AccountLinking::createTransferTransaction(
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
