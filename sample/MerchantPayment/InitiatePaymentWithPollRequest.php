<?php
require_once __DIR__ . './../bootstrap.php';
use mmpsdk\MerchantPayment\Models\MerchantTransaction;
use mmpsdk\Common\Exceptions\SDKException;
use mmpsdk\MerchantPayment\Process\InitiatePayment;
use mmpsdk\Common\Process\PollRequest;
use mmpsdk\Common\Process\RetrieveTransaction;
use mmpsdk\MerchantPayment\Process\RetrievePayments;

$transaction = new MerchantTransaction();
$transaction
    ->setAmount('36.00')
    ->setCurrency('USD')
    ->setCreditParty(['walletid' => '1'])
    ->setDebitParty(['msisdn' => '+44012345678']);

try {
    //Initiate Payment
    $request = new InitiatePayment($transaction, null);
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
        new MerchantTransaction()
    );
    return $request->execute();
}
