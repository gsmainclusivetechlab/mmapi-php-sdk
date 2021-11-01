<?php
require_once __DIR__ . './../bootstrap.php';
use mmpsdk\Common\Exceptions\SDKException;
use mmpsdk\Disbursement\Process\RetrieveRejectedBatchTransaction;

try {
    $request = new RetrieveRejectedBatchTransaction('REF-1635751208477');
    $repsonse = $request->execute();
    prettyPrint($repsonse);
} catch (SDKException $ex) {
    prettyPrint($ex->getMessage());
    prettyPrint($ex->getErrorObj());
}
