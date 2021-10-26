<?php
use mmpsdk\Common\Exceptions\SDKException;
use mmpsdk\Common\Process\PollRequest;

try {
    $serverCorrelationId = '49a1beb7-93da-4334-9b43-08bfbac5fa76';
    $request = new PollRequest($serverCorrelationId);
    $response = $request->execute();
    print_r($response);
} catch (SDKException $ex) {
    print_r($ex->getErrorObj());
}
