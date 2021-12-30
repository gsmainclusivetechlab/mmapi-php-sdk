<?php
require_once __DIR__ . './../bootstrap.php';

use mmpsdk\AgentService\AgentService;
use mmpsdk\Common\Exceptions\SDKException;

try {
    $serverCorrelationId = '0947ad88-fb10-44b8-a415-4fb817042ec9';
    $response = AgentService::viewRequestState($serverCorrelationId)->execute();
    prettyPrint($response);
} catch (SDKException $ex) {
    prettyPrint($ex->getErrorObj());
}
