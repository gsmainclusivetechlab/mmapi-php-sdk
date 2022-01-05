<?php

use mmpsdk\Common\Process\BaseProcess;
use mmpsdk\Common\Constants\MobileMoney;
use mmpsdkTest\src\Common\Process\ProcessTestCase;
use mmpsdk\BillPayment\Process\RetrieveBillPayment;
use mmpsdk\BillPayment\Models\BillPay;

class RetrieveBillPaymentTest extends ProcessTestCase
{
    protected function setUp(): void
    {
        $this->constructorArgs = [
            ['accountid' => '2000'],
            'REF-000001',
            [
                'limit' => 5
            ]
        ];
        $this->requestMethod = 'GET';
        $this->requestUrl =
            MobileMoney::getBaseUrl() .
            '/accounts/accountid/2000/bills/REF-000001/payments?limit=5';
        $this->className = RetrieveBillPayment::class;
        $this->reqObj = $this->instantiateClass(
            $this->className,
            $this->constructorArgs
        );
        $this->processType = BaseProcess::SYNCHRONOUS_PROCESS;
        $this->mockResponseObject = 'BillPay.json';
        $this->responseType = BillPay::class;
    }
}
