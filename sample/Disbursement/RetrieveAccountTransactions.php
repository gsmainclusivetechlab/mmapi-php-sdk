<?php
require_once __DIR__ . './../bootstrap.php';

use mmpsdk\Common\Exceptions\SDKException;
use mmpsdk\Disbursement\Disbursement;

$accountIdentifier = ['accountid' => '2000'];
$filter = ['limit' => 5];

try {
    $response = Disbursement::viewAccountTransactions(
        $accountIdentifier,
        $filter
    )->execute();
    prettyPrint($response);
} catch (SDKException $ex) {
    prettyPrint($ex->getMessage());
    prettyPrint($ex->getErrorObj());
}
