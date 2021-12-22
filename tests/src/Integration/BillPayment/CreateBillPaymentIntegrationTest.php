<?php

use mmpsdk\Common\Models\RequestState;
use mmpsdk\Common\Process\BaseProcess;
use mmpsdk\BillPayment\Models\BillPay;
use mmpsdk\BillPayment\Process\InitiateBillPayment;
use mmpsdk\BillPayment\BillPayment;
use mmpsdkTest\src\Integration\IntegrationTestCase;

class CreateBillPaymentIntegrationTest extends IntegrationTestCase
{
    private static $billPay;
    private static $accountIdentifier;
    private static $billReference;

    protected function getProcessInstanceType()
    {
        return InitiateBillPayment::class;
    }

    protected function getResponseInstanceType()
    {
        return RequestState::class;
    }

    protected function getRequestType()
    {
        return BaseProcess::ASYNCHRONOUS_PROCESS;
    }

    public static function setUpBeforeClass(): void
    {
        self::$billPay = new BillPay();
        self::$billPay->setCurrency('GBP')->setAmountPaid('5.30');
        self::$accountIdentifier = ['accountid' => 2000];
        self::$billReference = 'REF-000001';
    }

    protected function setUp(): void
    {
        $this->request = BillPayment::createBillPayment(
            self::$accountIdentifier,
            self::$billReference,
            self::$billPay
        );
    }
}
