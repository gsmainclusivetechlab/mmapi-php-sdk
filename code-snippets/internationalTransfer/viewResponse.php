<?php
require_once __DIR__ . './../bootstrap.php';
use mmpsdk\Common\Exceptions\MobileMoneyException;
use mmpsdk\InternationalTransfer\InternationalTransfer;
use mmpsdk\Common\Models\Transaction;

try {
    /**
     *Reference of the required object. Response will be of type stdObject if not provided
     */
    $objectReference = new Transaction();

    /**
     * Construct request object and set desired parameters
     */
    $request = InternationalTransfer::viewResponse(
        '<<CLIENT-CORRELATION-ID>>',
        $objectReference
    );

    /**
     *Execute the request
     */
    $response = $request->execute();

    print_r($response);
} catch (MobileMoneyException $ex) {
    print_r($ex->getMessage());
    print_r($ex->getErrorObj());
}