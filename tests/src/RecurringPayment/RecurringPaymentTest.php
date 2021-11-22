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
    }
}
