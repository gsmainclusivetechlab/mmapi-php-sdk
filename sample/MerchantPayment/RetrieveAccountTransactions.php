<?php
require_once __DIR__ . './../bootstrap.php';

use mmpsdk\MerchantPayment\MerchantPayment;
use mmpsdk\Common\Exceptions\MobileMoneyException;

$accountIdentifier = ['accountid' => '2999'];
$filter = ['limit' => 5];

try {
    $response = MerchantPayment::viewAccountTransactions(
        $accountIdentifier,
        $filter
    )->execute();
    prettyPrint($response);
} catch (MobileMoneyException $ex) {
    prettyPrint($ex->getMessage());
    prettyPrint($ex->getErrorObj());
}
