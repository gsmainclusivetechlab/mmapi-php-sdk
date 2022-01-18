<?php
require_once __DIR__ . './../bootstrap.php';

use mmpsdk\P2PTransfer\P2PTransfer;
use mmpsdk\Common\Models\Transaction;
use mmpsdk\Common\Enums\NotificationMethod;
use mmpsdk\Common\Exceptions\MobileMoneyException;

$transaction = new Transaction();
$transaction
    ->setAmount('16.00')
    ->setCurrency('USD')
    ->setCreditParty(['walletid' => '1'])
    ->setDebitParty(['msisdn' => '+44012345678']);

try {
    $request = P2PTransfer::createTransferTransaction($transaction);
    $request->setNotificationMethod(NotificationMethod::CALLBACK);
    prettyPrint($request->getClientCorrelationId());
    $repsonse = $request->execute();
    prettyPrint($repsonse);
} catch (MobileMoneyException $ex) {
    prettyPrint($ex->getMessage());
    prettyPrint($ex->getErrorObj());
}
