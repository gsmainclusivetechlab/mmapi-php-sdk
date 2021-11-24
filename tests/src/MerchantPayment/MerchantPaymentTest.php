<?php

use mmpsdk\Common\Models\Transaction;
use mmpsdk\MerchantPayment\MerchantPayment;
use mmpsdk\Common\Models\AuthorisationCode;
use mmpsdkTest\src\Common\Process\WrapperTestCase;

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
    }
}
