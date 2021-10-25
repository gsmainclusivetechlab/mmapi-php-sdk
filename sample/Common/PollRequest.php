<?php
use mmpsdk\Common\Exceptions\SDKException;
use mmpsdk\Common\Process\PollRequest;

try {
    $serverCorrelationId = '68c5733f-c470-4825-ba8d-9c61c9442491';
    $request = new PollRequest($serverCorrelationId);
    $response = $request->execute();
    print_r($response);
} catch (SDKException $ex) {
    print_r($ex->getErrorObj());
}
