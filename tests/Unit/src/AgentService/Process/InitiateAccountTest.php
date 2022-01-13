<?php

use mmpsdk\Common\Process\BaseProcess;
use mmpsdk\Common\Constants\MobileMoney;
use mmpsdkTest\Unit\src\Common\Process\ProcessTestCase;
use mmpsdk\AgentService\Models\Account;
use mmpsdk\AgentService\Models\Identity;
use mmpsdk\Common\Models\Address;
use mmpsdk\Common\Models\IdDocument;
use mmpsdk\Common\Models\KYCInformation;
use mmpsdk\Common\Models\Name;
use mmpsdk\AgentService\Process\InitiateAccount;

class InitiateAccountTest extends ProcessTestCase
{
    protected function setUp(): void
    {
        $postalAddress = new Address();
        $postalAddress
            ->setCountry('AD')
            ->setAddressLine1('37')
            ->setAddressLine2('ABC Drive')
            ->setAddressLine3('string')
            ->setCity('Berlin')
            ->setStateProvince('string')
            ->setPostalCode('AF1234');
        $subjectName = new Name();
        $subjectName
            ->setTitle('Mr')
            ->setFirstName('H')
            ->setMiddleName('I')
            ->setLastName('J')
            ->setFullName('H I J')
            ->setNativeName('string');
        $idDocument = [
            (new IdDocument())
                ->setIdType('passport')
                ->setIdNumber('111111')
                ->setIssueDate('2018-11-20')
                ->setExpiryDate('2018-11-20')
                ->setIssuer('ABC')
                ->setIssuerPlace('DEF')
                ->setIssuerCountry('AD')
        ];
        $identityKyc = new KYCInformation();
        $identityKyc
            ->setNationality('AD')
            ->setDateOfBirth('2000-11-20')
            ->setOccupation('Miner')
            ->setEmployerName('string')
            ->setContactPhone('+447777777777')
            ->setGender('m')
            ->setEmailAddress('xyz@xyz.com')
            ->setBirthCountry('AD')
            ->setIdDocument($idDocument)
            ->setPostalAddress($postalAddress)
            ->setSubjectName($subjectName);
        $identity = [
            (new Identity())
                ->setAccountRelationship('accountholder')
                ->setKycVerificationStatus('verified')
                ->setKycVerificationEntity('ABC Agent')
                ->setKycLevel(1)
                ->setIdentityKyc($identityKyc)
        ];

        $account = new Account();
        $account
            ->setAccountIdentifiers(['accountid' => '2000'])
            ->setIdentity($identity)
            ->setAccountType('string')
            ->setRegisteringEntity('ABC Agent')
            ->setrequestDate('2021-02-17T15:41:45.194Z');
        $this->constructorArgs = [$account, 'http://example.com/'];
        $this->requestMethod = 'POST';
        $this->requestUrl = MobileMoney::getBaseUrl() . '/accounts/individual';
        $this->requestParams = [
            '{"accountIdentifiers":[{"key":"accountid","value":"2000"}],"identity":[{"identityKyc":{"birthCountry":"AD","contactPhone":"+447777777777","dateOfBirth":"2000-11-20","emailAddress":"xyz@xyz.com","employerName":"string","gender":"m","idDocument":[{"idType":"passport","idNumber":"111111","issueDate":"2018-11-20","expiryDate":"2018-11-20","issuer":"ABC","issuerPlace":"DEF","issuerCountry":"AD"}],"nationality":"AD","occupation":"Miner","postalAddress":{"addressLine1":"37","addressLine2":"ABC Drive","addressLine3":"string","city":"Berlin","stateProvince":"string","postalCode":"AF1234","country":"AD"},"subjectName":{"title":"Mr","firstName":"H","middleName":"I","lastName":"J","fullName":"H I J","nativeName":"string"}},"accountRelationship":"accountholder","kycVerificationStatus":"verified","kycVerificationEntity":"ABC Agent","kycLevel":1}],"accountType":"string","registeringEntity":"ABC Agent","requestDate":"2021-02-17T15:41:45.194Z"}'
        ];

        $this->className = InitiateAccount::class;
        $this->requestOptions = ['X-Callback-URL: http://example.com/'];
        $this->reqObj = $this->instantiateClass(
            $this->className,
            $this->constructorArgs
        );
        $this->processType = BaseProcess::ASYNCHRONOUS_PROCESS;
    }
}
