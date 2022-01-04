<?php
require_once __DIR__ . './../bootstrap.php';

use mmpsdk\RecurringPayment\RecurringPayment;
use mmpsdk\Common\Exceptions\SDKException;

try {
    $serverCorrelationId = '5f347185-a4ad-44e5-87e5-f3a254925af4';
    $response = RecurringPayment::viewRequestState(
        $serverCorrelationId
    )->execute();
    prettyPrint($response);
} catch (SDKException $ex) {
    prettyPrint($ex->getErrorObj());
}
