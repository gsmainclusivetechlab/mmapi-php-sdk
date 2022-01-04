<?php
require_once __DIR__ . './../bootstrap.php';

use mmpsdk\RecurringPayment\RecurringPayment;
use mmpsdk\Common\Exceptions\SDKException;
use mmpsdk\Common\Models\Transaction;

try {
    $clientCorrelationId = '1a7796ef-8eb5-46b9-96eb-83ab75ff30d3';
    $request = RecurringPayment::viewResponse(
        $clientCorrelationId,
        new Transaction()
    );
    $response = $request->execute();
    prettyPrint($response);
} catch (SDKException $ex) {
    prettyPrint($ex->getErrorObj());
}
