<?php
require_once __DIR__ . './../bootstrap.php';

use mmpsdk\AgentService\AgentService;
use mmpsdk\Common\Exceptions\MobileMoneyException;
use mmpsdk\Common\Process\RetrieveTransaction;

try {
    $response = AgentService::viewTransaction('REF-1640671706798')->execute();
    prettyPrint($response);
} catch (MobileMoneyException $ex) {
    prettyPrint($ex->getMessage());
    prettyPrint($ex->getErrorObj());
}
