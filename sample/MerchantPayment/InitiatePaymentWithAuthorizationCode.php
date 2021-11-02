<?php
require_once __DIR__ . './../bootstrap.php';
use mmpsdk\Common\Models\Transaction;
use mmpsdk\Common\Exceptions\SDKException;
use mmpsdk\MerchantPayment\Process\InitiatePayment;

$transaction = new Transaction();
$transaction
    ->setAmount('26.00')
    ->setCurrency('USD')
    ->setCreditParty(['walletid' => '1'])
    ->setDebitParty(['msisdn' => '+44012345678'])
    ->setOneTimeCode('09206469-1ab4-4941-8c2c-12a0084571e3');
try {
    //Initiate Transaction
    $request = new InitiatePayment($transaction);
    $response = $request->execute();
    prettyPrint($response);
} catch (SDKException $ex) {
    prettyPrint($ex->getMessage());
    prettyPrint($ex->getErrorObj());
}
