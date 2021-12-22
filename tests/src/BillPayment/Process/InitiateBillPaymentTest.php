<?php

use mmpsdk\Common\Process\BaseProcess;
use mmpsdk\Common\Constants\MobileMoney;
use mmpsdkTest\src\Common\Process\ProcessTestCase;
use mmpsdk\BillPayment\Models\BillPay;
use mmpsdk\BillPayment\Process\InitiateBillPayment;

class InitiateBillPaymentTest extends ProcessTestCase
{
    protected function setUp(): void
    {
        $billPay = new BillPay();
        $billPay->setCurrency('GBP')->setAmountPaid('5.30');
        $accountIdentifier = [
            'accountid' => 1
        ];
        $billReference = 'REF-000001';
        $this->constructorArgs = [
            $accountIdentifier,
            $billReference,
            $billPay,
            'http://example.com/'
        ];
        $this->requestMethod = 'POST';
        $this->requestUrl =
            MobileMoney::getBaseUrl() .
            '/accounts/accountid/1/bills/REF-000001/payments';
        $this->requestParams = ['{"amountPaid":"5.30","currency":"GBP"}'];
        $this->className = InitiateBillPayment::class;
        $this->requestOptions = ['X-Callback-URL: http://example.com/'];
        $this->reqObj = $this->instantiateClass(
            $this->className,
            $this->constructorArgs
        );
        $this->processType = BaseProcess::ASYNCHRONOUS_PROCESS;
    }
}
