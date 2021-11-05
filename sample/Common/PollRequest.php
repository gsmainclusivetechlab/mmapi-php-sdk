<?php
require_once __DIR__ . './../bootstrap.php';
use mmpsdk\Common\Exceptions\SDKException;
use mmpsdk\Common\Process\PollRequest;

try {
    $serverCorrelationId = '4948587f-bc69-48fa-88a4-e12375e639af';
    $request = new PollRequest($serverCorrelationId);
    $response = $request->execute();
    prettyPrint($response);
} catch (SDKException $ex) {
    prettyPrint($ex->getErrorObj());
}
