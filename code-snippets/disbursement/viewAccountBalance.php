<?php
require_once __DIR__ . './../bootstrap.php';
use mmpsdk\Common\Models\Transaction;
use mmpsdk\Common\Exceptions\MobileMoneyException;
use mmpsdk\Disbursement\Disbursement;

$accountIdentifier = [
    'accountid' => 2000
];
try {
    /**
     * Construct request object and set desired parameters
     */
    $request = Disbursement::viewAccountBalance($accountIdentifier);

    /**
     *Execute the request
     */
    $response = $request->execute();

    print_r($response);
} catch (MobileMoneyException $ex) {
    print_r($ex->getMessage());
    print_r($ex->getErrorObj());
}