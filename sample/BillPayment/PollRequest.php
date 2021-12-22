<?php
require_once __DIR__ . './../bootstrap.php';

use mmpsdk\BillPayment\BillPayment;
use mmpsdk\Common\Exceptions\SDKException;

try {
    $serverCorrelationId = 'f7763f4e-5e7a-4eb5-98fb-5d919bbfc0f9';
    $response = BillPayment::viewRequestState($serverCorrelationId)->execute();
    prettyPrint($response);
} catch (SDKException $ex) {
    prettyPrint($ex->getErrorObj());
}
