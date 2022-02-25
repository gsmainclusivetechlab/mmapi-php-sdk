<?php
require_once __DIR__ . './../bootstrap.php';

use mmpsdk\AgentService\AgentService;
use mmpsdk\Common\Exceptions\MobileMoneyException;

$accountIdentifier = [
    'msisdn' => '+411111111'
];
try {
    /**
     * Construct request object and set desired parameters
     */
    $response = AgentService::viewAccount($accountIdentifier);

    /**
     *Execute the request
     */
    $response = $request->execute();
chat
    print_r($response);
} catch (MobileMoneyException $ex) {
    print_r($ex->getMessage());
    print_r($ex->getErrorObj());
}