<?php
require_once __DIR__ . './../bootstrap.php';

use mmpsdk\InternationalTransfer\InternationalTransfer;
use mmpsdk\Common\Exceptions\MobileMoneyException;

try {
    $serverCorrelationId = 'ea495e98-b5d2-4b03-ba43-4dfbce39cc60';
    $response = InternationalTransfer::viewRequestState(
        $serverCorrelationId
    )->execute();
    prettyPrint($response);
} catch (MobileMoneyException $ex) {
    prettyPrint($ex->getErrorObj());
}
