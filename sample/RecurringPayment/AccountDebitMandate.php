<?php
require_once __DIR__ . './../bootstrap.php';
use mmpsdk\Common\Exceptions\MobileMoneyException;
use mmpsdk\RecurringPayment\Models\DebitMandate;
use mmpsdk\RecurringPayment\RecurringPayment;

$debitMandate = new DebitMandate();
$debitMandate
    ->setPayee([
        'walletid' => '1'
    ])
    ->setCurrency('GBP')
    ->setAmountLimit('1000.00')
    ->setRequestDate('2018-07-03T10:43:27.405Z')
    ->setStartDate('2018-07-03T10:43:27.405Z')
    ->setEndDate('2028-07-03T10:43:27.405Z')
    ->setNumberOfPayments('2')
    ->setFrequencyType('sixmonths')
    ->setCustomData([
        'keytest' => 'keyvalue'
    ]);
$accountIdentifier = [
    'msisdn' => '+44012345678'
];

try {
    $request = RecurringPayment::createAccountDebitMandate(
        $accountIdentifier,
        $debitMandate
    );
    prettyPrint($request->getClientCorrelationId());
    $response = $request->execute();
    prettyPrint($response);
} catch (MobileMoneyException $ex) {
    prettyPrint($ex->getMessage());
    prettyPrint($ex->getErrorObj());
}
