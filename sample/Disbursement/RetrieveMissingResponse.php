<?php
require_once __DIR__ . './../bootstrap.php';

use mmpsdk\Disbursement\Disbursement;
use mmpsdk\Common\Exceptions\SDKException;
use mmpsdk\Common\Models\Transaction;

try {
    $clientCorrelationId = '56647bb2-24e7-43d5-8aa6-b70f568d53c2';
    $request = Disbursement::viewResponse(
        $clientCorrelationId,
        new Transaction()
    );
    $response = $request->execute();
    prettyPrint($response);
} catch (SDKException $ex) {
    prettyPrint($ex->getErrorObj());
}
