<?php

use mmpsdk\Common\Models\AuthorisationCode;
use mmpsdk\Common\Models\RequestState;
use mmpsdk\Common\Process\BaseProcess;
use mmpsdk\Common\Process\CreateAuthorisationCode;
use mmpsdk\MerchantPayment\MerchantPayment;
use mmpsdkTest\Integration\src\IntegrationTestCase;

class CreateAuthorisationCodeIntegrationTest extends IntegrationTestCase
{
    private static $authorizationCode;
    private static $accountIdentifier;

    protected function getProcessInstanceType()
    {
        return CreateAuthorisationCode::class;
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
        self::$authorizationCode = new AuthorisationCode();
        self::$authorizationCode
            ->setRequestDate(date('Y-m-d\TH:i:s\.40z'))
            ->setCurrency('GBP')
            ->setAmount('1001.00');
        self::$accountIdentifier = ['accountid' => 2000];
    }

    protected function setUp(): void
    {
        $this->request = MerchantPayment::createAuthorisationCode(
            self::$accountIdentifier,
            self::$authorizationCode
        );
    }
}
