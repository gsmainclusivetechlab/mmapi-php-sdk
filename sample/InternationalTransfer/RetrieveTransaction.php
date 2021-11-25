<?php
require_once __DIR__ . './../bootstrap.php';

use mmpsdk\InternationalTransfer\InternationalTransfer;
use mmpsdk\Common\Exceptions\SDKException;
use mmpsdk\Common\Process\RetrieveTransaction;

try {
    $response = InternationalTransfer::viewTransaction(
        'REF-1636106992007'
    )->execute();
    prettyPrint($response);
} catch (SDKException $ex) {
    prettyPrint($ex->getMessage());
    prettyPrint($ex->getErrorObj());
}
