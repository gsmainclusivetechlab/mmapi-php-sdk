<?php

use mmpsdk\Common\Models\RequestState;
use mmpsdk\Common\Models\RequestingOrganisation;
use mmpsdk\AccountLinking\Models\Link;
use mmpsdk\Common\Process\BaseProcess;
use mmpsdk\AccountLinking\Process\InitiateAccountLink;
use mmpsdk\AccountLinking\AccountLinking;
use mmpsdkTest\src\Integration\IntegrationTestCase;

class CreateAccountLinkingIntegrationTest extends IntegrationTestCase
{
    private static $link;
    private static $accountIdentifier;

    protected function getProcessInstanceType()
    {
        return InitiateAccountLink::class;
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
        self::$link = new Link();
        self::$link
            ->setSourceAccountIdentifiers(['accountid' => '2999'])
            ->setStatus('active')
            ->setMode('both')
            ->setCustomData(['keytest' => 'keyvalue']);

        $requestingOrganisation = new RequestingOrganisation();
        $requestingOrganisation
            ->setRequestingOrganisationIdentifierType('organisationid')
            ->setRequestingOrganisationIdentifier('12345');
        self::$link->setRequestingOrganisation($requestingOrganisation);

        self::$accountIdentifier = [
            'accountid' => '2000'
        ];
    }

    protected function setUp(): void
    {
        $this->request = AccountLinking::createAccountLink(
            self::$accountIdentifier,
            self::$link
        );
    }
}
