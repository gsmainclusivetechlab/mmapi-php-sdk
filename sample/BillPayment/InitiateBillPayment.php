<?php
require_once __DIR__ . './../bootstrap.php';
use mmpsdk\BillPayment\Models\BillPay;
use mmpsdk\Common\Enums\NotificationMethod;
use mmpsdk\Common\Exceptions\SDKException;
use mmpsdk\BillPayment\BillPayment;

$accountIdentifier = ['accountid' => '1'];
$billReference = 'REF-000001';
$billPay = new BillPay();
$billPay->setCurrency('USD')->setAmountPaid('5.30');

try {
    $request = BillPayment::createBillPayment(
        $accountIdentifier,
        $billReference,
        $billPay
    );
    $request->setNotificationMethod(NotificationMethod::CALLBACK);
    prettyPrint($request->getClientCorrelationId());
    $repsonse = $request->execute();
    prettyPrint($repsonse);
} catch (SDKException $ex) {
    prettyPrint($ex->getMessage());
    prettyPrint($ex->getErrorObj());
}
