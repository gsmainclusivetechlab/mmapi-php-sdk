<?php
require_once __DIR__ . './../bootstrap.php';
use mmpsdk\Common\Exceptions\MobileMoneyException;
use mmpsdk\RecurringPayment\RecurringPayment;

$debitMandateReference = 'REF-1638258098398';
$accountIdentifier = [
    'accountid' => '2000'
];

try {
    $request = RecurringPayment::viewAccountDebitMandate(
        $accountIdentifier,
        $debitMandateReference
    );
    prettyPrint($request->getClientCorrelationId());
    $repsonse = $request->execute();
    prettyPrint($repsonse);
} catch (MobileMoneyException $ex) {
    prettyPrint($ex->getMessage());
    prettyPrint($ex->getErrorObj());
}
