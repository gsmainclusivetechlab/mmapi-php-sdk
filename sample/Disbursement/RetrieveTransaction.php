<?php
require_once __DIR__ . './../bootstrap.php';

use mmpsdk\Disbursement\Disbursement;
use mmpsdk\Common\Exceptions\MobileMoneyException;

try {
    $response = Disbursement::viewTransaction('REF-1636106992007')->execute();
    prettyPrint($response);
} catch (MobileMoneyException $ex) {
    prettyPrint($ex->getMessage());
    prettyPrint($ex->getErrorObj());
}
