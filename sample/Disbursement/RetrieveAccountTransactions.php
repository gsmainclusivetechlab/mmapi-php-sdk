<?php
require_once __DIR__ . './../bootstrap.php';

use mmpsdk\Common\Exceptions\MobileMoneyException;
use mmpsdk\Disbursement\Disbursement;

$accountIdentifier = ['msisdn' => '+44012345678'];
$filter = ['limit' => 5];

try {
    $response = Disbursement::viewAccountTransactions(
        $accountIdentifier,
        $filter
    )->execute();
    prettyPrint($response);
} catch (MobileMoneyException $ex) {
    prettyPrint($ex->getMessage());
    prettyPrint($ex->getErrorObj());
}
