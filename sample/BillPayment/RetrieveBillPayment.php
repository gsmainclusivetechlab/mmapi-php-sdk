<?php
require_once __DIR__ . './../bootstrap.php';

use mmpsdk\BillPayment\BillPayment;
use mmpsdk\Common\Exceptions\MobileMoneyException;

$accountIdentifier = ['walletid' => '1'];
$billReference = 'REF-000001';
$filter = ['limit' => 5];

try {
    $response = BillPayment::viewBillPayment(
        $accountIdentifier,
        $billReference,
        $filter
    )->execute();
    prettyPrint($response);
} catch (MobileMoneyException $ex) {
    prettyPrint($ex->getMessage());
    prettyPrint($ex->getErrorObj());
}
