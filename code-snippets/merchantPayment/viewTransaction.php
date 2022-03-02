<?php
require_once __DIR__ . './../bootstrap.php';
use mmpsdk\Common\Models\Transaction;
use mmpsdk\Common\Exceptions\MobileMoneyException;
use mmpsdk\MerchantPayment\MerchantPayment;

try {
    /**
     * Construct request object and set desired parameters
     */
    $request = MerchantPayment::viewTransaction('<<TRANSACTION-REFERENCE>>');

    /**
     *Execute the request
     */
    $response = $request->execute();

    print_r($response);
} catch (MobileMoneyException $ex) {
    print_r($ex->getMessage());
    print_r($ex->getErrorObj());
}