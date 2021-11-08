<?php
require_once __DIR__ . './../bootstrap.php';

use mmpsdk\Common\Enums\NotificationMethod;
use mmpsdk\Common\Models\Transaction;
use mmpsdk\Common\Exceptions\SDKException;
use mmpsdk\MerchantPayment\Process\InitiatePayment;
use mmpsdk\Common\Process\PollRequest;
use mmpsdk\Common\Process\RetrieveTransaction;

$transaction = new Transaction();
$transaction
    ->setAmount('36.00')
    ->setCurrency('USD')
    ->setCreditParty(['walletid' => '1'])
    ->setDebitParty(['msisdn' => '+44012345678']);

try {
    //Initiate Payment
    $request = new InitiatePayment($transaction);

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
    $request = new PollRequest($serverCorrelationId);
    return $request->execute();
}

function retrieveMerchantTransaction($transactionReference)
{
    $request = new RetrieveTransaction(
        $transactionReference,
        new Transaction()
    );
    return $request->execute();
}
