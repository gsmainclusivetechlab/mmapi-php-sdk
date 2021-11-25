<?php
require_once __DIR__ . './../bootstrap.php';
use mmpsdk\Common\Exceptions\SDKException;
use mmpsdk\P2PTransfer\P2PTransfer;

try {
    $response = P2PTransfer::viewServiceAvailability()->execute();
    prettyPrint($response);
} catch (SDKException $ex) {
    prettyPrint($ex->getMessage());
    prettyPrint($ex->getErrorObj());
}
