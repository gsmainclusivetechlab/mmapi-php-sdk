<?php

use mmpsdk\Common\Models\Transaction;
use mmpsdk\MerchantPayment\MerchantPayment;
use mmpsdk\MerchantPayment\Models\AuthorisationCode;
use mmpsdkTest\src\Common\Process\WrapperTestCase;

class MerchantPaymentTest extends WrapperTestCase
{
    public function testStaticFunctions()
    {
        $this->wrapperClass = MerchantPayment::class;

        $authorisationCode = MerchantPayment::createAuthorisationCode(['accountid' => 2000], new AuthorisationCode());
        $this->checkStaticFunctionParamCount(
            'createAuthorisationCode',
            mmpsdk\MerchantPayment\Process\CreateAuthorisationCode::class
        );
        $this->checkFunctionReturnInstance(
            $authorisationCode,
            mmpsdk\MerchantPayment\Process\CreateAuthorisationCode::class
        );

        $merchantTransaction = MerchantPayment::createMerchantTransaction(new Transaction());
        $this->checkStaticFunctionParamCount(
            'createMerchantTransaction',
            mmpsdk\MerchantPayment\Process\InitiatePayment::class
        );
        $this->checkFunctionReturnInstance(
            $merchantTransaction,
            mmpsdk\MerchantPayment\Process\InitiatePayment::class
        );

        $refundTransaction = MerchantPayment::createRefundTransaction(new Transaction());
        $this->checkStaticFunctionParamCount(
            'createRefundTransaction',
            mmpsdk\MerchantPayment\Process\PaymentRefund::class
        );
        $this->checkFunctionReturnInstance(
            $refundTransaction,
            mmpsdk\MerchantPayment\Process\PaymentRefund::class
        );

        $authorisationCodeObj = MerchantPayment::viewAuthorisationCode(['accountId' => '1234'], 'REF123');
        $this->checkStaticFunctionParamCount(
            'viewAuthorisationCode',
            mmpsdk\MerchantPayment\Process\ViewAuthorisationCode::class
        );
        $this->checkFunctionReturnInstance(
            $authorisationCodeObj,
            mmpsdk\MerchantPayment\Process\ViewAuthorisationCode::class
        );
    }
}
