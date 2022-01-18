<?php
require_once __DIR__ . './../bootstrap.php';

use mmpsdk\Common\Common;
use mmpsdk\Common\Exceptions\MobileMoneyException;
use mmpsdk\Common\Process\RetrieveTransaction;

try {
    $response = Common::viewTransaction('REF-1636106992007')->execute();
    prettyPrint($response);
} catch (MobileMoneyException $ex) {
    prettyPrint($ex->getMessage());
    prettyPrint($ex->getErrorObj());
}
