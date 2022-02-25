<?php
require_once __DIR__ . './../bootstrap.php';

use mmpsdk\InternationalTransfer\InternationalTransfer;
use mmpsdk\Common\Enums\NotificationMethod;
use mmpsdk\Common\Exceptions\MobileMoneyException;
use mmpsdk\Common\Models\Address;
use mmpsdk\Common\Models\IdDocument;
use mmpsdk\Common\Models\KYCInformation;
use mmpsdk\Common\Models\Name;
use mmpsdk\Common\Enums\DeliveryMethodType;
use mmpsdk\InternationalTransfer\Enums\InternationalTransactionType;
use mmpsdk\Common\Models\Quotation;

$quotation = new Quotation();
$quotation
    ->setCreditParty(['walletid' => '1'])
    ->setDebitParty(['msisdn' => '+44012345678'])
    ->setRequestAmount('77.30')
    ->setRequestCurrency('RWF')
    ->setRequestDate('2018-07-03T11:43:27.405Z')
    ->setType(InternationalTransactionType::INTERNATIONAL)
    ->setSubtype('abc')
    ->setChosenDeliveryMethod(DeliveryMethodType::AGENT)
    ->setSendingServiceProviderCountry('AD')
    ->setOriginCountry('AD')
    ->setReceivingCountry('AD')
    ->setCustomData(['keytest' => 'keyvalue']);
$postalAddress = new Address();
$postalAddress
    ->setCountry('GB')
    ->setAddressLine1('111 ABC Street')
    ->setCity('New York')
    ->setStateProvince('New York')
    ->setPostalCode('ABCD');
$subjectName = new Name();
$subjectName
    ->setTitle('Mr')
    ->setFirstName('Luke')
    ->setMiddleName('R')
    ->setLastName('Skywalker')
    ->setFullName('Luke R Skywalker')
    ->setNativeName('ABC');
$idDocument = [
    (new IdDocument())
        ->setIdType('nationalidcard')
        ->setIdNumber('1234567')
        ->setIssueDate('2018-07-03T11:43:27.405Z')
        ->setExpiryDate('2021-07-03T11:43:27.405Z')
        ->setIssuer('UKPA')
        ->setIssuerPlace('GB')
        ->setIssuerCountry('GB')
        ->setOtherIdDescription('test')
];
$senderKyc = new KYCInformation();
$senderKyc
    ->setNationality('GB')
    ->setDateOfBirth('1970-07-03T11:43:27.405Z')
    ->setOccupation('Manager')
    ->setEmployerName('MFX')
    ->setContactPhone('+447125588999')
    ->setGender('m')
    ->setEmailAddress('luke.skywalkeraaabbb@gmail.com')
    ->setBirthCountry('GB')
    ->setIdDocument($idDocument)
    ->setPostalAddress($postalAddress)
    ->setSubjectName($subjectName);
$quotation->setSenderKyc($senderKyc);
try {
    /**
     * Construct request object and set desired parameters
     */
    $request = InternationalTransfer::createQuotation($quotation);

    /**
     * Choose notification method can be either Callback or Polling
     */
    $request->setNotificationMethod(NotificationMethod::CALLBACK);

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