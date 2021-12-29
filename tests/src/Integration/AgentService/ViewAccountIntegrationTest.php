<?php

use mmpsdk\AgentService\Models\Account;
use mmpsdk\AgentService\Models\Identity;
use mmpsdk\Common\Models\Address;
use mmpsdk\Common\Models\IdDocument;
use mmpsdk\Common\Models\KYCInformation;
use mmpsdk\Common\Models\Name;
use mmpsdk\AgentService\Process\RetrieveAccount;
use mmpsdk\Common\Process\BaseProcess;
use mmpsdk\AgentService\AgentService;
use mmpsdkTest\src\Integration\IntegrationTestCase;

class ViewAccountIntegrationTest extends IntegrationTestCase
{
    private static $accountIdentifier;

    protected function getProcessInstanceType()
    {
        return RetrieveAccount::class;
    }

    protected function getResponseInstanceType()
    {
        return Account::class;
    }

    protected function getRequestType()
    {
        return BaseProcess::SYNCHRONOUS_PROCESS;
    }

    public static function setUpBeforeClass(): void
    {
        self::$accountIdentifier = ['accountid' => '2000'];
    }

    protected function setUp(): void
    {
        $this->request = AgentService::viewAccount(self::$accountIdentifier);
    }
}
