<?php
require_once __DIR__ . './../bootstrap.php';

use mmpsdk\AgentService\AgentService;
use mmpsdk\Common\Exceptions\MobileMoneyException;

try {
    $serverCorrelationId = '59648245-5d24-4b78-a4a9-41ecc8e305a0';
    $response = AgentService::viewRequestState($serverCorrelationId)->execute();
    prettyPrint($response);
} catch (MobileMoneyException $ex) {
    prettyPrint($ex->getErrorObj());
}
