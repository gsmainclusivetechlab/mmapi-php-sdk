<?php

use mmpsdk\Common\Process\BaseProcess;
use mmpsdk\Common\Constants\MobileMoney;
use mmpsdk\Common\Models\Address;
use mmpsdk\Common\Models\IdDocument;
use mmpsdk\Common\Models\KYCInformation;
use mmpsdk\Common\Models\Name;
use mmpsdk\Common\Models\RequestingOrganisation;
use mmpsdk\Common\Models\Transaction;
use mmpsdk\InternationalTransfer\Models\InternationalTransferInformation;
use mmpsdk\InternationalTransfer\Process\InitiateInternationalTransaction;
use mmpsdkTest\src\Common\Process\ProcessTestCase;

class InitiateInternationalTransactionTest extends ProcessTestCase
{
    protected function setUp(): void
    {
        $transaction = new Transaction();
        $transaction
            ->setCreditParty(['accountid' => '2000'])
            ->setDebitParty(['accountid' => '2999'])
            ->setAmount("100.00")
            ->setCurrency("GBP");
        $postalAddress = new Address();
        $postalAddress
            ->setCountry("GB")
            ->setAddressLine1("111 ABC Street")
            ->setCity("New York")
            ->setStateProvince("New York")
            ->setPostalCode("ABCD");
        $subjectName = new Name();
        $subjectName
            ->setTitle("Mr")
            ->setFirstName("Luke")
            ->setMiddleName("R")
            ->setLastName("Skywalker")
            ->setFullName("Luke R Skywalker")
            ->setNativeName("ABC");
        $idDocument = [
            (new IdDocument())
                ->setIdType("nationalidcard")
                ->setIdNumber("1234567")
                ->setIssueDate("2018-07-03T11:43:27.405Z")
                ->setExpiryDate("2021-07-03T11:43:27.405Z")
                ->setIssuer("UKPA")
                ->setIssuerPlace("GB")
                ->setIssuerCountry("GB")
                ->setOtherIdDescription("test")
        ];
        $senderKyc = new KYCInformation();
        $senderKyc
            ->setNationality("GB")
            ->setDateOfBirth("1970-07-03T11:43:27.405Z")
            ->setOccupation("Manager")
            ->setEmployerName("MFX")
            ->setContactPhone("+447125588999")
            ->setGender("m")
            ->setEmailAddress("luke.skywalkeraaabbb@gmail.com")
            ->setBirthCountry("GB")
            ->setIdDocument($idDocument)
            ->setPostalAddress($postalAddress)
            ->setSubjectName($subjectName);
        $requestingOrganisation = new RequestingOrganisation();
        $requestingOrganisation
            ->setRequestingOrganisationIdentifierType("organisationid")
            ->setRequestingOrganisationIdentifier("testorganisation");
        $internationalTransferInformation = new InternationalTransferInformation();
        $internationalTransferInformation
            ->setOriginCountry("GB")
            ->setQuotationReference("{{quotationReference}}")
            ->setQuoteId("{{quoteId}}")
            ->setReceivingCountry("RW")
            ->setRemittancePurpose("personal")
            ->setRelationshipSender("none")
            ->setDeliveryMethod("agent")
            ->setSendingServiceProviderCountry("AD");
        $transaction
            ->setSenderKyc($senderKyc)
            ->setRequestingOrganisation($requestingOrganisation)
            ->setInternationalTransferInformation($internationalTransferInformation);
        $this->constructorArgs = [
            $transaction,
            'http://example.com/'
        ];
        $this->requestMethod = 'POST';
        $this->requestUrl =
            MobileMoney::getBaseUrl() .
            '/transactions/type/inttransfer';
        $this->requestParams = [
            '{"amount":"100.00","creditParty":[{"key":"accountid","value":"2000"}],"currency":"GBP","debitParty":[{"key":"accountid","value":"2999"}],"internationalTransferInformation":{"originCountry":"GB","quotationReference":"{{quotationReference}}","quoteId":"{{quoteId}}","receivingCountry":"RW","remittancePurpose":"personal","relationshipSender":"none","deliveryMethod":"agent","sendingServiceProviderCountry":"AD"},"senderKyc":{"nationality":"GB","dateOfBirth":"1970-07-03T11:43:27.405Z","occupation":"Manager","employerName":"MFX","contactPhone":"+447125588999","gender":"m","emailAddress":"luke.skywalkeraaabbb@gmail.com","birthCountry":"GB","idDocument":[{"idType":"nationalidcard","idNumber":"1234567","issueDate":"2018-07-03T11:43:27.405Z","expiryDate":"2021-07-03T11:43:27.405Z","issuer":"UKPA","issuerPlace":"GB","issuerCountry":"GB","otherIdDescription":"test"}],"postalAddress":{"country":"GB","addressLine1":"111 ABC Street","city":"New York","stateProvince":"New York","postalCode":"ABCD"},"subjectName":{"title":"Mr","firstName":"Luke","middleName":"R","lastName":"Skywalker","fullName":"Luke R Skywalker","nativeName":"ABC"}},"requestingOrganisation":{"requestingOrganisationIdentifierType":"organisationid","requestingOrganisationIdentifier":"testorganisation"}}'
        ];
        $this->className = InitiateInternationalTransaction::class;
        $this->requestOptions = ['X-Callback-URL: http://example.com/'];
        $this->reqObj = $this->instantiateClass(
            $this->className,
            $this->constructorArgs
        );
        $this->processType = BaseProcess::ASYNCHRONOUS_PROCESS;
    }
}
