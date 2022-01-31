<?php
require_once __DIR__ . './../bootstrap.php';

use mmpsdk\Disbursement\Disbursement;
use mmpsdk\Common\Exceptions\MobileMoneyException;

try {
    $transactionReference = 'REF-1635251574104';
    $request = Disbursement::createReversal($transactionReference);
    prettyPrint($request->getClientCorrelationId());
    $response = $request->execute();
    prettyPrint($response);
} catch (MobileMoneyException $ex) {
    prettyPrint($ex->getErrorObj());
}
