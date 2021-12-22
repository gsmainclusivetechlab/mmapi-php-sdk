<?php

use mmpsdk\Common\Process\BaseProcess;
use mmpsdk\BillPayment\Models\Bill;
use mmpsdk\BillPayment\Process\RetrieveAccountBills;
use mmpsdk\BillPayment\BillPayment;
use mmpsdkTest\src\Integration\IntegrationTestCase;

class ViewAccountBillsIntegrationTest extends IntegrationTestCase
{
    private static $accountIdentifier;
    private static $filter;

    protected function getProcessInstanceType()
    {
        return RetrieveAccountBills::class;
    }

    protected function getResponseInstanceType()
    {
        return Bill::class;
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
        self::$filter = [
            'limit' => 5
        ];
    }

    protected function setUp(): void
    {
        $this->request = BillPayment::viewAccountBills(
            self::$accountIdentifier,
            self::$filter
        );
    }
}
