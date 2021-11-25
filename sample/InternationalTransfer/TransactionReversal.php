<?php
require_once __DIR__ . './../bootstrap.php';

use mmpsdk\InternationalTransfer\InternationalTransfer;
use mmpsdk\Common\Exceptions\SDKException;

try {
    $transactionReference = 'REF-1635251574104';
    $request = InternationalTransfer::createReversal($transactionReference);
    prettyPrint($request->getClientCorrelationId());
    $repsonse = $request->execute();
    prettyPrint($repsonse);
} catch (SDKException $ex) {
    prettyPrint($ex->getErrorObj());
}
