<?php

use mmpsdk\Common\Models\Transaction;
use mmpsdk\Common\Process\RetrieveAccountTransactions;
use mmpsdk\Common\Process\BaseProcess;
use mmpsdk\InternationalTransfer\InternationalTransfer;
use mmpsdkTest\Integration\src\IntegrationTestCase;

class ViewAccountTransactionsIntegrationTest extends IntegrationTestCase
{
    private static $accountIdentifier;
    private static $filter;

    protected function getProcessInstanceType()
    {
        return RetrieveAccountTransactions::class;
    }

    protected function getResponseInstanceType()
    {
        return Transaction::class;
    }

    protected function getRequestType()
    {
        return BaseProcess::SYNCHRONOUS_PROCESS;
    }

    public static function setUpBeforeClass(): void
    {
        self::$accountIdentifier = [
            'accountid' => 2000
        ];
        self::$filter = [
            'limit' => 5
        ];
    }

    protected function setUp(): void
    {
        $this->request = InternationalTransfer::viewAccountTransactions(
            self::$accountIdentifier,
            self::$filter
        );
    }
}
