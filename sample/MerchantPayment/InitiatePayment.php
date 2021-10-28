<?php
use mmpsdk\MerchantPayment\Models\MerchantTransaction;
use mmpsdk\Common\Exceptions\SDKException;
use mmpsdk\MerchantPayment\Process\InitiatePayment;

$transaction = new MerchantTransaction();
$transaction
    ->setAmount('16.00')
    ->setCurrency('USD')
    ->setCreditParty(['walletid' => '1'])
    ->setDebitParty(['msisdn' => '+44012345678']);

try {
    $request = new InitiatePayment($transaction);
    print_r($request->getClientCorrelationId());
    $repsonse = $request->execute();
    print_r($repsonse);
} catch (SDKException $ex) {
    print_r($ex->getErrorObj());
}
