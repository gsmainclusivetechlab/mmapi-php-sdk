<?php

use mmpsdk\RecurringPayment\Models\DebitMandate;
use mmpsdk\RecurringPayment\RecurringPayment;
use mmpsdkTest\src\Common\Process\WrapperTestCase;

class RecurringPaymentTest extends WrapperTestCase
{
    public function testStaticFunctions()
    {
        $this->wrapperClass = RecurringPayment::class;

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
