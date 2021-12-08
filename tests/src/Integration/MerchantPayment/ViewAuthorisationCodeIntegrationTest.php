<?php

use mmpsdk\Common\Models\AuthorisationCode;
use mmpsdk\Common\Models\Balance;
use mmpsdk\Common\Process\AccountBalance;
use mmpsdk\Common\Process\BaseProcess;
use mmpsdk\Common\Process\ViewAuthorisationCode;
use mmpsdk\MerchantPayment\MerchantPayment;
use mmpsdkTest\src\Integration\IntegrationTestCase;

class ViewAuthorisationCodeIntegrationTest extends IntegrationTestCase
{
    private static $accountIdentifier;
    private static $authorisationCode;

    protected function getProcessInstanceType()
    {
        return ViewAuthorisationCode::class;
    }

    protected function getResponseInstanceType()
    {
        return AuthorisationCode::class;
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
        self::$authorisationCode = '2b68c2a7-e0ef-4fa8-b180-ec092993016c';
    }

    protected function setUp(): void
    {
        $this->request = MerchantPayment::viewAuthorisationCode(
            self::$accountIdentifier,
            self::$authorisationCode
        );
    }
}
