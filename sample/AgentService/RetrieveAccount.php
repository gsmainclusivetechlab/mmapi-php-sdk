<?php
require_once __DIR__ . './../bootstrap.php';

use mmpsdk\AgentService\AgentService;
use mmpsdk\Common\Exceptions\SDKException;
use mmpsdk\Common\Process\RetrieveAccount;

try {
    $response = AgentService::viewAccount([
        'msisdn' => '+411111111'
    ])->execute();
    prettyPrint($response);
} catch (SDKException $ex) {
    prettyPrint($ex->getMessage());
    prettyPrint($ex->getErrorObj());
}
