<?php
use mmpsdk\MerchantPayment\Models\Reversal;
use mmpsdk\Common\Exceptions\SDKException;
use mmpsdk\MerchantPayment\Process\PaymentReversal;

$reversalObj = new Reversal();

try {
    $transactionReference = 'REF-1635251574104';
    $request = new PaymentReversal($transactionReference, $reversalObj);
    print_r($request->getClientCorrelationId());
    $repsonse = $request->execute();
    print_r($repsonse);
} catch (SDKException $ex) {
    print_r($ex->getErrorObj());
}
