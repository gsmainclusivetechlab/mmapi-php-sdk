<?php
require_once __DIR__ . './../bootstrap.php';
use mmpsdk\Common\Exceptions\MobileMoneyException;
use mmpsdk\RecurringPayment\RecurringPayment;

$debitMandateReference = 'REF-1638258098398';
$accountIdentifier = [
    'msisdn' => '+44012345678'
];

try {
    $request = RecurringPayment::viewAccountDebitMandate(
        $accountIdentifier,
        $debitMandateReference
    );
    prettyPrint($request->getClientCorrelationId());
    $response = $request->execute();
    prettyPrint($response);
} catch (MobileMoneyException $ex) {
    prettyPrint($ex->getMessage());
    prettyPrint($ex->getErrorObj());
}
