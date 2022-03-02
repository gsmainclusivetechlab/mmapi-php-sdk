<?php
require_once __DIR__ . './../bootstrap.php';
use mmpsdk\Common\Exceptions\MobileMoneyException;
use mmpsdk\Disbursement\Disbursement;

try {
    /**
     * Filter parameters
     */
    $filter = [
        'limit' => 10,
        'offset' => 0
    ];

    /**
     * Construct request object and set desired parameters
     */
    $request = Disbursement::viewBatchCompletions('<<BATCH-ID>>', $filter);

    /**
     *Execute the request
     */
    $response = $request->execute();
    print_r($response);
} catch (MobileMoneyException $ex) {
    print_r($ex->getMessage());
    print_r($ex->getErrorObj());
}