<?php
require_once __DIR__ . './../bootstrap.php';

use mmpsdk\BillPayment\BillPayment;
use mmpsdk\Common\Exceptions\SDKException;

$accountIdentifier = ['accountid' => '1'];
$filter = ['limit' => 5];

try {
    $response = BillPayment::viewAccountBills(
        $accountIdentifier,
        $filter
    )->execute();
    prettyPrint($response);
} catch (SDKException $ex) {
    prettyPrint($ex->getMessage());
    prettyPrint($ex->getErrorObj());
}
