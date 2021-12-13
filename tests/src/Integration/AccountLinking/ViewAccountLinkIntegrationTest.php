<?php

use mmpsdk\Common\Models\RequestingOrganisation;
use mmpsdk\AccountLinking\Models\Link;
use mmpsdk\AccountLinking\Process\ViewAccountLink;
use mmpsdk\Common\Process\BaseProcess;
use mmpsdk\AccountLinking\AccountLinking;
use mmpsdkTest\src\Integration\IntegrationTestCase;

class ViewAccountLinkIntegrationTest extends IntegrationTestCase
{
    private static $linkReference;
    private static $accountIdentifier;

    protected function getProcessInstanceType()
    {
        return ViewAccountLink::class;
    }

    protected function getResponseInstanceType()
    {
        return Link::class;
    }

    protected function getRequestType()
    {
        return BaseProcess::SYNCHRONOUS_PROCESS;
    }

    public static function setUpBeforeClass(): void
    {
        $link = new Link();
        $link
            ->setSourceAccountIdentifiers(['accountid' => '2999'])
            ->setStatus('active')
            ->setMode('both')
            ->setCustomData(['keytest' => 'keyvalue']);

        $requestingOrganisation = new RequestingOrganisation();
        $requestingOrganisation
            ->setRequestingOrganisationIdentifierType('organisationid')
            ->setRequestingOrganisationIdentifier('12345');
        $link->setRequestingOrganisation($requestingOrganisation);

        self::$accountIdentifier = [
            'accountid' => '2000'
        ];

        $response = AccountLinking::createAccountLink(
            self::$accountIdentifier,
            $link
        )->execute();

        self::$linkReference = AccountLinking::viewRequestState(
            $response->getServerCorrelationId()
        )
            ->execute()
            ->getObjectReference();
    }

    protected function setUp(): void
    {
        $this->request = AccountLinking::ViewAccountLink(
            self::$accountIdentifier,
            self::$linkReference
        );
    }
}
