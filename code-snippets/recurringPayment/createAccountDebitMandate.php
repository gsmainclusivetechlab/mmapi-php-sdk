<?php
require_once __DIR__ . './../bootstrap.php';
use mmpsdk\Common\Models\Transaction;
use mmpsdk\Common\Exceptions\MobileMoneyException;
use mmpsdk\Common\Enums\NotificationMethod;
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
    /**
     * Construct request object and set desired parameters
     */
    $request = RecurringPayment::createAccountDebitMandate(
        $accountIdentifier,
        $debitMandate
    );

    /**
     * Choose notification method can be either Callback or Polling
     */
    $request->setNotificationMethod(NotificationMethod::POLLING);

    /**
     * Get Client Correlation Id that will be sent along with request
     */
    $clientCorrelationId = $request->getClientCorrelationId()
    print_r($clientCorrelationId);

    /**
     *Execute the request
     */
    $response = $request->execute();
    print_r($response);
} catch (MobileMoneyException $ex) {
    print_r($ex->getMessage());
    print_r($ex->getErrorObj());
}