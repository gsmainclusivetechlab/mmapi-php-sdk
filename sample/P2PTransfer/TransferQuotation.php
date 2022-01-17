<?php
require_once __DIR__ . './../bootstrap.php';

use mmpsdk\P2PTransfer\P2PTransfer;
use mmpsdk\Common\Enums\NotificationMethod;
use mmpsdk\Common\Enums\DeliveryMethodType;
use mmpsdk\Common\Exceptions\MobileMoneyException;
use mmpsdk\Common\Models\Address;
use mmpsdk\Common\Models\IdDocument;
use mmpsdk\Common\Models\KYCInformation;
use mmpsdk\Common\Models\Name;
use mmpsdk\Common\Models\Quotation;

$quotation = new Quotation();
$quotation
    ->setCreditParty(['walletid' => '1'])
    ->setDebitParty(['msisdn' => '+44012345678'])
    ->setRequestAmount('77.30')
    ->setRequestCurrency('RWF')
    ->setRequestDate('2018-07-03T11:43:27.405Z')
    ->setType('transfer')
    ->setSubtype('abc')
    ->setChosenDeliveryMethod(DeliveryMethodType::AGENT)
    ->setSendingServiceProviderCountry('AD')
    ->setOriginCountry('AD')
    ->setReceivingCountry('AD')
    ->setCustomData(['keytest' => 'keyvalue']);
try {
    $request = P2PTransfer::createQuotation($quotation);
    $request->setNotificationMethod(NotificationMethod::CALLBACK);
    prettyPrint($request->getClientCorrelationId());
    $repsonse = $request->execute();
    prettyPrint($repsonse);
} catch (MobileMoneyException $ex) {
    prettyPrint($ex->getMessage());
    prettyPrint($ex->getErrorObj());
}
