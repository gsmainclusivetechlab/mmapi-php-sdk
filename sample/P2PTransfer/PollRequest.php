<?php
require_once __DIR__ . './../bootstrap.php';

use mmpsdk\P2PTransfer\P2PTransfer;
use mmpsdk\Common\Exceptions\MobileMoneyException;

try {
    $serverCorrelationId = 'efa39ae1-04d8-4511-b350-2ead2c8f6cd0';
    $response = P2PTransfer::viewRequestState($serverCorrelationId)->execute();
    prettyPrint($response);
} catch (MobileMoneyException $ex) {
    prettyPrint($ex->getErrorObj());
}
