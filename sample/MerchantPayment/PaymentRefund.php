<?php
require_once __DIR__ . './../bootstrap.php';
use mmpsdk\MerchantPayment\Models\MerchantTransaction;
use mmpsdk\Common\Exceptions\SDKException;
use mmpsdk\MerchantPayment\Process\PaymentRefund;

$transaction = new MerchantTransaction();
$transaction
    ->setAmount('200.00')
    ->setCurrency('RWF')
    ->setCreditParty(['accountid' => '2999'])
    ->setDebitParty(['accountid' => '2999']);

try {
    $request = new PaymentRefund($transaction);
    prettyPrint($request->getClientCorrelationId());
    $repsonse = $request->execute();
    prettyPrint($repsonse);
} catch (SDKException $ex) {
    prettyPrint($ex->getErrorObj());
}
