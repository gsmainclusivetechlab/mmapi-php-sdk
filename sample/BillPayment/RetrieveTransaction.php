<?php
require_once __DIR__ . './../bootstrap.php';

use mmpsdk\BillPayment\BillPayment;
use mmpsdk\Common\Exceptions\SDKException;
use mmpsdk\Common\Process\RetrieveTransaction;

try {
    $response = BillPayment::viewTransaction('REF-1640168394778')->execute();
    prettyPrint($response);
} catch (SDKException $ex) {
    prettyPrint($ex->getMessage());
    prettyPrint($ex->getErrorObj());
}
