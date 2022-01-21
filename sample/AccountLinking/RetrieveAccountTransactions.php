<?php
require_once __DIR__ . './../bootstrap.php';

use mmpsdk\AccountLinking\AccountLinking;
use mmpsdk\Common\Exceptions\MobileMoneyException;

$accountIdentifier = ['msisdn' => '+44012345678'];
$filter = ['limit' => 5];

try {
    $response = AccountLinking::viewAccountTransactions(
        $accountIdentifier,
        $filter
    )->execute();
    prettyPrint($response);
} catch (MobileMoneyException $ex) {
    prettyPrint($ex->getMessage());
    prettyPrint($ex->getErrorObj());
}
