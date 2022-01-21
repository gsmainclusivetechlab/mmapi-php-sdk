<?php
require_once __DIR__ . './../bootstrap.php';

use mmpsdk\Common\Exceptions\MobileMoneyException;
use mmpsdk\RecurringPayment\RecurringPayment;

$accountIdentifier = [
    'msisdn' => '+44012345678'
];

try {
    $response = RecurringPayment::viewAccountBalance(
        $accountIdentifier
    )->execute();
    prettyPrint($response);
} catch (MobileMoneyException $ex) {
    prettyPrint($ex->getErrorObj());
}
