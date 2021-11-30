<?php

use mmpsdk\Common\Process\BaseProcess;
use mmpsdk\Common\Constants\MobileMoney;
use mmpsdk\AccountLinking\Models\AccountLink;
use mmpsdk\Common\Models\RequestingOrganisation;
use mmpsdkTest\src\Common\Process\ProcessTestCase;
use mmpsdk\AccountLinking\Process\InitiateAccountLink;

class InitiateAccountLinkTest extends ProcessTestCase
{
    protected function setUp(): void
    {
        $accountIdentifier = [
            'accountId' => 2000
        ];

        $accountLink = new AccountLink();
        $accountLink
            ->setSourceAccountIdentifiers(['accountid' => '2999'])
            ->setStatus('active')
            ->setMode('both')
            ->setCustomData(['keytest' => 'keyvalue']);
        $requestingOrganisation = new RequestingOrganisation();
        $requestingOrganisation
            ->setRequestingOrganisationIdentifierType('organisationid')
            ->setRequestingOrganisationIdentifier('12345');
        $accountLink->setRequestingOrganisation($requestingOrganisation);
        $this->constructorArgs = [
            $accountIdentifier,
            $accountLink,
            'http://example.com/'
        ];
        $this->requestMethod = 'POST';
        $this->requestUrl =
            MobileMoney::getBaseUrl() . '/accounts/accountId/2000/links';
        $this->requestParams = [
            '{"sourceAccountIdentifiers":[{"key":"accountid","value":"2999"}],"status":"active","mode":"both","customData":[{"key":"keytest","value":"keyvalue"}],"requestingOrganisation":{"requestingOrganisationIdentifierType":"organisationid","requestingOrganisationIdentifier":"12345"}}'
        ];
        $this->className = InitiateAccountLink::class;
        $this->requestOptions = ['X-Callback-URL: http://example.com/'];
        $this->reqObj = $this->instantiateClass(
            $this->className,
            $this->constructorArgs
        );
        $this->processType = BaseProcess::ASYNCHRONOUS_PROCESS;
    }
}
