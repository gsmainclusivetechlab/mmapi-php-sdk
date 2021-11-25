<?php
require_once __DIR__ . './../bootstrap.php';

use mmpsdk\Common\Exceptions\SDKException;
use mmpsdk\Disbursement\Disbursement;

$accountIdentifier = [
    'accountid' => 2000
];

try {
    $response = Disbursement::viewAccountBalance($accountIdentifier)->execute();
    prettyPrint($response);
} catch (SDKException $ex) {
    prettyPrint($ex->getErrorObj());
}
