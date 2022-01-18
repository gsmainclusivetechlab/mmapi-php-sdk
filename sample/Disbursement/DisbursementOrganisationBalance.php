<?php
require_once __DIR__ . './../bootstrap.php';

use mmpsdk\Common\Exceptions\MobileMoneyException;
use mmpsdk\Disbursement\Disbursement;

$accountIdentifier = [
    'accountid' => 2000
];

try {
    $response = Disbursement::viewAccountBalance($accountIdentifier)->execute();
    prettyPrint($response);
} catch (MobileMoneyException $ex) {
    prettyPrint($ex->getErrorObj());
}
