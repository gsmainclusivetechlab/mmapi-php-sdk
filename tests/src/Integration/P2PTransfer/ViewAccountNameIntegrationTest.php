<?php

use mmpsdk\Common\Models\AccountHolderName;
use mmpsdk\Common\Process\RetrieveAccountName;
use mmpsdk\Common\Process\BaseProcess;
use mmpsdk\P2PTransfer\P2PTransfer;
use mmpsdkTest\src\Integration\IntegrationTestCase;

class ViewAccountNameIntegrationTest extends IntegrationTestCase
{
    private static $accountIdentifier;

    protected function getProcessInstanceType()
    {
        return RetrieveAccountName::class;
    }

    protected function getResponseInstanceType()
    {
        return AccountHolderName::class;
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
    }

    protected function setUp(): void
    {
        $this->request = P2PTransfer::viewAccountName(self::$accountIdentifier);
    }
}
