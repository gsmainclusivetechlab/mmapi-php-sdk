<?php
require_once __DIR__ . './../bootstrap.php';

use mmpsdk\Common\Enums\NotificationMethod;
use mmpsdk\Common\Exceptions\MobileMoneyException;
use mmpsdk\AgentService\AgentService;
use mmpsdk\AgentService\Models\Account;
use mmpsdk\AgentService\Models\Identity;
use mmpsdk\Common\Models\Address;
use mmpsdk\Common\Models\IdDocument;
use mmpsdk\Common\Models\KYCInformation;
use mmpsdk\Common\Models\Name;

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
    ->setAccountIdentifiers(['accountid' => '2001'])
    ->setIdentity($identity)
    ->setAccountType('string')
    ->setRegisteringEntity('ABC Agent')
    ->setrequestDate('2021-02-17T15:41:45.194Z');

try {
    /**
     * Construct request object and set desired parameters
     */
    $request = AgentService::createAccount($account);

    /**
     * Choose notification method can be either Callback or Polling
     */
    $request->setNotificationMethod(NotificationMethod::POLLING);

    /**
     * Get Client Correlation Id that will be sent along with request
     */
    $clientCorrelationId = $request->getClientCorrelationId()
    print_r($clientCorrelationId);

    /**
     *Execute the request
     */
    $response = $request->execute();
    print_r($response);
} catch (MobileMoneyException $ex) {
    print_r($ex->getMessage());
    print_r($ex->getErrorObj());
}
