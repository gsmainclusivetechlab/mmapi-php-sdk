<?php
require_once __DIR__ . './../bootstrap.php';

use mmpsdk\MerchantPayment\MerchantPayment;
use mmpsdk\Common\Exceptions\SDKException;

try {
    $serverCorrelationId = 'ea495e98-b5d2-4b03-ba43-4dfbce39cc60';
    $response = MerchantPayment::viewRequestState(
        $serverCorrelationId
    )->execute();
    prettyPrint($response);
} catch (SDKException $ex) {
    prettyPrint($ex->getErrorObj());
}
