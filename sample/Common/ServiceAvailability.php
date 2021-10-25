<?php
use mmpsdk\Common\Exceptions\SDKException;
use mmpsdk\Common\Process\ServiceAvailability;

try {
    $response = (new ServiceAvailability())->execute();
    print_r($response);
} catch (SDKException $ex) {
    print_r($ex->getErrorObj());
}
