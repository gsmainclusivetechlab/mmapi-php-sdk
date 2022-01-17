<?php
require_once __DIR__ . './../bootstrap.php';
use mmpsdk\Common\Exceptions\MobileMoneyException;
use mmpsdk\Disbursement\Disbursement;
use mmpsdk\Common\Models\PatchData;

try {
    $patchRequest = new PatchData();
    $patchRequest
        ->setOp(PatchData::REPLACE)
        ->setPath('/batchStatus')
        ->setValue('approved');
    $request = Disbursement::updateBatchTransaction(
        [$patchRequest],
        'REF-1635847150151'
    );
    prettyPrint($request->getClientCorrelationId());
    $repsonse = $request->execute();
    prettyPrint($repsonse);
} catch (MobileMoneyException $ex) {
    prettyPrint($ex->getMessage());
    prettyPrint($ex->getErrorObj());
}
