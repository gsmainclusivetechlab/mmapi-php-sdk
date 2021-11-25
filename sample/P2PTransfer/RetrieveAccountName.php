<?php
require_once __DIR__ . './../bootstrap.php';

use mmpsdk\P2PTransfer\P2PTransfer;
use mmpsdk\Common\Exceptions\SDKException;

$accountIdentifier = [
    'walletId' => 1
];

try {
    $response = P2PTransfer::viewAccountName($accountIdentifier)->execute();
    prettyPrint($response);
} catch (SDKException $ex) {
    prettyPrint($ex->getErrorObj());
}
