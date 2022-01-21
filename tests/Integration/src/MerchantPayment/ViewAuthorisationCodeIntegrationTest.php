<?php

use mmpsdk\Common\Common;
use mmpsdk\Common\Models\AuthorisationCode;
use mmpsdk\Common\Models\Balance;
use mmpsdk\Common\Process\AccountBalance;
use mmpsdk\Common\Process\BaseProcess;
use mmpsdk\Common\Process\ViewAuthorisationCode;
use mmpsdk\MerchantPayment\MerchantPayment;
use mmpsdkTest\Integration\src\IntegrationTestCase;

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
            'msisdn' => '+44012345678'
        ];
        $authorizationCode = new AuthorisationCode();
        $authorizationCode
            ->setRequestDate(date('Y-m-d\TH:i:s\.40z'))
            ->setCurrency('GBP')
            ->setAmount('1001.00');
        $response = MerchantPayment::createAuthorisationCode(
            self::$accountIdentifier,
            $authorizationCode
        )->execute();

        self::$authorisationCode = Common::viewRequestState(
            $response->getServerCorrelationId()
        )
            ->execute()
            ->getObjectReference();
    }

    protected function setUp(): void
    {
        $this->request = MerchantPayment::viewAuthorisationCode(
            self::$accountIdentifier,
            self::$authorisationCode
        );
    }
}
