<?php
require_once __DIR__ . './../bootstrap.php';
use mmpsdk\MerchantPayment\Models\Reversal;
use mmpsdk\Common\Exceptions\SDKException;
use mmpsdk\MerchantPayment\Process\PaymentReversal;

$reversalObj = new Reversal();

try {
    $transactionReference = 'REF-1635251574104';
    $request = new PaymentReversal($transactionReference);
    prettyPrint($request->getClientCorrelationId());
    $repsonse = $request->execute();
    prettyPrint($repsonse);
} catch (SDKException $ex) {
    prettyPrint($ex->getErrorObj());
}
