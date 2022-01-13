<?php

use mmpsdk\Common\Models\Transaction;
use mmpsdk\MerchantPayment\MerchantPayment;
use mmpsdk\Common\Models\AuthorisationCode;
use mmpsdkTest\Unit\src\Common\Process\WrapperTestCase;

class MerchantPaymentTest extends WrapperTestCase
{
    public function testStaticFunctions()
    {
        $this->wrapperClass = MerchantPayment::class;

        $authorisationCode = MerchantPayment::createAuthorisationCode(
            ['accountid' => 2000],
            new AuthorisationCode()
        );
        $this->checkStaticFunctionParamCount(
            'createAuthorisationCode',
            mmpsdk\Common\Process\CreateAuthorisationCode::class
        );
        $this->checkFunctionReturnInstance(
            $authorisationCode,
            mmpsdk\Common\Process\CreateAuthorisationCode::class
        );

        $merchantTransaction = MerchantPayment::createMerchantTransaction(
            new Transaction()
        );
        $this->checkStaticFunctionParamCount(
            'createMerchantTransaction',
            mmpsdk\Common\Process\InitiateMerchantTransaction::class
        );
        $this->checkFunctionReturnInstance(
            $merchantTransaction,
            mmpsdk\Common\Process\InitiateMerchantTransaction::class
        );

        $refundTransaction = MerchantPayment::createRefundTransaction(
            new Transaction()
        );
        $this->checkStaticFunctionParamCount(
            'createRefundTransaction',
            mmpsdk\Common\Process\PaymentRefund::class
        );
        $this->checkFunctionReturnInstance(
            $refundTransaction,
            mmpsdk\Common\Process\PaymentRefund::class
        );

        $authorisationCodeObj = MerchantPayment::viewAuthorisationCode(
            ['accountId' => '1234'],
            'REF123'
        );
        $this->checkStaticFunctionParamCount(
            'viewAuthorisationCode',
            mmpsdk\Common\Process\ViewAuthorisationCode::class
        );
        $this->checkFunctionReturnInstance(
            $authorisationCodeObj,
            mmpsdk\Common\Process\ViewAuthorisationCode::class
        );

        $requestState = MerchantPayment::viewRequestState('ABC123');
        $this->checkStaticFunctionParamCount(
            'viewRequestState',
            mmpsdk\Common\Process\PollRequest::class
        );
        $this->checkFunctionReturnInstance(
            $requestState,
            mmpsdk\Common\Process\PollRequest::class
        );

        $response = MerchantPayment::viewResponse('ABC123');
        $this->checkStaticFunctionParamCount(
            'viewResponse',
            mmpsdk\Common\Process\RetrieveMissingResponse::class
        );
        $this->checkFunctionReturnInstance(
            $response,
            mmpsdk\Common\Process\RetrieveMissingResponse::class
        );

        $serviceAvailability = MerchantPayment::viewServiceAvailability(
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

        $accountBalance = MerchantPayment::viewAccountBalance([
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

        $accountTransactions = MerchantPayment::viewAccountTransactions([
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

        $retrieveTransaction = MerchantPayment::viewTransaction('ABC123');
        $this->checkStaticFunctionParamCount(
            'viewTransaction',
            mmpsdk\Common\Process\RetrieveTransaction::class
        );
        $this->checkFunctionReturnInstance(
            $retrieveTransaction,
            mmpsdk\Common\Process\RetrieveTransaction::class
        );

        $reversalTransaction = MerchantPayment::createReversal('ABC123');
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
