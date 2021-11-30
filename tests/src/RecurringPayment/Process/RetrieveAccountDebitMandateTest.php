<?php

use mmpsdk\Common\Process\BaseProcess;
use mmpsdk\Common\Constants\MobileMoney;
use mmpsdk\RecurringPayment\Process\RetrieveAccountDebitMandate;
use mmpsdkTest\src\Common\Process\ProcessTestCase;

class RetrieveAccountDebitMandateTest extends ProcessTestCase
{
    protected function setUp(): void
    {
        $mandateReference = 'ABC123';
        $this->constructorArgs = [['accountid' => '2000'], $mandateReference];
        $this->requestMethod = 'GET';
        $this->requestUrl =
            MobileMoney::getBaseUrl() . '/accounts/accountid/2000/debitmandates/ABC123';
        $this->className = RetrieveAccountDebitMandate::class;
        $this->reqObj = $this->instantiateClass(
            $this->className,
            $this->constructorArgs
        );
        $this->processType = BaseProcess::SYNCHRONOUS_PROCESS;
    }
}
