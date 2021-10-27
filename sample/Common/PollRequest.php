<?php
use mmpsdk\Common\Exceptions\SDKException;
use mmpsdk\Common\Process\PollRequest;

try {
    $serverCorrelationId = 'c8281177-9cf4-4469-a2c3-bfdbc98647d9';
    $request = new PollRequest($serverCorrelationId);
    $response = $request->execute();
    print_r($response);
} catch (SDKException $ex) {
    print_r($ex->getErrorObj());
}
