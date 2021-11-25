<?php
require_once __DIR__ . './../bootstrap.php';
use mmpsdk\Common\Exceptions\SDKException;
use mmpsdk\MerchantPayment\MerchantPayment;

try {
    $response = MerchantPayment::viewServiceAvailability()->execute();
    prettyPrint($response);
} catch (SDKException $ex) {
    prettyPrint($ex->getMessage());
    prettyPrint($ex->getErrorObj());
}
