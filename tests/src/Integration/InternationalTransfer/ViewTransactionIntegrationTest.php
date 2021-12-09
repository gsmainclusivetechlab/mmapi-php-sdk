<?php

use mmpsdk\Common\Models\Transaction;
use mmpsdk\Common\Process\RetrieveTransaction;
use mmpsdk\Common\Process\BaseProcess;
use mmpsdk\InternationalTransfer\InternationalTransfer;
use mmpsdkTest\src\Integration\IntegrationTestCase;

class ViewTransactionIntegrationTest extends IntegrationTestCase
{
    private static $transactionReference;

    protected function getProcessInstanceType()
    {
        return RetrieveTransaction::class;
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
        self::$transactionReference = 'REF-1636106992007';
    }

    protected function setUp(): void
    {
        $this->request = InternationalTransfer::viewTransaction(
            self::$transactionReference
        );
    }
}