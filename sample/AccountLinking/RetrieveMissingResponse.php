<?php
require_once __DIR__ . './../bootstrap.php';

use mmpsdk\AccountLinking\AccountLinking;
use mmpsdk\Common\Exceptions\MobileMoneyException;
use mmpsdk\Common\Models\Transaction;

try {
    $clientCorrelationId = '56647bb2-24e7-43d5-8aa6-b70f568d53c2';
    $request = AccountLinking::viewResponse(
        $clientCorrelationId,
        new Transaction()
    );
    $response = $request->execute();
    prettyPrint($response);
} catch (MobileMoneyException $ex) {
    prettyPrint($ex->getErrorObj());
}
