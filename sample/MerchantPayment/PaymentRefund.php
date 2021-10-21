<?php
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
    $request = PaymentRefund::build($transaction);
    print_r($request->getClientCorrelationId());
    $repsonse = $request->execute();
    print_r($repsonse);
} catch (SDKException $ex) {
    print_r($ex->getErrorObj());
}
