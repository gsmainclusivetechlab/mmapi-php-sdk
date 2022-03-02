<?php
require_once __DIR__ . './../bootstrap.php';

use mmpsdk\P2PTransfer\P2PTransfer;
use mmpsdk\Common\Enums\NotificationMethod;
use mmpsdk\Common\Exceptions\MobileMoneyException;
use mmpsdk\Common\Enums\DeliveryMethodType;
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
    ->setChosenDeliveryMethod(DeliveryMethodType::DIRECT_TO_ACCOUNT)
    ->setCustomData(['keytest' => 'keyvalue']);
try {
    /**
     * Construct request object and set desired parameters
     */
    $request = P2PTransfer::createQuotation($quotation);

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