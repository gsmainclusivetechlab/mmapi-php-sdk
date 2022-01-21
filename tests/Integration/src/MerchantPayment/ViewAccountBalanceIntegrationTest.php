<?php

use mmpsdk\Common\Models\Balance;
use mmpsdk\Common\Process\AccountBalance;
use mmpsdk\Common\Process\BaseProcess;
use mmpsdk\MerchantPayment\MerchantPayment;
use mmpsdkTest\Integration\src\IntegrationTestCase;

class ViewAccountBalanceIntegrationTest extends IntegrationTestCase
{
    private static $accountIdentifier;

    protected function getProcessInstanceType()
    {
        return AccountBalance::class;
    }

    protected function getResponseInstanceType()
    {
        return Balance::class;
    }

    protected function getRequestType()
    {
        return BaseProcess::SYNCHRONOUS_PROCESS;
    }

    public static function setUpBeforeClass(): void
    {
        self::$accountIdentifier = [
            'msisdn' => '+44012345678'
        ];
    }

    protected function setUp(): void
    {
        $this->request = MerchantPayment::viewAccountBalance(
            self::$accountIdentifier
        );
    }
}
