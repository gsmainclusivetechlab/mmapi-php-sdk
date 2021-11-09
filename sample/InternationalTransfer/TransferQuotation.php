<?php
require_once __DIR__ . './../bootstrap.php';

use mmpsdk\Common\Enums\NotificationMethod;
use mmpsdk\Common\Exceptions\SDKException;
use mmpsdk\Common\Models\Address;
use mmpsdk\Common\Models\IdDocument;
use mmpsdk\Common\Models\KYCInformation;
use mmpsdk\Common\Models\Name;
use mmpsdk\InternationalTransfer\Enums\DeliveryMethodType;
use mmpsdk\InternationalTransfer\Enums\InternationalTransactionType;
use mmpsdk\InternationalTransfer\Models\Quotation;
use mmpsdk\InternationalTransfer\Process\TransferQuotation;
use mmpsdk\MerchantPayment\Process\CreateAuthorisationCode;

$quotation = new Quotation();
$quotation
    ->setCreditParty(['accountid' => '2000'])
    ->setDebitParty(['accountid' => '2999'])
    ->setRequestAmount("75.30")
    ->setRequestCurrency("RWF")
    ->setRequestDate("2018-07-03T11:43:27.405Z")
    ->setType(InternationalTransactionType::INTERNATIONAL)
    ->setSubtype('abc')
    ->setChosenDeliveryMethod(DeliveryMethodType::AGENT)
    ->setSendingServiceProviderCountry('AD')
    ->setOriginCountry('AD')
    ->setReceivingCountry('AD')
    ->setCustomData(["keytest" => "keyvalue"]);
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
$quotation->setSenderKyc($senderKyc);
try {
    $request = new TransferQuotation(
        $quotation
    );
    $request->setNotificationMethod(NotificationMethod::CALLBACK);
    prettyPrint($request->getClientCorrelationId());
    $repsonse = $request->execute();
    prettyPrint($repsonse);
} catch (SDKException $ex) {
    prettyPrint($ex->getMessage());
    prettyPrint($ex->getErrorObj());
}
