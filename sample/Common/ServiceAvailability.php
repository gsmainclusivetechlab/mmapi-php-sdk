<?php
use mmpsdk\Common\Exceptions\SDKException;
use mmpsdk\Common\Process\ServiceAvailability;

try {
    $response = ServiceAvailability::build()->execute();
    print_r($response);
} catch (SDKException $ex) {
    print_r($ex->getErrorObj());
}
