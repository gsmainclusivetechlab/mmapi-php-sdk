<?php
require_once __DIR__ . './../bootstrap.php';
use mmpsdk\Common\Exceptions\SDKException;
use mmpsdk\Disbursement\Enums\BatchStatus;
use mmpsdk\Disbursement\Models\BatchTransaction;
use mmpsdk\Disbursement\Process\ApproveBatchTransaction;

try {
    $request = new ApproveBatchTransaction('REF-1635759965384');
    prettyPrint($request->getClientCorrelationId());
    $repsonse = $request->execute();
    prettyPrint($repsonse);
} catch (SDKException $ex) {
    prettyPrint($ex->getMessage());
    prettyPrint($ex->getErrorObj());
}
