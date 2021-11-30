<?php

use mmpsdk\RecurringPayment\Models\DebitMandate;
use mmpsdk\RecurringPayment\RecurringPayment;
use mmpsdkTest\src\Common\Process\WrapperTestCase;

class RecurringPaymentTest extends WrapperTestCase
{
    public function testStaticFunctions()
    {
        $this->wrapperClass = RecurringPayment::class;

        $requestState = RecurringPayment::viewRequestState('ABC123');
        $this->checkStaticFunctionParamCount(
            'viewRequestState',
            mmpsdk\Common\Process\PollRequest::class
        );
        $this->checkFunctionReturnInstance(
            $requestState,
            mmpsdk\Common\Process\PollRequest::class
        );

        $response = RecurringPayment::viewResponse('ABC123');
        $this->checkStaticFunctionParamCount(
            'viewResponse',
            mmpsdk\Common\Process\RetrieveMissingResponse::class
        );
        $this->checkFunctionReturnInstance(
            $response,
            mmpsdk\Common\Process\RetrieveMissingResponse::class
        );

        $serviceAvailability = RecurringPayment::viewServiceAvailability('ABC123');
        $this->checkStaticFunctionParamCount(
            'viewServiceAvailability',
            mmpsdk\Common\Process\ServiceAvailability::class
        );
        $this->checkFunctionReturnInstance(
            $serviceAvailability,
            mmpsdk\Common\Process\ServiceAvailability::class
        );

        $accountBalance = RecurringPayment::viewAccountBalance([
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

        $accountTransactions = RecurringPayment::viewAccountTransactions([
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

        $retrieveTransaction = RecurringPayment::viewTransaction('ABC123');
        $this->checkStaticFunctionParamCount(
            'viewTransaction',
            mmpsdk\Common\Process\RetrieveTransaction::class
        );
        $this->checkFunctionReturnInstance(
            $retrieveTransaction,
            mmpsdk\Common\Process\RetrieveTransaction::class
        );

        $reversalTransaction = RecurringPayment::createReversal('ABC123');
        $this->checkStaticFunctionParamCount(
            'createReversal',
            mmpsdk\Common\Process\TransactionReversal::class
        );
        $this->checkFunctionReturnInstance(
            $reversalTransaction,
            mmpsdk\Common\Process\TransactionReversal::class
        );

        $debitMandate = RecurringPayment::createAccountDebitMandate(
            ['accountid' => '2000'],
            new DebitMandate()
        );
        $this->checkStaticFunctionParamCount(
            'createAccountDebitMandate',
            mmpsdk\RecurringPayment\Process\AccountDebitMandate::class
        );
        $this->checkFunctionReturnInstance(
            $debitMandate,
            mmpsdk\RecurringPayment\Process\AccountDebitMandate::class
        );

        $debitMandateGet = RecurringPayment::viewAccountDebitMandate(
            ['accountid' => '2000'],
            'ABC123'
        );
        $this->checkStaticFunctionParamCount(
            'viewAccountDebitMandate',
            mmpsdk\RecurringPayment\Process\RetrieveAccountDebitMandate::class
        );
        $this->checkFunctionReturnInstance(
            $debitMandateGet,
            mmpsdk\RecurringPayment\Process\RetrieveAccountDebitMandate::class
        );
    }
}
