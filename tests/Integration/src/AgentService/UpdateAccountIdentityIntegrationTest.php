<?php

use mmpsdk\Common\Models\PatchData;
use mmpsdk\Common\Models\RequestState;
use mmpsdk\AgentService\Process\UpdateAccountIdentity;
use mmpsdk\Common\Process\BaseProcess;
use mmpsdk\AgentService\AgentService;
use mmpsdkTest\Integration\src\IntegrationTestCase;

class UpdateAccountIdentityIntegrationTest extends IntegrationTestCase
{
    private static $accountIdentifier;
    private static $identityId;
    private static $patchRequest;

    protected function getProcessInstanceType()
    {
        return UpdateAccountIdentity::class;
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
        self::$accountIdentifier = ['walletid' => '1'];
        self::$identityId = '1';
        self::$patchRequest = new PatchData();
        self::$patchRequest
            ->setOp(PatchData::REPLACE)
            ->setPath('/kycVerificationStatus')
            ->setValue('verified');
    }

    protected function setUp(): void
    {
        $this->request = AgentService::updateAccountIdentity(
            self::$accountIdentifier,
            self::$identityId,
            [self::$patchRequest]
        );
    }
}
