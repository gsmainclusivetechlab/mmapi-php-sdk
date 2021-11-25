<?php
require_once __DIR__ . './../bootstrap.php';

use mmpsdk\MerchantPayment\MerchantPayment;
use mmpsdk\Common\Exceptions\SDKException;

$accountIdentifier = ['accountid' => '2000'];
$filter = ['limit' => 5];

try {
    $response = MerchantPayment::viewAccountTransactions(
        $accountIdentifier,
        $filter
    )->execute();
    prettyPrint($response);
} catch (SDKException $ex) {
    prettyPrint($ex->getMessage());
    prettyPrint($ex->getErrorObj());
}
