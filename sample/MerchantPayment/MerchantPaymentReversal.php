<?php
require_once __DIR__ . './../bootstrap.php';

use mmpsdk\MerchantPayment\MerchantPayment;
use mmpsdk\Common\Exceptions\MobileMoneyException;

try {
    $transactionReference = 'REF-1635251574104';
    $request = MerchantPayment::createReversal($transactionReference);
    prettyPrint($request->getClientCorrelationId());
    $repsonse = $request->execute();
    prettyPrint($repsonse);
} catch (MobileMoneyException $ex) {
    prettyPrint($ex->getErrorObj());
}
