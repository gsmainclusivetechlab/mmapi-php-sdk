<?php
require_once __DIR__ . './../bootstrap.php';

use mmpsdk\Common\Exceptions\SDKException;
use mmpsdk\RecurringPayment\RecurringPayment;

$accountIdentifier = [
    'accountid' => 2000
];

try {
    $response = RecurringPayment::viewAccountBalance(
        $accountIdentifier
    )->execute();
    prettyPrint($response);
} catch (SDKException $ex) {
    prettyPrint($ex->getErrorObj());
}
