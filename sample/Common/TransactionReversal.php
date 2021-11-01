<?php
require_once __DIR__ . './../bootstrap.php';
use mmpsdk\Common\Models\Reversal;
use mmpsdk\Common\Exceptions\SDKException;
use mmpsdk\Common\Process\TransactionReversal;

$reversalObj = new Reversal();

try {
    $transactionReference = 'REF-1635251574104';
    $request = new TransactionReversal($transactionReference);
    prettyPrint($request->getClientCorrelationId());
    $repsonse = $request->execute();
    prettyPrint($repsonse);
} catch (SDKException $ex) {
    prettyPrint($ex->getErrorObj());
}
