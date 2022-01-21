<?php
require_once __DIR__ . './../bootstrap.php';

use mmpsdk\AgentService\AgentService;
use mmpsdk\Common\Exceptions\MobileMoneyException;

try {
    $response = AgentService::viewAccount([
        'walletid' => '1'
    ])->execute();
    prettyPrint($response);
} catch (MobileMoneyException $ex) {
    prettyPrint($ex->getMessage());
    prettyPrint($ex->getErrorObj());
}
