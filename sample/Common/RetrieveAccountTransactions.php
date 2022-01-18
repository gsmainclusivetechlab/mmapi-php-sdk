<?php
require_once __DIR__ . './../bootstrap.php';

use mmpsdk\Common\Common;
use mmpsdk\Common\Exceptions\MobileMoneyException;

$accountIdentifier = ['accountid' => '2000'];
$filter = ['limit' => 5];

try {
    $response = Common::viewAccountTransactions(
        $accountIdentifier,
        $filter
    )->execute();
    prettyPrint($response);
} catch (MobileMoneyException $ex) {
    prettyPrint($ex->getMessage());
    prettyPrint($ex->getErrorObj());
}
