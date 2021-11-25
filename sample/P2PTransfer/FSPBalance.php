<?php
require_once __DIR__ . './../bootstrap.php';

use mmpsdk\Common\Exceptions\SDKException;
use mmpsdk\P2PTransfer\P2PTransfer;

$accountIdentifier = [
    'accountid' => 2000
];

try {
    $response = P2PTransfer::viewAccountBalance($accountIdentifier)->execute();
    prettyPrint($response);
} catch (SDKException $ex) {
    prettyPrint($ex->getErrorObj());
}
