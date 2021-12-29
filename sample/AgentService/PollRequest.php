<?php
require_once __DIR__ . './../bootstrap.php';

use mmpsdk\AgentService\AgentService;
use mmpsdk\Common\Exceptions\SDKException;

try {
    $serverCorrelationId = '0a0d2872-0cad-4a2f-a714-d9668afb963b';
    $response = AgentService::viewRequestState($serverCorrelationId)->execute();
    prettyPrint($response);
} catch (SDKException $ex) {
    prettyPrint($ex->getErrorObj());
}
