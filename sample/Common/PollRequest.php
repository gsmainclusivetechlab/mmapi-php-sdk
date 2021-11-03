<?php
require_once __DIR__ . './../bootstrap.php';
use mmpsdk\Common\Exceptions\SDKException;
use mmpsdk\Common\Process\PollRequest;

try {
    $serverCorrelationId = 'c8281177-9cf4-4469-a2c3-bfdbc98647d9';
    $request = new PollRequest($serverCorrelationId);
    $response = $request->execute();
    prettyPrint($response);
} catch (SDKException $ex) {
    prettyPrint($ex->getErrorObj());
}
