<?php
require_once __DIR__ . './../bootstrap.php';
use mmpsdk\Common\Exceptions\MobileMoneyException;
use mmpsdk\InternationalTransfer\InternationalTransfer;

try {
    /**
     * Construct request object and set desired parameters
     */
    $request = InternationalTransfer::viewQuotation(
        '<<QUOTATION-REFERENCE-HERE>>'
    );

    /**
     *Execute the request
     */
    $response = $request->execute();
    print_r($response);
} catch (MobileMoneyException $ex) {
    print_r($ex->getErrorObj());
}