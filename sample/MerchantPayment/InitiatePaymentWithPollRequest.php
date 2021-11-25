<?php
require_once __DIR__ . './../bootstrap.php';

use mmpsdk\Common\Enums\NotificationMethod;
use mmpsdk\Common\Models\Transaction;
use mmpsdk\Common\Exceptions\SDKException;
use mmpsdk\MerchantPayment\MerchantPayment;

$transaction = new Transaction();
$transaction
    ->setAmount('36.00')
    ->setCurrency('USD')
    ->setCreditParty(['walletid' => '1'])
    ->setDebitParty(['msisdn' => '+44012345678']);

try {
    //Initiate Payment
    $request = MerchantPayment::createMerchantTransaction($transaction);

    //Set notification method for polling
    $request->setNotificationMethod(NotificationMethod::CALLBACK);

    prettyPrint($request->getClientCorrelationId());
    $response = $request->execute();
    $serverCorrelationId = $response->getServerCorrelationId();

    //Poll Request
    $pollResponse = pollRequest($serverCorrelationId);
    prettyPrint($pollResponse);

    //Retrieve Payment Info
    if ($pollResponse->getStatus() == 'completed') {
        $transactionResponse = retrieveMerchantTransaction(
            $pollResponse->getObjectReference()
        );
        prettyPrint($transactionResponse);
    }
} catch (SDKException $ex) {
    prettyPrint($ex->getMessage());
    prettyPrint($ex->getErrorObj());
}

function pollRequest($serverCorrelationId)
{
    $request = MerchantPayment::viewRequestState($serverCorrelationId);
    return $request->execute();
}

function retrieveMerchantTransaction($transactionReference)
{
    $request = MerchantPayment::viewTransaction(
        $transactionReference,
        new Transaction()
    );
    return $request->execute();
}
