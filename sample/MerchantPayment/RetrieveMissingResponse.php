<?php
require_once __DIR__ . './../bootstrap.php';

use mmpsdk\MerchantPayment\MerchantPayment;
use mmpsdk\Common\Exceptions\MobileMoneyException;
use mmpsdk\Common\Models\Transaction;

try {
    $clientCorrelationId = 'ad6fed44-ff55-46fb-8ec2-bb1f8dfbcbe7';
    $request = MerchantPayment::viewResponse(
        $clientCorrelationId,
        new Transaction()
    );
    $response = $request->execute();
    prettyPrint($response);
} catch (MobileMoneyException $ex) {
    prettyPrint($ex->getMessage());
    prettyPrint($ex->getErrorObj());
}
