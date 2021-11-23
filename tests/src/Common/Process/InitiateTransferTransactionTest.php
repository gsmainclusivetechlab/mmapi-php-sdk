<?php

use mmpsdk\Common\Process\BaseProcess;
use mmpsdk\Common\Constants\MobileMoney;
use mmpsdk\Common\Models\Address;
use mmpsdk\Common\Models\IdDocument;
use mmpsdk\Common\Models\KYCInformation;
use mmpsdk\Common\Models\Name;
use mmpsdk\Common\Models\RequestingOrganisation;
use mmpsdk\Common\Models\Transaction;
use mmpsdk\Common\Process\InitiateTransferTransaction;
use mmpsdk\InternationalTransfer\Models\InternationalTransferInformation;
use mmpsdk\InternationalTransfer\Process\InitiateInternationalTransaction;
use mmpsdkTest\src\Common\Process\ProcessTestCase;

class InitiateTransferTransactionTest extends ProcessTestCase
{
    protected function setUp(): void
    {
        $transaction = new Transaction();
        $transaction
            ->setAmount('100.00')
            ->setCurrency('GBP')
            ->setCreditParty(['accountid' => '2000'])
            ->setDebitParty(['accountid' => '2999']);
        $requestingOrganisation = new RequestingOrganisation();
        $requestingOrganisation
            ->setRequestingOrganisationIdentifierType('organisationid')
            ->setRequestingOrganisationIdentifier('testorganisation');
        $transaction->setRequestingOrganisation($requestingOrganisation);
        $this->constructorArgs = [$transaction, 'http://example.com/'];
        $this->requestMethod = 'POST';
        $this->requestUrl =
            MobileMoney::getBaseUrl() . '/transactions/type/transfer';
        $this->requestParams = [
            '{"amount":"100.00","creditParty":[{"key":"accountid","value":"2000"}],"currency":"GBP","debitParty":[{"key":"accountid","value":"2999"}],"requestingOrganisation":{"requestingOrganisationIdentifierType":"organisationid","requestingOrganisationIdentifier":"testorganisation"}}'
        ];
        $this->className = InitiateTransferTransaction::class;
        $this->requestOptions = ['X-Callback-URL: http://example.com/'];
        $this->reqObj = $this->instantiateClass(
            $this->className,
            $this->constructorArgs
        );
        $this->processType = BaseProcess::ASYNCHRONOUS_PROCESS;
    }
}
