<?php
require_once __DIR__ . './../bootstrap.php';
use mmpsdk\Common\Models\Transaction;
use mmpsdk\Common\Exceptions\MobileMoneyException;
use mmpsdk\MerchantPayment\MerchantPayment;
use mmpsdk\RecurringPayment\Models\DebitMandate;
use mmpsdk\RecurringPayment\RecurringPayment;

$debitMandate = new DebitMandate();
$debitMandate
    ->setPayee([
        'accountid' => '2999'
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
    'accountid' => '2000'
];

try {
    $request = RecurringPayment::createAccountDebitMandate(
        $accountIdentifier,
        $debitMandate
    );
    prettyPrint($request->getClientCorrelationId());
    $repsonse = $request->execute();
    prettyPrint($repsonse);
} catch (MobileMoneyException $ex) {
    prettyPrint($ex->getMessage());
    prettyPrint($ex->getErrorObj());
}
