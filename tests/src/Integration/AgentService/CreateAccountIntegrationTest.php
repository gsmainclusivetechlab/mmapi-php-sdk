<?php

use mmpsdk\Common\Models\RequestState;
use mmpsdk\Common\Process\BaseProcess;
use mmpsdk\AgentService\Process\InitiateAccount;
use mmpsdk\AgentService\Models\Account;
use mmpsdk\AgentService\Models\Identity;
use mmpsdk\Common\Models\Address;
use mmpsdk\Common\Models\IdDocument;
use mmpsdk\Common\Models\KYCInformation;
use mmpsdk\Common\Models\Name;
use mmpsdk\AgentService\AgentService;
use mmpsdkTest\src\Integration\IntegrationTestCase;

class CreateAccountIntegrationTest extends IntegrationTestCase
{
    private static $account;

    protected function getProcessInstanceType()
    {
        return InitiateAccount::class;
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
            ->setBirthCountry('GB')
            ->setIdDocument($idDocument)
            ->setPostalAddress($postalAddress)
            ->setSubjectName($subjectName);
        $identity = [
            (new Identity())
                ->setAccountRelationship('accountholder')
                ->setKycVerificationStatus('verified')
                ->setKycVerificationEntity('ABC Agent')
                ->setKycLevel('1')
                ->setIdentityKyc($identityKyc)
        ];

        self::$account = new Account();
        self::$account
            ->setAccountIdentifiers(['accountid' => '12345'])
            ->setIdentity($identity)
            ->setAccountType('string')
            ->setRegisteringEntity('ABC Agent')
            ->setrequestDate('2021-02-17T15:41:45.194Z');
    }

    protected function setUp(): void
    {
        //To create a new account identifier for each test in the test case
        self::$account->setAccountIdentifiers(['accountid' => time() . '_sdkTest_' . rand(0, 1000)]);

        $this->request = AgentService::createAccount(self::$account);
    }
}
