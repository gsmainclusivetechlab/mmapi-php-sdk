<?php
require_once __DIR__ . './../bootstrap.php';
use mmpsdk\BillPayment\Models\BillPay;
use mmpsdk\Common\Exceptions\MobileMoneyException;
use mmpsdk\BillPayment\BillPayment;

$accountIdentifier = [
    'accountid' => 2000
];
$billPay = new BillPay();
$billPay
    ->setCurrency('USD')
    ->setAmountPaid('5.30');
try {
    /**
     * Construct request object and set desired parameters
     */
    $request = BillPayment::createBillPayment(
        $accountIdentifier,
        '<<BILL-REFERENCE-HERE>>',
        $billPay
    );

    /**
     * Choose notification method can be either Callback or Polling
     */
    $request->setNotificationMethod(NotificationMethod::CALLBACK);

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