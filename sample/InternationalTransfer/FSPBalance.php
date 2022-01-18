<?php
require_once __DIR__ . './../bootstrap.php';

use mmpsdk\Common\Exceptions\MobileMoneyException;
use mmpsdk\InternationalTransfer\InternationalTransfer;

$accountIdentifier = [
    'accountid' => 2000
];

try {
    $response = InternationalTransfer::viewAccountBalance(
        $accountIdentifier
    )->execute();
    prettyPrint($response);
} catch (MobileMoneyException $ex) {
    prettyPrint($ex->getErrorObj());
}
