<?php
require_once __DIR__ . './../bootstrap.php';
use mmpsdk\Disbursement\Disbursement;
use mmpsdk\Common\Exceptions\MobileMoneyException;
use mmpsdk\Common\Models\PatchData;

$patchRequest = new PatchData();
$patchRequest
    ->setOp(PatchData::REPLACE)
    ->setPath('/batchStatus')
    ->setValue('approved');

try {
    /**
     * Construct request object and set desired parameters
     */
    $request = Disbursement::updateBatchTransaction(
        [$patchRequest],
        '<<BATCH-ID>>'
    );

    /**
     *Execute the request
     */
    $response = $request->execute();
    print_r($response);
} catch (MobileMoneyException $ex) {
    print_r($ex->getErrorObj());
}