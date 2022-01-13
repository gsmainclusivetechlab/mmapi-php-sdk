<?php

use mmpsdk\Common\Process\BaseProcess;
use mmpsdk\BillPayment\Models\BillPay;
use mmpsdk\BillPayment\Process\RetrieveBillPayment;
use mmpsdk\BillPayment\BillPayment;
use mmpsdkTest\Integration\src\IntegrationTestCase;

class ViewBillPaymentIntegrationTest extends IntegrationTestCase
{
    private static $accountIdentifier;
    private static $billReference;
    private static $filter;

    protected function getProcessInstanceType()
    {
        return RetrieveBillPayment::class;
    }

    protected function getResponseInstanceType()
    {
        return BillPay::class;
    }

    protected function getRequestType()
    {
        return BaseProcess::SYNCHRONOUS_PROCESS;
    }

    public static function setUpBeforeClass(): void
    {
        self::$accountIdentifier = [
            'accountid' => 1
        ];
        self::$billReference = 'REF-000001';
        self::$filter = [
            'limit' => 5
        ];
    }

    protected function setUp(): void
    {
        $this->request = BillPayment::viewBillPayment(
            self::$accountIdentifier,
            self::$billReference,
            self::$filter
        );
    }
}
