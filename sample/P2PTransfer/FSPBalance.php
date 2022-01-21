<?php
require_once __DIR__ . './../bootstrap.php';

use mmpsdk\Common\Exceptions\MobileMoneyException;
use mmpsdk\P2PTransfer\P2PTransfer;

$accountIdentifier = [
    'msisdn' => '+44012345678'
];

try {
    $response = P2PTransfer::viewAccountBalance($accountIdentifier)->execute();
    prettyPrint($response);
} catch (MobileMoneyException $ex) {
    prettyPrint($ex->getErrorObj());
}
